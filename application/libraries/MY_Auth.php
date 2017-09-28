<?php defined('BASEPATH') OR exit('No direct script access allowed');
  /**
   *
   */
  class MY_Auth {

    private $CI;
    private $allowedControllersAndMethods;
    private $ignore;

    function __construct($params) {
      $this->CI =& get_instance();
      $this->allowedControllersAndMethods = $params['allowedControllersAndMethods'];
      $this->ignore = $params['ignore'];
    }

    public function hasAccess () {

      $class = strtolower($this->CI->router->class);
      $method = strtolower($this->CI->router->method);

      if ( !in_array($class,$this->ignore) ) {

        if (!$this->hasSession()){
          $message = "Necessário estar logado para acessar " . $class;
          $this->CI->session->set_flashdata('danger', $message);
          redirect('/');
        }

        if (!key_exists($class,$this->allowedControllersAndMethods))
          redirect('authError');

        if(!in_array($method, $this->allowedControllersAndMethods[$class]))
            redirect('authError');

      }

    }

    public function hasSession() {
      $usuario = $this->CI->session->userdata('usuario_logado');
      return isset($usuario);
    }
  }

?>
