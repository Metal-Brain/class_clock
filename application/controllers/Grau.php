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
    $this->form_validation->set_rules('codigo','codigo', array('required','integer','greater_than[0]','less_than[20]'));
    // Setando os delimitadores da mensagem de erro.
    $this->form_validation->set_error_delimiters('<span class="text-danger">','</span>');
    if ( $this->form_validation->run()) {
        $value =  array('codigo' => $this->input->post('codigo'), 'nome_grau' => $this->input->post('nome_grau'));        
        $grau = new Grau_model($value);
        $grau->save();
    } else {
      $this->load->view('grau/grau');
    }
  }
  function editar(){

  }
}
?>
