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

    $this->load->model(array('Competencia_model','Disciplina_model','Usuario_model'));

    switch ($action) {
      case 'senha':
        $this->alterarSenha();
        break;
      case 'email':
        $this->alterarEmail();
        break;
      case 'disciplinas':
        $this->alterarDisciplinas();
        break;
    }

    $dados['disciplinas'] = convert($this->Disciplina_model->getAll(TRUE));

    $this->load->view('includes/header',$dados);
    $this->load->view('includes/sidebar');
    $this->load->view('configuracoes/configuracoes');
    $this->load->view('includes/footer');
    $this->load->view('configuracoes/js_configuracoes');

  }

  public function alterarDisciplinas () {
    // Regras de validação
    $this->form_validation->set_rules('disciplinas[]','disciplinas',array('required'));
    // Delimitadores
    $this->form_validation->set_error_delimiters('<span class="text-danger">','</span>');

    if ($this->form_validation->run()) {
      $disciplinas = $this->input->post('disciplinas[]');

      $id = $this->session->id;

      $this->Competencia_model->delete($id);
      foreach ($disciplinas as $idDisciplina){
        if ($this->Competencia_model->verificaCompetencia($id,$idDisciplina))
          $this->Competencia_model->setCompetencia($id,$idDisciplina);
        else
          $this->Competencia_model->insert($id,$idDisciplina);
      }

      $this->session->set_flashdata('success','Disciplinas alterado com sucesso');

      redirect("Usuario/editar");
    }
  }

  /**
   * Valida o formulário para alteração de senha e altera a senha do usuário.
   * @author Caio de Freitas
   * @since 2017/05/23
   */
  private function alterarSenha () {
    // Regras de validação
    $this->form_validation->set_rules('senhaAtual','senha atual',array('trim','required','callback_checkUserPassword'));
    $this->form_validation->set_rules('novaSenha','nova senha',array('trim','required'));
    $this->form_validation->set_rules('confirmaSenha','confirmar senha',array('trim','required','matches[novaSenha]'));
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
   * Função para validar a senha informada pelo usuário no formulário de alteração
   * de senha.
   * @author Caio de Freitas
   * @since 2017/05/24
   * @param Senha informado pelo usuário.
   */
  public function checkUserPassword ($password) {
    $password = hash('SHA256',$password);
    if ($this->Usuario_model->checkPassword($this->session->id,$password)) {
      return TRUE;
    } else {
      $this->form_validation->set_message('checkUserPassword','A {field} está incorreta');
      return FALSE;
    }
  }

  /**
   * Validação e alteração do email
   * @author Caio de Freitas
   * @since 2017/05/23
   */
  private function alterarEmail () {

    // Regras de validação
    $this->form_validation->set_rules('novoEmail','email',array('trim','required','valid_email','is_unique[Usuario.email]'),array('is_unique'=>'O e-mail informado já está cadastrado no sistema'));
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
  
	public function verificaEmail(){
      $validate_data = array('novoEmail' => $this->input->get('novoEmail'));
      $this->form_validation->set_data($validate_data);
      $this->form_validation->set_rules('novoEmail', 'email', 'is_unique[Usuario.email]');

      if($this->form_validation->run() == FALSE){
        echo "false";
      }else{
        echo "true";
      }
    }

}


?>
