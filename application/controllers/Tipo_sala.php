<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author AlbinoFreitas
 */
class Tipo_sala extends CI_Controller {

  /*
  * Retorna uma lista com todos os tipo salas ativos
  */
  function index () {
    $tipo_salas = TipoSala_model::withTrashed()->get();
    $this->load->template('tipo_salas/tipo_sala', compact('tipo_salas'), 'tipo_salas/js_tipo_sala');
  }

  /*
  * Redireciona para o formulário de cadastro
  */
  function cadastrar () {
    $this->load->template('tipo_salas/tipo_salaCadastrar');
  }

  /*
  * Persiste os dados do formulário
  */
  function salvar(){
    // Criando regra de validação do formulário
    $this->form_validation->set_rules('nome_tipo_sala','nome',array('required','max_length[30]','trim', 'is_unique[tipo_sala.nome_tipo_sala]'));
    $this->form_validation->set_rules('descricao_tipo_sala','descrição',array('required','max_length[254]','trim'));
    // Setando os delimitadores da mensagem de erro.
    $this->form_validation->set_error_delimiters('<span class="text-danger">','</span>');

    if( $this->form_validation->run() ){
      try{
        $dados = [
          'nome_tipo_sala'      => $this->input->post('nome_tipo_sala'),
          'descricao_tipo_sala' => $this->input->post('descricao_tipo_sala')
        ];

		TipoSala_model::firstOrCreate($dados);
		
		$this->session->set_flashdata('success','Tipo Sala cadastrado com sucesso');
		redirect('Tipo_sala');
      }catch(Exception $e){}
    }
    $this->cadastrar();
  }

  /*
  * Redireciona para o formulário de edição
  */
  function editar($id){
    $tipo_salas = TipoSala_model::findOrFail($id);
    $this->load->template('tipo_salas/tipo_salaEditar', compact('tipo_salas', 'id'), 'tipo_salas/js_tipo_sala');
  }

  /*
  * Atualiza os dados no banco
  */
  public function atualizar($id){
    // Criando regra de validação do formulário
    $this->form_validation->set_rules('nome_tipo_sala','nome',array('required','max_length[30]','trim'));
    $this->form_validation->set_rules('descricao_tipo_sala','descrição',array('required','max_length[254]','trim'));
    // Setando os delimitadores da mensagem de erro.
    $this->form_validation->set_error_delimiters('<span class="text-danger">','</span>');

    if( $this->form_validation->run() ){
      try{
          $dados = [
            'nome_tipo_sala'      => $this->input->post('nome_tipo_sala'),
            'descricao_tipo_sala' => $this->input->post('descricao_tipo_sala')
		  ];

          $tipo_sala = TipoSala_model::findOrFail($id);
		  $tipo_sala->update($dados);
		  
		  $this->session->set_flashdata('success','Tipo Sala atualizado com sucesso');
		  redirect('Tipo_sala');
      }catch(Exception $e){}
    }
    $this->session->set_flashdata('danger','Problemas ao atualizar o tipo de sala, tente novamente!');
    redirect('Tipo_sala');
  }

  /*
  * Deleta (desativa) o tipo sala passado
  */
  public function deletar($id){
    try{
      TipoSala_model::findOrFail($id)->delete();
      $this->session->set_flashdata('success','Tipo sala desativado com sucesso');
    }catch(Exception $e){
      $this->session->set_flashdata('danger','Erro ao desativar o Tipo Sala. Tente novamente!');
    }

    redirect('Tipo_sala');
  }

  /*
  * Ativar um Tipo Sala já deletato
  */
  function ativar($id){
    try {
      $tipo_sala = TipoSala_model::withTrashed()->findOrFail($id);
      $tipo_sala->restore();
      $this->session->set_flashdata('success','Tipo sala ativado com sucesso');
    } catch (Exception $e) {
      $this->session->set_flashdata('danger','Erro ao ativar o Tipo Sala. Tente novamente!');
    }

    redirect("Tipo_sala");
  }

}