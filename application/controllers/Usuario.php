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
    $this->form_validation->set_rules('novaSenha','senha',array('trim','required'));
    $this->form_validation->set_rules('confirmaSenha','senha',array('trim','required'));
    // Delimitadores
    $this->form_validation->set_error_delimiters('<span class="text-danger">','</span>');

    if ($this->form_validation->run()) {
      if ($this->Usuario_model->alterarSenha($this->session->id,$senhaAtual,$novaSenha))
        $this->session->set_flashdata('success','Senha alterada com sucesso');
      else
        $this->session->set_flashdata('danger','Não foi possivel alterar a senha');

      redirect('Usuario/editar');
    }
  }

}


?>
