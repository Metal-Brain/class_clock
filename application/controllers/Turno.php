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
    $this->form_validation->set_rules('horario[]','horario',array('callback_timeValidate'));
    $this->form_validation->set_error_delimiters('<span class="text-danger">','</span>');

    if ($this->form_validation->run()) {
      $this->salvar();
    } else {
      $turnos = Turno_model::all();
      $this->load->template('turnos/turnos',compact('turnos'));
    }

  }

  /**
   * Salva um novo usuário no banco de dados.
   * @author Caio de Freitas
   * @since 2017/08/23
   */
  private function salvar () {

    try {
      DB::transaction(function () {
        $turno = new Turno_model();
        $turno->nome_turno = $this->input->post('nome_turno');
        $turno->save();

        $horarios = $this->input->post('horario');

        for ($i = 0; $i < sizeof($horarios); $i += 2) {
          $horario = new Horario_model;

          $horario->inicio = $horarios[$i];
          $horario->fim = $horarios[$i+1];
          $horario->turno_id = $turno->id;
          $horario->save();
        }
      });

      $this->session->set_flashdata('success','Turno cadastrado com sucesso');

    } catch (Exception $e) {
      $this->session->set_flashdata('danger','Problemas ao cadastrar o turno, tente novamente!');
    }

    redirect("Turno");

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


  /**
   * Função que valida o vetor de horarios
   * @author Caio de Freitas
   * @since 2017/08/23
   * @param vetor com os horários
   */
  public function timeValidate() {
    $result = TRUE;
    $horarios = $this->input->post('horario');

    foreach ($horarios as $horario) {
      if (empty($horario)) {
        $this->form_validation->set_message('timeValidate','Informe um horário');
        $result = FALSE;
        break;
      }

      $horario = explode(':', $horario);

      if (!is_numeric($horario[0]) || !is_numeric($horario[1])) {
        $this->form_validation->set_message('timeValidate','Os valores informado não são numericos');
        $result = FALSE;
        break;
      } else if ( $horario[0] > 24 || $horario[1] > 59) {
        $this->form_validation->set_message('timeValidate','Hora inválida');
        $result = FALSE;
        break;
      }
    }

    return $result;
  }
}


?>
