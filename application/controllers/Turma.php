<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Turma extends MY_Controller {

  function index () {
    $turmas = Periodo_model::whereAtivo(true)->firstOrFail()->turmas;
    $this->load->template('turmas/turmas',compact('turmas'),'turmas/js_turmas');
  }

  function cadastrar () {
    $disciplinas = Disciplina_model::all();
    $turnos = Turno_model::all();

    $this->load->template('turmas/cadastrar', compact('disciplinas', 'turnos'), 'turmas/js_Turmas');
  }

  public function salvar () {
    $this->set_validations([
      ['dp', 'Dependência', 'required'],
      ['qtd_alunos', 'Quantidade de Alunos', 'required|numeric'],
      ['disciplina_id', 'Disciplina', 'required|numeric'],
      ['turno_id', 'Turno', 'required|numeric']
    ]);

    if ($this->run_validation()) {
      try{
        $data = $this->request_all();
        $data['periodo_id'] = Periodo_model::whereAtivo(true)->firstOrFail()->id;

        $turma = Turma_model::create($data);
        $this->session->set_flashdata('success','Turma cadastrada com sucesso');
        redirect("turma");
      } catch (Exception $e) {
        $this->session->set_flashdata('danger','Problemas ao cadastrar a Turma, tente novamente!');
        $this->cadastrar();
      }
    } else {
      $this->cadastrar();
    }

  }

  function editar ($id) {
    $turma = Turma_model::withTrashed()->findOrFail($id);
    $disciplinas = Disciplina_model::all();
    $turnos = Turno_model::all();

    $this->load->template('turmas/editar', compact('turma', 'disciplinas', 'turnos'), 'turmas/js_turmas');
  }

  public function atualizar ($id) {
    $this->set_validations([
      ['dp', 'Dependência', 'required'],
      ['qtd_alunos', 'Quantidade de Alunos', 'required|numeric'],
      ['disciplina_id', 'Disciplina', 'required|numeric'],
      ['turno_id', 'Turno', 'required|numeric']
    ]);

    if ($this->form_validation->run()) {
      try {
        $turma = Turma_model::withTrashed()->findOrFail($id);
        $turma->update($this->request_all());
        $this->session->set_flashdata('success','Turma atualizado com sucesso');
        redirect('turma');
      } catch (Exception $e) {
        $this->session->set_flashdata('danger','Problemas ao atualizar os dados da Turma, tente novamente!');
        $this->editar($id);
      }
    } else {
      $this->editar($id);
    }

  }

  function deletar ($id) {
    try {
      Turma_model::findOrFail($id)->delete();
      $this->session->set_flashdata('success', 'Turma deletado com sucesso');
    } catch (Exception $e) {
      $this->session->set_flashdata('danger', 'Erro ao deletar a Turma, tente novamente');
    }

    redirect("turma");
  }

  function ativar ($id) {
    try{
      Turma_model::withTrashed()->findOrFail($id)->restore();
      $this->session->set_flashdata('success','Turma ativada com sucesso');
    } catch (Exception $e) {
      $this->session->set_flashdata('danger','Erro ao ativar a Turma. Tente novamente!');
    }

    redirect("turma");
  }

}
