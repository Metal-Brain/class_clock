<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Turma extends MY_Controller {

    function index () {
      $turmas = Turma_model::all();

      $this->load->template('turmas/turmas',compact('turmas'),'turmas/js_turmas');
    }

  function cadastrar () {
    $disciplinas = Disciplina_model::all();
    $turnos = Turno_model::all();

    $this->load->template('Turmas/turmasCadastrar', compact('disciplinas', 'turnos'), 'Turmas/js_Turmas');
  }

  // TODO FIXME
  public function salvar () {
    $this->set_validations([
      ['dp', 'Dependência', 'required'],
      ['qtd_alunos', 'Quantidade de Alunos', 'required|numeric'],
      ['disciplina_id', 'Disciplina', 'required|exists[disciplina,id]'],
      ['turno_id', 'Turno', 'required|exists[turno,id]'],
      ['periodo_id', 'Período', 'required|exists[periodo,id]'],
    ]);


    if ($this->run_validation()) {
      try {
        DB::transaction(function () {
          $Turma = new Turma_model();
          $Turma->nome_Turma = $this->input->post('nome_Turma');
          $Turma->save();

          $horarios = $this->input->post('horario');

          for ($i = 0; $i < sizeof($horarios); $i += 2) {
            $horario = new Horario_model;

            $horario->inicio = $horarios[$i];
            $horario->fim = $horarios[$i+1];
            $horario->Turma_id = $Turma->id;
            $horario->save();
          }
        });

        $this->session->set_flashdata('success','Turma cadastrado com sucesso');

      } catch (Exception $e) {
        $this->session->set_flashdata('danger','Problemas ao cadastrar o Turma, tente novamente!');
      }

      redirect("Turma");
    } else {
      $this->cadastrar();
    }

  }

  function editar ($id) {
    $turma = Turma_model::withTrashed()->findOrFail($id);
    $disciplinas = Disciplina_model::all();
    $turnos = Turno_model::all();

    $this->load->template('Turmas/TurmasEditar', compact('turma', 'disciplinas', 'turnos'), 'Turmas/js_Turmas');
  }

  // TODO FIXME
  public function atualizar ($id) {
    $Turma = Turma_model::withTrashed()->findOrFail($id);

    if(ucwords($Turma->nome_Turma) != $this->input->post('nome_Turma')){
      $this->form_validation->set_rules('nome_Turma','nome',array('required','max_length[25]','is_unique[Turma.nome_Turma]','trim','strtolower'));
    }else {
      $this->form_validation->set_rules('nome_Turma','nome',array('required','max_length[25]','trim','strtolower'));
    }
    $this->form_validation->set_rules('horario[]','horario',array('callback_horarioRequired','callback_timeValidate','callback_horarioAula'));

    $this->form_validation->set_message('is_unique','O nome do Turma informado já está cadastrado');
    $this->form_validation->set_error_delimiters('<span class="text-danger">','</span>');

    if ($this->form_validation->run()) {
      try {
        $Turma->nome_Turma = $this->input->post('nome_Turma');
        $horarios = $this->input->post('horario');

        $Turma->horarios()->forceDelete();
        for ($i = 0; $i < sizeof($horarios); $i += 2) {
          $horario = new Horario_model;

          $horario->inicio = $horarios[$i];
          $horario->fim = $horarios[$i+1];
          $horario->Turma_id = $Turma->id;
          $horario->save();
        }

        $Turma->save();
        $this->session->set_flashdata('success','Turma atualizado com sucesso');
      } catch (Exception $e) {
        $this->session->set_flashdata('danger','Problemas ao atualizar os dados do Turma, tente novamente!');
      }
      redirect('Turma');
    } else {
      $this->editar($id);
    }

  }

  function deletar ($id) {
    try {
      $Turma = Turma_model::findOrFail($id);
      $Turma->delete();

      $this->session->set_flashdata('success','Turma deletado com sucesso');
    } catch (Exception $e) {
      $this->session->set_flashdata('danger','Erro ao deletar um Turma, tente novamente');
    }

    redirect("turma");
  }

  function ativar ($id) {
    try{
      $Turma = Turma_model::withTrashed()->findOrFail($id);
      $Turma->restore();

      $this->session->set_flashdata('success','Turma ativado com sucesso');
    } catch (Exception $e) {
      $this->session->set_flashdata('danger','Erro ao ativar o Turma. Tente novamente!');
    }

    redirect("turma");
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
