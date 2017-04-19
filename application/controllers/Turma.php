<?php defined('BASEPATH') OR exit('No direct script access allowed');
Class Turma extends CI_Controller{
     public function index(){
      $this->load->library(array('form_validation','session'));
		   $this->load->helper(array('form','url'));
           $this->load->model(array("Turma_model"));
		   $this->load->view('includes/header');
		   $this->load->view('includes/sidebar');
       	   $this->load->view('turmas/turmas');
		   $this->load->view('includes/footer');
		   $this->load->view('turmas/js_turmas');
			

     }
}
       ?>