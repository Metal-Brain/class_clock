<?php

class Fpa extends CI_Controller{

  function index(){
    $fpas=[];
    $this->load->template('fpas/fpas',compact('fpas'),'fpas/js_fpas');
  }

  public function cadastrar(){
    $horarios = Horario_model::orderBy('inicio')->get();

    $this->load->template('fpas/fpaCadastrar', compact('horarios'), 'fpas/js_fpas');
  }

  public function salvar(){
    $disponibilidade    = $this->input->post('disp');
    $indisponibilidade  = $this->input->post('indisponibilidade');

    $fpa = Fpa_model::firstOrCreate($dados);
    $fpa->disponibilidade->sync([]);

    if(isset($disponibilidade)){
      $this->disponibilidade($disponibilidade);
    }else if(isset($indisponibilidade)){
      $this->indisponibilidade($indisponibilidade);
    }

    $disciplinas = $this->input->post('disc');
    $fpa->preferencia->sync([]);
    $ordem = 1;
    foreach($disciplinas as $disciplina){
      Preferencia_model::firstOrCreate([
        'fpa_id' => $fpa->id,
        'disciplina_id' => $disciplina->id,
        'preferencia' => $ordem++
      ]);  
    }

    $this->index();
  }

  private function disponibilidade($disponibilidade){
    try{
      DB::transaction(function (){
        $dados = [
          "docente_id" => 1,//$_SESSION['usuarioLogado']['id'],
          "periodo_id" => Periodo_model::periodoAtivo()->id
        ];
        
        foreach($disponibilidade as $dia_semana => $horarios){
          foreach($horarios as $horario_id){
            Disponibilidade_model::firstOrCreate([
              'fpa_id' => $fpa->id,
              'horario_id' => $horario_id, 
              'dia_semana' => $dia_semana
            ]);
          }
        }
      });
      $this->session->set_flashdata('success','FPA cadastrado com sucesso');
    } catch (Exception $e){
      $this->session->set_flashdata('danger','Problemas ao cadastrar a FPA, tente novamente!');
      echo $e->getMessage();
    }
  }

  private function indisponibilidade($indisponibilidade){
    $horarios = Horario_model::orderBy('inicio')->get();

    $dia_semana = ['seg', 'ter', 'qua', 'qui', 'sex', 'sab'];
    $dia_semana = array_diff($dia_semana, array($indisponibilidade));

    $dados = [
      "docente_id" => 1,//$_SESSION['usuarioLogado']['id'],
      "periodo_id" => Periodo_model::periodoAtivo()->id
    ];

    foreach($dia_semana as $dia_semana){
      foreach($horarios as $horario){
        Disponibilidade_model::firstOrCreate([
          'fpa_id' => $fpa->id,
          'horario_id' => $horario->id, 
          'dia_semana' => $dia_semana
        ]);
      }
    }
  }

  public function editar(){
    $fpa = Fpa::where('docente_id', $_SESSION['usuarioLogado']['id'])->where('ativo', 1);
    $horarios = Horario::orderBy('inicio')->get();
    $disponibilidade = $fpa->disponibilidade()->get();
    $disciplinas = $fpa->preferencia()->get();
    $this->load->template('fpas/fpaEditar', [$fpa, $horarios, $disponibilidade, $disciplinas], 'fpas/js_fpa');
  }

}
