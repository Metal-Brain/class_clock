<?php
class My_Loader extends CI_Loader {

  function template($path, $data = null, $js = null) {
    $this->view('includes/header');
    $this->view('includes/sidebar');
    $this->view($path,$data);
    if(!is_null($js)){
        $this->view($js);
    }
    $this->view('includes/footer');
  }
}
