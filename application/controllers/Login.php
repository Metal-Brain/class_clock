<?php defined('BASEPATH') OR exit('No direct script access allowed');

  /**
   *  Essa classe é responsavel por todas regras de negócio sobre logins.
   * @author Jean Brock
   * @since 2017/04/05
   */
  class Login extends CI_Controller {

    public function index(){

      $this->load->model('Usuario_model');

      $this->form_validation->set_rules('matricula','matrícula',array('required','numeric','exact_length[7]'));
      $this->form_validation->set_rules('password','Senha',array('required'));

      if ($this->form_validation->run() == false) {

        $this->load->view('login');
      } else {

        $usuario = array(
          'matricula' => $this->input->post('matricula'),
          'senha'     => hash('sha256', $this->input->post('password'))
        );

        $usuario = $this->Usuario_model->validate($usuario);

        // verifica se foi encontrado o usuário
        if ($usuario == NULL) {
          $this->session->set_flashdata('danger','Matrícula ou senha incorretos');
        } else {
          $this->session->set_userdata($usuario);

          if ($this->Usuario_model->isProfessor($usuario)) {
            $this->session->set_userdata('nivel', 2);
            redirect('Professor/preferencia');
          }

          $this->session->set_userdata('nivel', 1);
          redirect('Curso');

        }
        redirect('/');
      }

    }

    function verificaLogin(){
        $this->load->model(array('Login_model'));
        $username =($this->input->post("username"));
        $password= $this->input->post("password");

        $usuario = $this->Login_model->validate($username,$password);
        if($usuario){
          $this->session->set_userdata("usuario_logado", $usuario);
          $this->session->set_flashdata("success", "Logado com Sucesso!");
          redirect('Disciplina');
        } else {
          $this->session->set_flashdata("danger", "Usuário ou senha inválida!");
          $this->load->view('login');
        }
      }

    function logout(){

      $this->session->unset_userdata("usuario_logado");
      $this->session->set_flashdata("success", "Deslogado com Sucesso!");
      $this->session->sess_destroy();

      redirect('/');
    }

   }
   ?>
