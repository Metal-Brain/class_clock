<?php defined('BASEPATH') OR exit('No direct script access allowed');


/**
 *
 */
class Usuario extends CI_Controller {

  /**
   * Altera a senha do usuário
   * @author Caio de Freitas
   * @since 2017/05/22
   */
  public function alterarSenha () {

    $this->load->model(array('Usuario_model'));

    // Regras de validação
    $this->form_validation->set_rules('senhaAtual','senha atual',array('trim','required','min_length[6]'));
    $this->form_validation->set_rules('novaSenha','senha',array('trim','required','min_length[6]'));
    $this->form_validation->set_rules('confirmaSenha','confirma senha',array('trim','required','min_length[6]','matches[novaSenha]'));
    // Delimitadores
    $this->form_validation->set_error_delimiters('<span class="text-danger">','</span>');

    if ($this->form_validation->run() == false) {
      $this->load->view('includes/header');
      $this->load->view('includes/sidebar');
      $this->load->view('professores/alterarSenha');
      $this->load->view('includes/footer');
    } else {

      $id = $this->session->id;
      $senhaAtual = hash('SHA256',$this->input->post('senhaAtual'));
      $novaSenha  = hash('SHA256',$this->input->post('novaSenha'));

      if ($this->Usuario_model->alterarSenha($id,$senhaAtual,$novaSenha))
        $this->session->set_flashdata('success','Senha Alterada com sucesso');
      else
        $this->session->set_flashdata('danger','Não foi possivel alterar a senha');

      redirect('Usuario/alterarSenha');
    }
  }

}


?>
