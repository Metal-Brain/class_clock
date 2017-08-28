<?php defined('BASEPATH') OR exit('No direct script access allowed');

  /**
   *  Essa classe é responsavel por todas regras de negócio sobre disciplinas.
   *  @since 2018/08/28
   *  @author Thalita Barbosa
   */
  class Disciplina extends CI_Controller {

    public function index () {
      if (verificaSessao() && verificaNivelPagina(array(1,3)))
        $this->cadastro();
      else
        redirect('/');
    }


    // =========================================================================
    // ==========================CRUD de disciplinas============================
    // =========================================================================

    /**
      * Valida os dados do forumulário de cadastro de disciplinas.
      * Caso o formulario esteja valido, envia os dados para o modelo realizar
      * a persistencia dos dados.
      * @author Thalita Barbosa
      * @since 2018/08/28
      */
    public function cadastro () {
      // Carrega a biblioteca para validação dos dados.
      if (verificaSessao() && verificaNivelPagina(array(1,3))) {
        $this->load->library(array('form_validation','session'));
        $this->load->helper(array('form','url'));
        $this->load->model(array('Disciplina_model'));

        // Definir as regras de validação para cada campo do formulário.
        $this->form_validation->set_rules('nome_disciplina', 'nome da disciplina', array('required','min_length[5]', 'is_unique[Disciplina.nome_disciplina]','ucwords'));
        $this->form_validation->set_rules('sigla_disciplina', 'sigla', array('required', 'max_length[5]', 'is_unique[Disciplina.sigla_disciplina]','strtoupper'));
        $this->form_validation->set_rules('modulo', 'modulo', array('required', 'integer', 'greater_than[0]', 'less_than[20]'));
        $this->form_validation->set_rules('qtd_professor', 'quantidade de professores', array('required', 'integer', 'greater_than[0]', 'less_than[10]'));
        $this->form_validation->set_rules('carga_semanal', 'carga_semanal', array('required', 'integer', 'greater_than[0]', 'less_than[10]'));
        // Definição dos delimitadores
        $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

        // Verifica se o formulario é valido
        if ($this->form_validation->run() == FALSE) {

          $this->session->set_flashdata('formDanger','<strong>Não foi possível cadastrar a disciplina, pois existe(m) erro(s) no formulário:</strong>');

          $dados['disciplinas'] = $this->Disciplina_model->getAll();


          $this->load->view('includes/header',$dados);
          $this->load->view('includes/sidebar');
          $this->load->view('disciplinas/disciplinas');
		      $this->load->view('includes/footer');
		      $this->load->view('disciplinas/js_disciplinas');

        } else {

          // Pega os dados do formulário
          $disciplina = array(
            'nome_disciplina'      => $this->input->post("nome_disciplina"),
            'sigla_disciplina'     => $this->input->post('sigla_disciplina'),
            'modulo'   => $this->input->post("modulo"),
            'qtd_professor'  => $this->input->post("qtd_professor"),
            'carga_semanal'   => $this->input->post("carga_semanal")
          );

          if ($this->Disciplina_model->insert($disciplina)){
            $this->session->set_flashdata('success','Disciplina cadastrada com sucesso');
          } else {
            $this->session->set_flashdata('danger','Não foi possível cadastrar a disciplina, tente novamente ou entre em contato com o administrador do sistema.');
          }

          redirect('Disciplina');

        }
      }else{
        redirect('/');
      }
    }

    /**
      * Deleta uma disciplina.
      * @author Denny Azevedo
      * @since  2018/08/28
      * @param $id ID da disciplina
      */
    public function desativar ($id) {
      // Carrega os modelos necessarios
      if (verificaSessao() && verificaNivelPagina(array(1))) {
        $this->load->model(array('Disciplina_model','CursoTemDisciplina_model'));

        if ($this->CursoTemDisciplina_model->hasRelation($id) != 0)
          $this->session->set_flashdata('danger','Essa disciplina não pode ser desativada pois ainda está vinculada a algum curso!');
        elseif ( $this->Disciplina_model->disable($id) )
          $this->session->set_flashdata('success','Disciplina desativada com sucesso');
        else
          $this->session->set_flashdata('danger','Não foi possível desativar a disciplina, tente novamente ou entre em contato com o administrador do sistema.');

        redirect('Disciplina');
      }else{
        redirect('/');
      }
    }

    public function ativar ($id) {
      if (verificaSessao() && verificaNivelPagina(array(1))) {
        $this->load->model('Disciplina_model');

        if ( $this->Disciplina_model->able($id) )
          $this->session->set_flashdata('success','Disciplina ativada com sucesso!');
        else
          $this->session->set_flashdata('danger','Não foi possível ativar a disciplina, tente novamente ou entre em contato com o administrador do sistema');

        redirect('Disciplina');
      }else{
        redirect('/');
      }
    }

    /**
      * Altera os dado da disciplina.
      * @author Denny Azevedo
      * @since 2018/08/28
      * @param $id ID da disciplina
      */
    public function atualizar () {
      if (verificaSessao() && verificaNivelPagina(array(1))) {
        $this->load->library('form_validation');
        $this->load->model(array('Disciplina_model'));

        // Definir as regras de validação para cada campo do formulário.
        $this->form_validation->set_rules('recipient-nome_disciplina', 'nome_disciplina', array('required','min_length[5]','ucwords'));
        $this->form_validation->set_rules('recipient-sigla_disciplina', 'sigla_disciplina', array('required', 'max_length[5]','strtoupper'));
        $this->form_validation->set_rules('recipient-modulo', 'modulo', array('required', 'integer', 'greater_than[0]'));
        $this->form_validation->set_rules('recipient-qtd_professor', 'qtd_professor', array('required', 'integer', 'greater_than[0]','less_than[20]'));
        $this->form_validation->set_rules('recipient-carga_semanal', 'carga_semanal', array('required', 'integer', 'greater_than[0]', 'less_than[10]'));
        // Definição dos delimitadores
        $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

        // Verifica se o formulario é valido
        if ($this->form_validation->run() == FALSE) {

          $this->session->set_flashdata('formDanger','<strong>Não foi possível atualizar os dados da disciplina:</strong>');

          $dados['disciplinas'] = $this->Disciplina_model->getAll();


          $this->load->view('includes/header',$dados);
          $this->load->view('includes/sidebar');
          $this->load->view('disciplinas/disciplinas');
          $this->load->view('includes/footer');
          $this->load->view('disciplinas/js_disciplinas');
      } else {

          $id = $this->input->post('recipient-id');

          // Pega os dados do formulário
          $disciplina = array(
            'nome_disciplina'        => $this->input->post("recipient-nome_discplina"),
            'sigla_disciplina'       => $this->input->post('recipient-sigla_disciplina'),
            'modulo'     => $this->input->post("recipient-modulo"),
            'qtd_professor'    => $this->input->post("recipient-qtd_professor"),
            'carga_semanal'     => $this->input->post("recipient-carga_semanal")
          );


          if ( $this->Disciplina_model->update($id, $disciplina) )
            $this->session->set_flashdata('success', 'Disciplina atualizada com sucesso');
          else
            $this->session->set_flashdata('danger','Não foi possível atualizar os dados da disciplina, tente novamente ou entre em contato com o administrador do sistema.<br/> Caso tenha alterado a <b>sigla</b> e/ou <b>nome</b>, verifique se ela já não foi utilizada.');


          redirect('Disciplina');

        }
      }else{
        redirect('/');
      }
    }

    public function verificaNome(){
      $validate_data = array('nome_disciplina' => $this->input->get('nome_disciplina'));
      $this->form_validation->set_data($validate_data);
      $this->form_validation->set_rules('nome_disciplina', 'nome da disciplina', 'is_unique[Disciplina.nome_disciplina]');

      if($this->form_validation->run() == FALSE){
        echo "false";
      }else{
        echo "true";
      }
    }

    public function verificaSigla(){
      $validate_data = array('sigla_disciplina' => $this->input->get('sigla_disciplina'));
      $this->form_validation->set_data($validate_data);
      $this->form_validation->set_rules('sigla_disciplina', 'sigla da disciplina', 'is_unique[Disciplina.sigla_disciplina]');

      if($this->form_validation->run() == FALSE){
        echo "false";
      }else{
        echo "true";
      }
    }

  }

?>
