<?php defined('BASEPATH') OR exit('No direct script access allowed');


/**
 *
 */
class Usuario extends CI_Controller {

  /**
   * Carrega View de configurações
   * @author Caio de Freitas
   * @since 2017/05/22
   */
  public function editar ($action=NULL) {

    $this->load->model(array('Usuario_model'));

    switch ($action) {
      case 'senha':
        $this->alterarSenha();
        break;
      case 'email':
        $this->alterarEmail();
        break;
    }

    $this->load->view('includes/header');
    $this->load->view('includes/sidebar');
    $this->load->view('configuracoes/configuracoes');
    $this->load->view('includes/footer');
    $this->load->view('configuracoes/js_configuracoes');

  }

  /**
   * Valida o formulário para alteração de senha e altera a senha do usuário.
   * @author Caio de Freitas
   * @since 2017/05/23
   */
  private function alterarSenha () {
    // Regras de validação
    $this->form_validation->set_rules('senhaAtual','senha atual',array('trim','required'));
    $this->form_validation->set_rules('novaSenha','Nova senha',array('trim','required'));
    $this->form_validation->set_rules('confirmaSenha','Confirmar senha',array('trim','required','matches[novaSenha]'));
    // Delimitadores
    $this->form_validation->set_error_delimiters('<span class="text-danger">','</span>');

    $senhaAtual = hash('SHA256',$this->input->post('senhaAtual'));
    $novaSenha  = hash('SHA256',$this->input->post('novaSenha'));

    if ($this->form_validation->run()) {
      if ($this->Usuario_model->alterarSenha($this->session->id,$senhaAtual,$novaSenha))
        $this->session->set_flashdata('success','Senha alterada com sucesso');
      else
        $this->session->set_flashdata('danger','Não foi possível alterar a senha');

      redirect('Usuario/editar');
    }
  }

  /**
   * Validação e alteração do email
   * @author Caio de Freitas
   * @since 2017/05/23
   */
  private function alterarEmail () {

    // Regras de validação
    $this->form_validation->set_rules('novoEmail','email',array('trim','required','valid_email','is_unique[Usuario.email]'),array('is_unique'=>'O email informado já está cadastrado no sistema'));
    $this->form_validation->set_rules('confirmaEmail','email',array('trim','required','valid_email','matches[novoEmail]'));
    // Delimitadores
    $this->form_validation->set_error_delimiters('<span class="text-danger">','</span>');


    if ($this->form_validation->run()) {
      $emailAtual = $this->input->post('emailAtual');
      $novoEmail = $this->input->post('novoEmail');

      if ($this->Usuario_model->alterarEmail($this->session->id,$emailAtual,$novoEmail)) {
        $this->session->set_flashdata('success','Email alterado com sucesso');
        $this->session->email = $novoEmail;
      } else {
        $this->session->set_flashdata('danger','Não foi possível alterar o email');
      }

      redirect('Usuario/editar');
    }
  }

}


?>
