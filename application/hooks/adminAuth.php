<?php defined('BASEPATH') OR exit('No direct script access allowed');

  /**
   *
   */
  class adminAuth {

    public function checkAuth($param) {
      $ci =& get_instance();
      $ci->load->library('my_auth',
      [
        'allowedControllersAndMethods' =>
        [
          'Turno' => ['index', 'cadastrar', 'salvar', 'editar', 'atualizar']
        ],
          'ignore' => $param
      ]);
      $ci->my_auth->hasAccess();
    }
  }


?>
