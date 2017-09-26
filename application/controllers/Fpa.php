<?php

class Fpa extends CI_Controller{

  function index(){
    $fpas=[];
    $this->load->template('fpas/fpas',compact('fpas'),'fpas/js_fpas');
  }

  public function cadastrar(){
    $this->load->template('fpas/fpaCadastrar', [], 'fpas/js_fpa');
  }

  public function salvar(){
    
  }

  public function editar(){

  }

  public function atualizar(){

  }

  public function deletar(){
    
  }

}
