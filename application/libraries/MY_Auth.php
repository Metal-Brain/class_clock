<?php defined('BASEPATH') OR exit('No direct script access allowed');
  /**
   *
   */
  class MY_Auth {

    private $CI;
    private $allowedMethods;
    private $allowedControllers;
    private $ignore;

    function __construct($params) {
      $this->CI =& get_instance();
      $this->allowedMethods = $params['allowedMethods'];
      $this->allowedControllers = $params['allowedControllers'];
      $this->ignore = $params['ignore'];
    }

    public function hasAccess () {

      $class = $this->CI->router->class;
      $method = $this->CI->router->method;

      if ( !in_array($class,$this->ignore) ) {

        if (!$this->hasSession()) redirect('/');

        if (!in_array($class,$this->allowedControllers) && !in_array($method,$this->allowedMethods) ) {
          redirect('authError');
        }
      }

    }

    public function hasSession() {
      $usuario = $this->CI->session->userdata('usuario_logado');
      return isset($usuario);
    }
  }

?>
