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
          'turno'       => ['index', 'cadastrar', 'salvar', 'editar', 'atualizar', 'deletar', 'ativar'],
          'tipo_Sala'   => ['index', 'cadastrar', 'salvar', 'editar', 'atualizar', 'deletar', 'ativar'],
          'modalidade'  => ['index', 'cadastrar', 'salvar', 'editar', 'atualizar', 'deletar', 'ativar']
        ],
          'ignore' => $param
      ]);
      $ci->my_auth->hasAccess();
    }
  }


?>
