<?php defined('BASEPATH') OR exit('No direct script access allowed');

  /**
   *
   */
  class adminAuth {

    public function checkAuth($param) {
      $ci =& get_instance();
      $ci->load->library('my_auth',[
        'allowedControllers'=>[
          'Turno',
          'Login'
        ],
        'allowedMethods'    => [
          'index',
          'cadastrar'
        ],
        'ignore' => $param
      ]);
      $ci->my_auth->hasAccess();
    }
  }


?>
