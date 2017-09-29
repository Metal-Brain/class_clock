<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class authError extends CI_Controller
{

  function index()
  {
    $this->load->view('authError/authError', compact('authError'));
  }
}


?>
