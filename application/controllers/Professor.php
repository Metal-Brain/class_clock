<?php defined('BASEPATH') OR exit('No direct script access allowed');

  /**
   *  Essa classe é responsavel por todas regras de negócio sobre professores.
   *  @since 2017/04/03
   *  @author Yasmin Sayad
   */
  class Professor extends CI_Controller {

    public function index () {
      $this->cadastro();
    }


    // =========================================================================
    // ==========================CRUD de professores============================
    // =========================================================================

    /**
      * Valida os dados do forumulário de cadastro de professores.
      * Caso o formulario esteja valido, envia os dados para o modelo realizar
      * a persistencia dos dados.
      * @author Yasmin Sayad 
      * @since 2017/04/03
      */
    public function cadastro () {
      // Carrega a biblioteca para validação dos dados.
      $this->load->library(array('form_validation','session'));
      $this->load->helper(array('form','url'));
      $this->load->model(array('Professor_model', 'Disciplina_model'));

      // Definir as regras de validação para cada campo do formulário.
      $this->form_validation->set_rules('nome', 'nome do professor', array('required','min_length[5]','max_length[255]','ucwords'));
      $this->form_validation->set_rules('matricula', 'matrícula', array('required','max_length[8]','is_unique[Professor.matricula]','strtoupper'));
      $this->form_validation->set_rules('nascimento', 'data de nascimento', array('required','date'));
      // Definição dos delimitadores
      $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

      // Verifica se o formulario é valido
      if ($this->form_validation->run() == FALSE) {

        $this->session->set_flashdata('formDanger','<strong>Não foi possível cadastrar o professor, pois existe(m) erro(s) no formulário:</strong>');

        $dados['professores'] = $this->Professor_model->getAll();
	      $this->load->view('professores', $dados);

      } else {

        // Pega os dados do formulário
        $professor = array(
          'nome'      => $this->input->post("nome"),
          'sigla'     => $this->input->post('sigla'),
          'qtdProf'   => $this->input->post("qtdProf")
        );

        if ($this->Professor_model->insert($professor)){
          $this->session->set_flashdata('success','Professor cadastrado com sucesso');
        } else {
          $this->session->set_flashdata('danger','Não foi possível cadastrar o professor, tente novamente ou entre em contato com o administrador do sistema.');
        }

        redirect('/');

      }
    }

    /**
      * Deleta um professor.
      * @author Yasmin Sayad
      * @since  2017/04/03
      * @param $id ID do professor
      */
    public function desativar ($id) {
      // Carrega os modelos necessarios
      $this->load->model(array('Professor_model'));

      if ( $this->Professor_model->disable($id) )
        $this->session->set_flashdata('success','Professor desativado com sucesso');
      else
        $this->session->set_flashdata('danger','Não foi possível desativar o professor, tente novamente ou entre em contato com o administrador do sistema.');

      redirect('/');
    }

    public function ativar ($id) {
      $this->load->model('Professor_model');

      if ( $this->Professor_model->able($id) )
        $this->session->set_flashdata('success','Professor ativado com sucesso!');
      else
        $this->session->set_flashdata('danger','Não foi possível ativar o professor, tente novamente ou entre em contato com o administrador do sistema.');

      redirect('Professor');
    }

    /**
      * Altera os dado do professor.
      * @author Yasmin Sayad
      * @since 2017/04/03
      * @param $id ID do professor
      */
    public function atualizar () {

      $this->load->library('form_validation');
      $this->load->model(array('Professor_model'));

      // Definir as regras de validação para cada campo do formulário.
      $this->form_validation->set_rules('recipient-nome', 'nome', array('required','min_length[5]','ucwords'));
      $this->form_validation->set_rules('recipient-sigla', 'sigla', array('required', 'max_length[5]','strtoupper'));
      $this->form_validation->set_rules('recipient-qtd-prof', 'quantidade de professores', array('required', 'integer', 'greater_than[0]'));
      // Definição dos delimitadores
      $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

      // Verifica se o formulario é valido
      if ($this->form_validation->run() == FALSE) {

        $this->session->set_flashdata('formDanger','<strong>Não foi possível atualizar os dados do professor:</strong>');

        $dados['professores'] = $this->Professor_model->getAll();
        $this->load->view('professores', $dados);
      } else {

        $id = $this->input->post('recipient-id');

        // Pega os dados do formulário
        $professor = array(
          'nome'        => $this->input->post("recipient-nome"),
          'sigla'       => $this->input->post('recipient-sigla'),
          'qtdProf'     => $this->input->post("recipient-qtd-prof")
        );

        if ( $this->Professor_model->update($id, $professor) )
          $this->session->set_flashdata('success', 'Professor atualizado com sucesso');
        else
          $this->session->set_flashdata('danger','Não foi possível atualizar os dados do professor, tente novamente ou entre em contato com o administrador do sistema.<br/> Caso tenha alterado a <b>SIGLA</b>, verifique se ela já não foi utilizada!');

        redirect('/');

      }
    }



  }

?>
