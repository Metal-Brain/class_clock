<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *  Essa classe é responsavel por todas regras de negócio sobre Grau.
 * @author Jean Brock
 * @since 2017/08/20
 */
class Grau extends CI_Controller {
  function index () {
  }
  function cadastrar() {
    // Criando regra de validação do formulário
    $this->form_validation->set_rules('nome_grau','nome',array('required','max_length[20]','trim','strtolower'));
    // Setando os delimitadores da mensagem de erro.
    $this->form_validation->set_error_delimiters('<span class="text-danger">','</span>');
    if ( $this->form_validation->run()) {
        $nome =  array('nome_grau' => $this->input->post('nome_grau'));
        $grau = new Grau_model($nome);        
        $grau->save();
    } else {
      $this->load->view('grau/grau');
    }
  }
  function editar(){

  }
}
?>
