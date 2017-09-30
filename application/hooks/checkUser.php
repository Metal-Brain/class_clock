<?php defined('BASEPATH') OR exit('No direct script access allowed');

  /**
   *
   */
class checkUser {
    private $CI;
    private $controller;
    private $method;

    public function __construct(){
        $this->CI           = &get_instance();
        $this->controller   = strtolower($this->CI->router->class);
        $this->method       = strtolower($this->CI->router->method);
    }

    public function check($param) {

        $user = $this->CI->session->userdata('usuario_logado');

        if ( !in_array($this->controller, $param) ) {
            
            if (!isset($user)){
                $message = "Necessário estar logado para acessar " . $class;
                $this->CI->session->set_flashdata('danger', $message);
                redirect('/');
            }

            switch($user['tipo']){
                case 1:
                    $this->setAdmin();
                    break;
                case 2:
                    $this->setCRA();
                    break;
                case 3;
                    break;
                case 4;
                    break;
                default:
                    redirect('authError');
                    break;
            }
        }
        
    }

    private function setAdmin(){
        $acess =
        [
            'turno'       => ['index', 'cadastrar', 'salvar', 'editar', 'atualizar', 'deletar', 'ativar'],
            'tipo_sala'   => ['index', 'cadastrar', 'salvar', 'editar', 'atualizar', 'deletar', 'ativar'],
            'modalidade'  => ['index', 'cadastrar', 'salvar', 'editar', 'atualizar', 'deletar', 'ativar']
        ];

        $this->hasAccess($acess);
    }

    private function setCRA(){
        $acess =
        [
            'turno'       => ['index'],
            'tipo_sala'   => ['index'],
            'modalidade'  => ['index']
        ];

        $this->hasAccess($acess);
    }

    private function hasAccess ($acess) {
        if (!key_exists($this->controller, $acess))
        redirect('authError');

        if(!in_array($this->method, $acess[$this->controller]))
        redirect('authError');
    }

}


?>
