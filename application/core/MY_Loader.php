<?php

/**
 *
 */
class My_Loader extends CI_Loader
{

  function template($path,$data = null,$js = null) {
    $this->view('includes/header');
    $this->view('includes/sidebar');
    $this->view($path,$data);
    $this->view('includes/footer');
	$this->view($js); //O erro está aqui ou no controller!
  }
}


?>
