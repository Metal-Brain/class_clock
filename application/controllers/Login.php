<?php defined('BASEPATH') OR exit('No direct script access allowed');

  /**
   *  Essa classe é responsavel por todas regras de negócio sobre logins.
   * @author Jean Brock
   * @since 2017/04/05
   */
  class Login extends CI_Controller {

    function __construct(){
   parent::__construct();
 }

 function index(){
   $this->load->helper(array('form'));
   $this->load->view('login');
 }

 function logout(){
   $this->session->sess_destroy();
   redirect('login', 'refresh');
 }
}
?>
