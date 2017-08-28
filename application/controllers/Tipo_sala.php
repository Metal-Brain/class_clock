<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class Tipo_sala extends CI_Controller {

  function index () {
    $this->cadastrar();
  }

  function cadastrar () {

    // Criando regra de validação do formulário
    $this->form_validation->set_rules('nome_tipo_sala','nome',array('required','max_length[30]','trim','strtolower'));
    $this->form_validation->set_rules('descricao_tipo_sala','descrição',array('required','max_length[254]','trim','strtolower'));
    // Setando os delimitadores da mensagem de erro.
    $this->form_validation->set_error_delimiters('<span class="text-danger">','</span>');

    if ( $this->form_validation->run() ) {
      $this->salvar();
    } else {
      $this->load->view('tipo_salas/tipo_salas');
    }

  }

  function salvar () {

  try {
    DB::transaction(function () {
      $tipo_sala = array(
          'nome_tipo_sala'      => $this->input->post('nome_tipo_sala'),
          'descricao_tipo_sala' => $this->input->post('descricao_tipo_sala')
      );

      TipoSala_model::firstOrCreate($tipo_sala);
    });
  }catch(Exception $e){
    $this->session->set_flashdata('danger','Problemas ao cadastrar o tipo de sala, tente novamente!');
  }

  }
}


?>
