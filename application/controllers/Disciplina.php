<?php defined('BASEPATH') OR exit('No direct script access allowed');

  /**
   *  Essa classe é responsavel por todas regras de negócio sobre disciplinas.
   *  @since 2017/03/17
   *  @author Caio de Freitas
   */
  class Disciplina extends CI_Controller {

    public function index () {

    }

    public function cadastro () {
      // Carrega a biblioteca para validação dos dados.
      $this->load->library('form_validation');

      // Definir as regras de validação para cada campo do formulário.
      $this->form_validation->set_rules('nomeCurso', 'nome do curso', array('required', 'min_length[5]'));
      $this->form_validation->set_rules('cursoSigla', 'sigla', array('required', 'exact_length[3]'));
      $this->form_validation->set_rules('qtdProfessores', '', array('required', 'integer'));

      // Verifica se o formulario é valido
      if ($this->form_validation->run() == FALSE) {
        // TODO Criar lógica para formulario invalido
      } else {
        // TODO Criar lógica para formulário valido
      }
    }

  }

?>
