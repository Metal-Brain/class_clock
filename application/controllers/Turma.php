<?php defined('BASEPATH') OR exit('No direct script access allowed');

  /**
   *  Essa classe é responsavel por todas regras de negócio sobre turma.
   *  @since 2017/04/15
   *  @author Jean Brock
   */
  class Turma extends CI_Controller {

    public function index () {
      if (verificaSessao() && verificaNivelPagina(array(1)))
        $this->cadastrar();
      else
        redirect('/');
    }


    // =========================================================================
    // ==========================CRUD de Turma =================================
    // =========================================================================

    /**
      * Valida os dados do forumulário de cadastro de turmas.
      * Caso o formulario esteja valido, envia os dados para o modelo realizar
      * a persistencia dos dados.
      *  @since 2017/04/15
      *  @author Jean Brock
      */
    public function cadastrar () {

      if (verificaSessao() && verificaNivelPagina(array(1))) {
        // Carrega a biblioteca para validação dos dados.
        $this->load->library(array('form_validation','session'));
        $this->load->helper(array('form','url','dropdown'));
        $this->load->model(array(
          'Turma_model',
          'Disciplina_model'
        ));


        // Definir as regras de validação para cada campo do formulário.
        $this->form_validation->set_rules('sigla', 'sigla', array('required', 'max_length[10]', 'is_unique[Turma.sigla]','strtoupper'));
        $this->form_validation->set_rules('qtdAlunos', 'quantidade de alunos', array('required', 'integer', 'greater_than[0]','max_length[3]'));
        $this->form_validation->set_rules('disciplina', 'disciplina', array('greater_than[0]','required'), array('greater_than' => 'Selecione a disciplina'));
        // Definição dos delimitadores
        $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

        // Verifica se o formulario é valido
        if ($this->form_validation->run() == FALSE) {

          $this->session->set_flashdata('formDanger','<strong>Não foi possível cadastrar a turma, pois existe(m) erro(s) no formulário:</strong>');

          $dados['disciplina']   = convert($this->Disciplina_model->getAll(TRUE));
          $dados['turmas'] = $this->Turma_model->getAll();

          $this->load->view('includes/header', $dados);
          $this->load->view('includes/sidebar');
          $this->load->view('turmas/turmas');
          $this->load->view('includes/footer');
          $this->load->view('turmas/js_turmas');

        }else{

          $turma = array(
            'sigla'         => $this->input->post('sigla'),
            'qtdAlunos'     => $this->input->post('qtdAlunos'),
            'dp'            => ($this->input->post("dp") == NULL) ? 0 : 1,
            'disciplina'   =>$this->input->post('disciplina')
          );

          if ($this->Turma_model->insert($turma)) {
            $this->session->set_flashdata('success','Turma cadastrada com sucesso');
          } else {
            $this->session->set_flashdata('danger','Não foi possível cadastrar o turma, tente novamente ou entre em contato com o administrador do sistema.');
          }
            redirect('Turma');

        }
      }else{
        redirect('/');
      }
    }

    /**
      * Essa função irá atualizar os dados da turma.
      * Se esses dados estiverem validos, Envia os dados para modelo.
      * e ira altera-los.
      * @since 2017/04/15
      * @author Jean Brock
    */

    public function atualizar () {
            if (verificaSessao() && verificaNivelPagina(array(1))) {
              // Carrega a biblioteca para validação dos dados.
              $this->load->library(array('form_validation','session'));
              $this->load->helper(array('form','url','dropdown'));
              $this->load->model(array(
                'Turma_model',
                'Disciplina_model'
              ));


              // Definir as regras de validação para cada campo do formulário.
              $this->form_validation->set_rules('recipient-sigla', 'sigla', array('required', 'max_length[10]','strtoupper'));
              $this->form_validation->set_rules('recipient-qtdAlunos', 'quantidade de alunos', array('required', 'integer', 'greater_than[0]','max_length[3]'));
              $this->form_validation->set_rules('recipient-disciplina', 'disciplina', array('greater_than[0]','required'), array('greater_than' => 'Selecione a disciplina'));
              // Definição dos delimitadores
              $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

              // Verifica se o formulario é valido
              if ($this->form_validation->run() == FALSE) {

                $this->session->set_flashdata('formDanger','<strong>Não foi possível cadastrar a turma, pois existe(m) erro(s) no formulário:</strong>');

                $dados['disciplina']   = convert($this->Disciplina_model->getAll(TRUE));
                $dados['turmas'] = $this->Turma_model->getAll();
                $this->load->view('includes/header', $dados);
                $this->load->view('includes/sidebar');
                $this->load->view('turmas/turmas');
                $this->load->view('includes/footer');
                $this->load->view('turmas/js_turmas');

              }else{

                $id = $this->input->post('recipient-id');

                // Pega os dados do formulário
                $turma = array(
                  'sigla'         => $this->input->post('recipient-sigla'),
                  'qtdAlunos'     => $this->input->post('recipient-qtdAlunos'),
                  'dp'            => ($this->input->post("recipient-dp") == NULL) ? 0 : 1,
                  'disciplina'   =>$this->input->post('recipient-disciplina')
                );


                if ($this->Turma_model->updateTurma($id, $turma)) {
                  $this->session->set_flashdata('success','Turma cadastrada com sucesso');
                } else {
                  $this->session->set_flashdata('danger','Não foi possível cadastrar o turma, tente novamente ou entre em contato com o administrador do sistema.');
                }
                  redirect('Turma/atualizar');

              }
            }else{
              redirect('/');
            }
    }

    /**
      * Essa função irá procurar o id da turma
      * e irá alterar a propriedade dele para True ou False,
      * assim não exclindo do banco.
      * @since 2017/04/15
      * @author Jean Brock
    */
    public function desativar ($id) {
      if (verificaSessao() && verificaNivelPagina(array(1))) {
        $this->load->model(array('Turma_model'));

        if ($this->Turma_model->deleteTurma($id))
          $this->session->set_flashdata('success','Turma desativada com sucesso');
        else
          $this->session->set_flashdata('danger','Não foi possível desativar a turma, tente novamente mais tarde ou entre em contato com o administrador do sistema.');

        redirect('Turma');
      }else{
        redirect('/');
      }
    }

	   public function ativar ($id) {
       if (verificaSessao() && verificaNivelPagina(array(1))) {
         $this->load->model('Turma_model');

         if ( $this->Turma_model->able($id) )
           $this->session->set_flashdata('success','Turma ativada com sucesso');
         else
           $this->session->set_flashdata('danger','Não foi possível ativar a turma, tente novamente ou entre em contato com o administrador do sistema.');

         redirect('Turma');
       }else{
         redirect('/');
       }

    }
   }

?>
