<?php

class Fpa extends CI_Controller{

  function index(){
    $fpas=[];
    $this->load->template('fpas/fpas',compact('fpas'),'fpas/js_fpas');
  }

  public function cadastrar(){
    $horarios = Horario::orderBy('inicio')->get();
    $this->load->template('fpas/fpaCadastrar', [$horarios], 'fpas/js_fpa');
  }

  public function salvar(){
    try{
      DB::transaction(function (){
        $fpa = Fpa::create([
          "docente_id" => $_SESSION['usuarioLogado']['id'],
          "periodo_id" => Fpa::periodo()->id
        ]);

        $disponibilidade = $this->input->post('disponibilidade');
          foreach($disponibilidade as $dia_semana => $horarios){
            foreach($horarios as $horario_id){
              $horario = Horario_model::find($horario_id);
              $fpa->disponibilidade()->attach($horario, ["dia_semana" => $dia_semana]);
            }
          }
      });
      $this->session->set_flashdata('success','FPA cadastrado com sucesso');
    } catch (Exception $e){
      $this->session->set_flashdata('danger','Problemas ao cadastrar a FPA, tente novamente!');
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
