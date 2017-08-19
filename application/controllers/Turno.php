<?php

/**
 *
 */
class Turno extends CI_Controller {

  function index () {

  }

  function cadastrar () {

    $this->form_validation->set_rules('nome_turno','nome',array('required','max_length[25]','trim','strtolower'));
    $this->form_validation->set_rules('inicio','horário de entrada',array('required'));
    $this->form_validation->set_error_delimiters('<span class="text-danger">','</span>');

    if ($this->form_validation->run()) {
      $this->salvar();
    } else {
      $this->load->template('turnos/turnos');
    }

  }

  function salvar () {
    // TODO: recuperar os dados do formulário e fazer a persistencia dos dados.
  }

  function editar () {

  }
}


?>
