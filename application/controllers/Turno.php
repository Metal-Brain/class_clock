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
    $this->load->helper('date');
    $turnos = Turno_model::withTrashed()->get();
    $this->load->template('turnos/turnos',compact('turnos'),'turnos/js_turnos');
  }


  function cadastrar () {
    $this->load->template('turnos/turnosCadastrar',[],'turnos/js_turnos');
  }

  /**
   * Salva um novo usuário no banco de dados.
   * @author Caio de Freitas
   * @since 2017/08/23
   */
  public function salvar () {

    $this->form_validation->set_rules('nome_turno','nome',array('required','max_length[25]','is_unique[turno.nome_turno]','trim','strtolower'));
    $this->form_validation->set_rules('horario[]','horario',array('callback_horarioRequired','callback_timeValidate','callback_horarioAula'));

    $this->form_validation->set_message('is_unique','O nome do turno informado já está cadastrado');
    $this->form_validation->set_error_delimiters('<span class="text-danger">','</span>');

    if ($this->form_validation->run()) {
      try {
        DB::transaction(function () {
          $turno = new Turno_model();
          $turno->nome_turno = $this->input->post('nome_turno');
          $turno->save();

          $horarios = $this->input->post('horario');
          $horario_sync = [];

          for ($i = 0; $i < sizeof($horarios); $i += 2) {
            $horario['inicio'] = $horarios[$i];
            $horario['fim'] = $horarios[$i+1];

            $horario_model = Horario_model::firstOrCreate($horario);
            $horario_sync[] = $horario_model->id;
          }

          $turno->horarios()->sync($horario_sync);
        });

        $this->session->set_flashdata('success','Turno cadastrado com sucesso');

      } catch (Exception $e) {
        echo $e;
        die();
        $this->session->set_flashdata('danger','Problemas ao cadastrar o turno, tente novamente!');
      }

      redirect("Turno");
    } else {
      $this->cadastrar();
    }

  }

  /**
   * Formulário para alterar os dados do turno
   * @author Caio de Freitas
   * @since 2017/08/26
   */
  function editar ($id) {
      $turno = Turno_model::withTrashed()->findOrFail($id);
      $this->load->template('turnos/turnosEditar',compact('turno','id'),'turnos/js_turnos');
  }

  /**
   * Edita os dados do turno no banco de dados.
   * @author Caio de Freitas
   * @since 2017/08/26
   */
  public function atualizar ($id) {
    $turno = Turno_model::withTrashed()->findOrFail($id);

    if(ucwords($turno->nome_turno) != $this->input->post('nome_turno')){
      $this->form_validation->set_rules('nome_turno','nome',array('required','max_length[25]','is_unique[turno.nome_turno]','trim','strtolower'));
    }else {
      $this->form_validation->set_rules('nome_turno','nome',array('required','max_length[25]','trim','strtolower'));
    }
    $this->form_validation->set_rules('horario[]','horario',array('callback_horarioRequired','callback_timeValidate','callback_horarioAula'));

    $this->form_validation->set_message('is_unique','O nome do turno informado já está cadastrado');
    $this->form_validation->set_error_delimiters('<span class="text-danger">','</span>');

    if ($this->form_validation->run()) {
      try {
        $turno->nome_turno = $this->input->post('nome_turno');

        $horarios = $this->input->post('horario');
        $horario_sync = [];

        for ($i = 0; $i < sizeof($horarios); $i += 2) {
          $horario['inicio'] = $horarios[$i];
          $horario['fim'] = $horarios[$i+1];

          $horario_model = Horario_model::firstOrCreate($horario);
          $horario_sync[] = $horario_model->id;
        }

        $turno->horarios()->sync($horario_sync);
        $this->session->set_flashdata('success','Turno atualizado com sucesso');
      } catch (Exception $e) {
        $this->session->set_flashdata('danger','Problemas ao atualizar os dados do turno, tente novamente!');
      }
      redirect('Turno');
    } else {
      $this->editar($id);
    }


  }

  /**
   * Desativa um turno cadastrado no banco de dados.
   * @author Caio de Freitas
   * @param ID do turno
   */
  function deletar ($id) {
    try {
      $turno = Turno_model::findOrFail($id);
      $turno->delete();

      $this->session->set_flashdata('success','Turno desativado com sucesso');
    } catch (Exception $e) {
      $this->session->set_flashdata('danger','Erro ao desativar um turno, tente novamente');
    }

    redirect("Turno");

  }

  /**
   * Ativa o turno
   * @author Caio de Freitas
   * @since 2017/08/31
   * @param ID do turno
   */
  function ativar ($id) {
    try {
      $turno = Turno_model::withTrashed()->findOrFail($id);
      $turno->restore();
      $this->session->set_flashdata('success','Turno ativado com sucesso');
    } catch (Exception $e) {
      $this->session->set_flashdata('danger','Erro ao ativar o turno. Tente novamente!');
    }

    redirect("Turno");

  }

  /**
   * Função para validar a obrigatoriedade dos horarios.
   * Verifica se todos os valores de horario são diferentes de NULL.
   * @author Caio de Freitas
   * @since 2017/08/30
   */
  public function horarioRequired() {
    $resultado = TRUE;
    $horarios = $this->input->post('horario');

    if (sizeof($horarios) < 2) {
      $this->form_validation->set_message('horarioRequired','Informe ao menos um aula');
      $resultado = FALSE;
    } else {
      foreach ($horarios as $horario) {
        if (empty($horario)) {
          $this->form_validation->set_message('horarioRequired','Informe todos os horários');
          $resultado = FALSE;
          break;
        }
      }
    }

    return $resultado;
  }

  /**
   * Função para validar os horarios das aulas.
   * A aula possui um horario de inicio e um horário de fim, o horarário "fim"
   * não pode ser menor do que o horário de inicio;
   * @author Caio de Freitas
   * @since 2017/08/30
   * @return Retorna um BOOLEAN TRUE caso os horários da aula estejam corretos.
   */
  public function horarioAula () {
    $resultado = true;
    $horario = $this->input->post("horario");

    for ($i = 0; $i < sizeof($horario); $i += 2){
      $horarioInicio  = strtotime($horario[$i]);
      $horarioFim     = strtotime($horario[$i+1]);

      // Verifica se o horario fim é menor do que o horário de inicio
      if ($horarioFim <= $horarioInicio) {
        $this->form_validation->set_message('horarioAula','O horário fim não pode ser maior ou igual ao horário de inicio');
        $resultado = false;
        break;
      }
    }

    return $resultado;
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
      $horario = explode(':', $horario);

      if (!is_numeric($horario[0]) || !is_numeric($horario[1])) {
        $this->form_validation->set_message('timeValidate','Os valores informados não são numéricos');
        $result = FALSE;
        break;
      } else if ( $horario[0] >= 24 || $horario[1] > 59) {
        $this->form_validation->set_message('timeValidate','Hora inválida');
        $result = FALSE;
        break;
      }
    }

    return $result;
  }
}


?>
