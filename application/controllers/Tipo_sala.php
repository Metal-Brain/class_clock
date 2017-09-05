<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class Tipo_sala extends CI_Controller {

  function index () {
      $tipo_salas = TipoSala_model::all();
      $this->load->template('tipo_salas/tipo_sala', compact('tipo_salas'), 'tipo_salas/js_tipo_sala');
  }

  function cadastrar () {
    $this->load->template('tipo_salas/tipo_salaCadastrar');
  }

  function salvar () {

    $this->validar();

    if ( $this->form_validation->run() ) {
  
      $dados = array(
          'nome_tipo_sala'      => $this->input->post('nome_tipo_sala'),
          'descricao_tipo_sala' => $this->input->post('descricao_tipo_sala')
      );

      TipoSala_model::firstOrCreate($dados);
    
    }else{
      $this->session->set_flashdata('danger','Problemas ao cadastrar o tipo de sala, tente novamente!');
    }

    redirect('Tipo_sala');

  }

  function editar($id){
    $tipo_salas = TipoSala_model::findOrFail($id);

    $this->load->template('tipo_salas/tipo_salaEditar', compact('tipo_salas', 'id'), 'tipo_salas/js_tipo_sala');
  }

  public function atualizar($id){
    $this->validar();

    if ( $this->form_validation->run() ) {
      try{
        DB::transaction(function () use ($id){
          $dados = array(
            'nome_tipo_sala'      => $this->input->post('nome_tipo_sala'),
            'descricao_tipo_sala' => $this->input->post('descricao_tipo_sala')
          );

          $tipo_sala = TipoSala_model::findOrFail($id);
          $tipo_sala->update($dados);
        });
      }catch(Exception $e){
        $this->session->set_flashdata('danger','Problemas ao atualizar o tipo de sala, tente novamente!');
      }
    }else{
      $this->session->set_flashdata('danger','Problemas ao atualizar o tipo de sala, tente novamente!');
    }

    redirect('Tipo_sala');
  }

  public function deletar($id){
    TipoSala_model::findOrFail($id)->delete();

    redirect('Tipo_sala');
  }

  private function validar(){
    // Criando regra de validação do formulário
    $this->form_validation->set_rules('nome_tipo_sala','nome',array('required','max_length[30]','trim', 'is_unique[tipo_sala.nome_tipo_sala]'));
    $this->form_validation->set_rules('descricao_tipo_sala','descrição',array('required','max_length[254]','trim'));
    // Setando os delimitadores da mensagem de erro.
    $this->form_validation->set_error_delimiters('<span class="text-danger">','</span>');
  }

}