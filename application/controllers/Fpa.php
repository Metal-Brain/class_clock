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
    try{
      DB::transaction(function (){
        $dados = [
          "docente_id" => 1,//$_SESSION['usuarioLogado']['id'],
          "periodo_id" => Periodo_model::periodoAtivo()->id
        ];
        
        $fpa = Fpa_model::firstOrCreate($dados);

        $disponibilidade = $this->input->post('disp');
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

  public function editar(){
    $fpa = Fpa::where('docente_id', $_SESSION['usuarioLogado']['id'])->where('ativo', 1);
    $horarios = Horario::orderBy('inicio')->get();
    $this->load->template('fpas/fpaEditar', [$fpa, $horarios], 'fpas/js_fpa');
  }

  public function atualizar(){

  }

  public function deletar(){

  }


}
