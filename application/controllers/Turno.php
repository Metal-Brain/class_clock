<?php

/**
 *
 */
class Turno extends CI_Controller {

  /**
   * Exibe todos os turnos cadastrados no banco de dados.
   * @author Caio de Freitas
   * @since 2017/08/26
   */
  function index () {

    $turnos = Turno_model::where('valid',TRUE)->get();

    $this->load->template('turnos/turnos',compact('turnos'),'turnos/js_turnos');
  }

  function cadastrar () {

    $this->form_validation->set_rules('nome_turno','nome',array('required','max_length[25]','trim','strtolower'));
    $this->form_validation->set_rules('horario[]','horario',array('callback_timeValidate'));
    $this->form_validation->set_error_delimiters('<span class="text-danger">','</span>');

    if ($this->form_validation->run()) {
      $this->salvar();
    } else {
      $turnos = Turno_model::all();
      $this->load->template('turnos/turnosCadastrar',compact('turnos'),'turnos/js_turnos');
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

  /**
   * Formulário para alterar os dados do turno
   * @author Caio de Freitas
   * @since 2017/08/26
   */
  function editar ($id) {

    $this->form_validation->set_rules('nome_turno','nome',array('required','max_length[25]','trim','strtolower'));
    $this->form_validation->set_rules('horario[]','horario',array('callback_timeValidate'));
    $this->form_validation->set_error_delimiters('<span class="text-danger">','</span>');

    if ($this->form_validation->run()) {
      $this->atualizar($id);
    } else {
      $turno = Turno_model::findOrFail($id);
      $this->load->template('turnos/turnosEditar',compact('turno'));
    }


  }

  /**
   * Edita os dados do turno no banco de dados.
   * @author Caio de Freitas
   * @since 2017/08/26
   */
  private function atualizar ($id) {
    try {
      DB::transaction(function ($id) use ($id) {
        $turno = Turno_model::findOrFail($id);
        $turno->nome_turno = $this->input->post('nome_turno');
        $horarios = $this->input->post('horario');

        $index = 0;
        foreach ($turno->horarios as $horario) {
          $horario->inicio = $horarios[$index];
          $horario->fim =   $horarios[++$index];
          $horario->save();

          $index++;
        }
        $turno->save();
      });
      $this->session->set_flashdata('success','Turno atualizado com sucesso');
    } catch (Exception $e) {
      $this->session->set_flashdata('danger','Problemas ao atualizar os dados do turno, tente novamente!');
    }

    redirect('Turno');
  }

  function deletar ($id) {
    // TODO: alterar o status do turno no banco de dados

    try {
      DB::transaction(function ($id) use ($id) {
        $turno = Turno_model::findOrFail($id);
        $turno->valid = FALSE;
        $turno->save();
      });

      $this->session->set_flashdata('success','Turno deletado com sucesso');
    }catch (Exception $e) {
      $this->session->set_flashdata('danger','Erro ao deletar um turno, tente novamente');
    }

    redirect("Turno");

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
        $this->form_validation->set_message('timeValidate','Os valores informados não são numéricos');
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
