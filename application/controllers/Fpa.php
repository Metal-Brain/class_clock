<?php

class Fpa extends MY_Controller{

  function index(){
    $docente = Pessoa_model::find($_SESSION['usuario_logado']['id'])->docente;
    $fpas = Fpa_model::where("docente_id", $docente->id)->get();
    $this->load->template('fpas/fpas',compact('fpas'),'fpas/js_fpas');
  }

  public function cadastrarDisponibilidade(){

    // inicialização de variavel.
    $fpa = null;
    $disponibilidade = null;

    $url = explode('/',uri_string());
    // verifica a rota que esta acessando a função
    if ($url[1] == 'editarDisponibilidade') {
      $periodoAtivo = Periodo_model::periodoAtivo();
      $docente_id = Docente_model::where('pessoa_id',$_SESSION['usuario_logado']['id'])->first()->id;
      $fpa = Fpa_model::where('docente_id', $docente_id)->where('periodo_id', $periodoAtivo->id)->first();
      $disponibilidade = Disponibilidade_model::where('fpa_id', $fpa->id)->get();
    }

    $horarios = Horario_model::orderBy('inicio')->get();

    if(!is_null($disponibilidade) && !$disponibilidade->isEmpty()){
      $this->load->template('fpas/fpaCadastrar', compact('fpa', 'horarios', 'disponibilidade'), 'fpas/js_fpas');
    } else {
      $this->load->template('fpas/fpaCadastrar', compact('horarios'), 'fpas/js_fpas');
    }
  }

  public function cadastrarPreferencias(){
    $periodoAtivo = Periodo_model::periodoAtivo();
    $docente_id = Docente_model::where('pessoa_id',$_SESSION['usuario_logado']['id'])->first()->id;
    $fpa = Fpa_model::where('docente_id', $docente_id)->where('periodo_id', $periodoAtivo->id)->first();
    $preferencias = Preferencia_model::where('fpa_id', $fpa->id)->get();

    $disciplinas = [];
    foreach($preferencias as $preferencia){
       $disciplinas[] = $preferencia->disciplina;
    }

    $turmas = Turma_model::all();
    if(!$preferencias->isEmpty()){
      $this->load->template('fpas/fpaPreferencias', compact('fpa', 'turmas', 'disciplinas'), 'fpas/js_fpas');
    }
    else{
      $this->load->template('fpas/fpaPreferencias', compact('turmas'), 'fpas/js_fpas');
    }
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

  public function salvarPreferencias(){
    $this->salvar();
    $periodoAtivo = Periodo_model::periodoAtivo();
    $docente_id = Docente_model::where('pessoa_id',$_SESSION['usuario_logado']['id'])->first()->id;
    $fpa = Fpa_model::where('docente_id', $docente_id)->where('periodo_id', $periodoAtivo->id)->first();
    $disciplinas = $this->input->post('disc');
    $fpa->disciplinas()->sync([]);
    $ordem = 1;
    try{
      DB::transaction(function () use ($disciplinas, $fpa, $ordem){
        foreach($disciplinas as $disciplina){
          Preferencia_model::firstOrCreate([
            'fpa_id' => $fpa->id,
            'disciplina_id' => $disciplina,
            'ordem' => $ordem++
          ]);
        }
      });
      $this->session->set_flashdata('success','Preferências de disciplinas cadastrado com sucesso');
    } catch (Exception $e){
      $this->session->set_flashdata('danger','Problemas ao cadastrar as preferências de disciplinas, tente novamente!');
      echo $e->getMessage();
    }
    $this->index();
  }

}
