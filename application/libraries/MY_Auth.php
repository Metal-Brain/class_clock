<?php defined('BASEPATH') OR exit('No direct script access allowed');
  /**
   *
   */
  class MY_Auth {

    private $CI;
    private $allowedMethods;
    private $allowedControllers;

    function __construct($params) {
      $this->CI =& get_instance();
      $this->allowedMethods = $params['allowedMethods'];
      $this->allowedControllers = $params['allowedControllers'];
    }

    public function hasAccess () {

    }

    public function hasSession() {
      $usuario = $this->CI->session->userdata('usuario_logado');
      return isset($usuario);
    }
  }

?>
