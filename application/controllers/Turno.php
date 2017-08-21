<?php

/**
 *
 */
class Turno extends CI_Controller {

  function index () {

    $turnos = Turno_model::all();

    $this->load->template('turnos/turnos',compact('turnos'));
  }

  function cadastrar () {

    $this->form_validation->set_rules('nome_turno','nome',array('required','max_length[25]','trim','strtolower'));
    $this->form_validation->set_error_delimiters('<span class="text-danger">','</span>');

    if ($this->form_validation->run()) {
      $this->salvar();
    } else {
      $turnos = Turno_model::all();
      $this->load->template('turnos/turnos',compact('turnos'));
    }

  }

  private function salvar () {
    // TODO: recuperar os dados do formulário e fazer a persistencia dos dados.

    $turno['nome_turno']  = $this->input->post('nome_turno');
    $turno['horario']     = $this->input->post('horario');

  }

  function editar () {
    $this->load->template('turnos/turnosEditar');
  }

  private function atualizar () {

    $turno['nome']    = $this->input->post('nome_turno');
    $turno['horario'] = $this->input->post('horario');

    // TODO: Fazer a atualização dos dados no banco
  }

  function deletar ($id) {
    // TODO: alterar o status do turno no banco de dados
  }
}


?>
