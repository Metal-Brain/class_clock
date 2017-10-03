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
    $disp = $this->input->post('disp');
    print_r($disp);
  }

  public function editar(){

  }

  public function atualizar(){

  }

  public function deletar(){

  }

}
