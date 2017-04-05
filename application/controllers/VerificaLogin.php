<?php defined('BASEPATH') OR exit('No direct script access allowed');

class VerificaLogin extends CI_Controller {

function __construct(){
   parent::__construct();
   $this->load->model('Login_model','',TRUE);
}

function index(){
   $this->load->library('form_validation');

   $this->form_validation->set_rules('username', 'Usuário', 'trim|required|xss_clean');
   $this->form_validation->set_rules('password', 'Senha',  'trim|required|xss_clean|callback_check_dados');

   if($this->form_validation->run() == FALSE){
     $this->load->view('login');
   } else {
     redirect('area_restrita', 'refresh');
   }
}

function check_dados(){
   $username = $this->input->post('username');
   $password = $this->input->post('password');
   $result = $this->Login_model->validate($username, $password);

   if($result){
     echo "Logado com sucesso!";
     $this->session->set_userdata("usuario_logado", $result);
     $this->session->set_flashdata("success", "Logado com Sucesso!");
     return true;
   } else {
     echo "Erro no login";
     $this->session->set_flashdata("danger", "Usuário ou senha inválida!");
     return false;
   }
}
}
?>
