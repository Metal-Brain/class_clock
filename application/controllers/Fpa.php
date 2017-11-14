<?php

class Fpa extends MY_Controller{

  function index(){
    $fpas= Fpa_model::all();
    $this->load->template('fpas/fpas',compact('fpas'),'fpas/js_fpas');
  }

  public function cadastrarDisponibilidade(){

    $horarios = Horario_model::orderBy('inicio')->get();

    $this->load->template('fpas/fpaCadastrar', compact('horarios'), 'fpas/js_fpas');
  }

  public function cadastrarPreferencias(){
    $turmas = Turma_model::all();
    $this->load->template('fpas/fpaPreferencias', compact('turmas'), 'fpas/js_fpas');
  }

  public function salvar(){
    try{
      $dados = [
        "docente_id" => Docente_model::where('pessoa_id',$_SESSION['usuario_logado']['id'])->first()->id,
        "periodo_id" => Periodo_model::periodoAtivo()->id
      ];

      $fpa = Fpa_model::firstOrCreate($dados);
      $this->session->set_flashdata('success','FPA cadastrado com sucesso');
    } catch (Exception $e){
      $this->session->set_flashdata("error",$e->getMessage());
    }


  }

  public function salvarDisponibilidade(){
    $this->salvar();
    $periodoAtivo = Periodo_model::periodoAtivo();
    $docente_id = Docente_model::where('pessoa_id',$_SESSION['usuario_logado']['id'])->first()->id;
    $fpa = Fpa_model::where('docente_id', $docente_id)->where('periodo_id', $periodoAtivo->id)->first();
    $fpa->horarios()->sync([]);
    $disponibilidade = $this->input->post('disp');
    $indisponibilidade  = $this->request('indisponibilidade');

    try{
      DB::transaction(function () use ($fpa, $disponibilidade, $indisponibilidade){
        if(isset($disponibilidade)){
          $this->disponibilidade($fpa, $disponibilidade);
        }else if(isset($indisponibilidade)){
          $this->indisponibilidade($fpa, $indisponibilidade);
        }
      });
      $this->session->set_flashdata('success','Disponibilidade cadastrada com sucesso');
    } catch (Exception $e){
      $this->session->set_flashdata('danger','Problemas ao cadastrar a disponibilidade, tente novamente!');
      echo $e->getMessage();
    }
    $this->cadastrarPreferencias();
  }

  private function disponibilidade($fpa,$disponibilidade) {
    foreach($disponibilidade as $dia_semana => $horarios){

      foreach($horarios as $horario_id){
        Disponibilidade_model::firstOrCreate([
          'fpa_id' => $fpa->id,
          'horario_id' => $horario_id,
          'dia_semana' => $dia_semana
        ]);
      }
    }
  }

  private function indisponibilidade($fpa,$indisponibilidade){
    $horarios = Horario_model::orderBy('inicio')->get();
    $dia_semana = ['seg', 'ter', 'qua', 'qui', 'sex', 'sab'];
    $dia_semanas = array_diff($dia_semana, array($indisponibilidade));
    foreach($dia_semanas as $dia_semana){
      foreach($horarios as $horario){
        Disponibilidade_model::firstOrCreate([
          'fpa_id' => $fpa->id,
          'horario_id' => $horario->id,
          'dia_semana' => $dia_semana
        ]);
      }
    }
  }

  public function editarDisponibilidade(){
    $periodoAtivo = Periodo_model::periodoAtivo();
    $docente_id = Docente_model::where('pessoa_id',$_SESSION['usuario_logado']['id'])->first()->id;
    $fpa = Fpa_model::where('docente_id', $docente_id)->where('periodo_id', $periodoAtivo->id);
    $horarios = Horario::orderBy('inicio')->get();
    $disponibilidade = $fpa->disponibilidade()->get();
    $this->load->template('fpas/fpaEditarDisponibilidade', [$fpa, $horarios, $disponibilidade], 'fpas/js_fpa');
  }

  public function salvarPreferencias(){
    $this->salvar();
    $periodoAtivo = Periodo_model::periodoAtivo();
    $docente_id = Docente_model::where('pessoa_id',$_SESSION['usuario_logado']['id'])->first()->id;
    $fpa = Fpa_model::where('docente_id', $docente_id)->where('periodo_id', $periodoAtivo->id)->first();
    $disciplinas = $this->input->post('disc');
    $fpa->turmas()->sync([]);
    $ordem = 1;
    try{
      DB::transaction(function () use ($disciplinas){
        foreach($disciplinas as $disciplina){
          Preferencia_model::firstOrCreate([
            'fpa_id' => $fpa->id,
            'disciplina_id' => $disciplina->id,
            'preferencia' => $ordem++
          ]);
        }
      });
      $this->session->set_flashdata('success','Preferências de disciplinas cadastrado com sucesso');
    } catch (Exception $e){
      $this->session->set_flashdata('danger','Problemas ao cadastrar as preferências de disciplinas, tente novamente!');
      echo $e->getMessage();
    }
  }

  public function editarPreferencias(){
    $periodoAtivo = Periodo_model::periodoAtivo();
    $fpa = Fpa_model::where('docente_id', $_SESSION['usuarioLogado']['id'])->where('periodo_id', $periodoAtivo->id);
    $disciplinas = Disciplina_model::all();
    $disciplinasSelecionadas = $fpa->preferencia()->get();
    $this->load->template('fpas/fpaEditarPreferencia', [$fpa, $disciplinas, $disciplinasSelecionadas], 'fpas/js_fpa');
  }

}
