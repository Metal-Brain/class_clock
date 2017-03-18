<?php defined('BASEPATH') OR exit('No direct script access allowed');

  /**
   *  Essa classe é responsavel por todas regras de negócio sobre disciplinas.
   *  @since 2017/03/17
   *  @author Caio de Freitas
   */
  class Disciplina extends CI_Controller {

    public function index () {
      $this->cadastro();
    }


    // =========================================================================
    // ======================Cadastro de disciplinas============================
    // =========================================================================


    /**
      * Valida os dados do forumulário de cadastro de disciplinas.
      * Caso o formulario esteja valido, envia os dados para o modelo realizar
      * a persistencia dos dados.
      * @author Caio de Freitas
      * @since 2017/03/17
      */
    public function cadastro () {
      // Carrega a biblioteca para validação dos dados.
      $this->load->library('form_validation');
      $this->load->helper(array('form'));
      $this->load->model(array('Disciplina_model'));

      // Definir as regras de validação para cada campo do formulário.
      $this->form_validation->set_rules('nomeDisciplina', 'nome do curso', array('required','min_length[5]','ucwords'));
      $this->form_validation->set_rules('sigla', 'sigla', array('required', 'exact_length[3]','strtoupper'));
      // TODO adicionar a validação do curso
      $this->form_validation->set_rules('nProfessores', 'quantidade de professores', array('required', 'integer', 'greater_than[0]'));
      // Definição dos delimitadores
      $this->form_validation->set_error_delimiters('<span class="error">','</span>');

      // Verifica se o formulario é valido
      if ($this->form_validation->run() == FALSE) {
        $this->load->view('disciplina/cadastrar');
      } else {

        // Pega os dados do formulário
        $disciplina = array(
          'nomeDisciplina'  => $this->input->post("nomeDisciplina"),
          'sigla'           => $this->input->post('sigla'),
          'nProfessores'    => $this->input->post("nProfessores")
        );

        // TODO: chamar o modelo de disciplina para realizar a persistencia dos dados

      }
    }

  }

?>
