<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    protected $previous_page;

    public function __construct() {
        parent::__construct();

        // pega a página anterior

        // $this->previous_page = $this->session->userdata('_previous_page');
        // $this->session->set_userdata('_previous_page', current_url());

        // Informa o método que controlará as exceções
        // set_exception_handler([$this, '_exception_handler']);
    }

    // /**
    // * @author: Vitor "Pliavi"
    // * retorna para página anterior
    // */
    // protected function back() {
    //     if(!empty($this->previous_page)){
    //         redirect($this->previous_page);
    //     } else {
    //         throw new UnexpectedValueException('Nenhuma url para retorno encontrada');
    //     }
    // }

    // public function _exception_handler($exception) {
    //     $exception_name = $this->get_exception_name($exception);
    //
    //     switch ($exception_name) {
    //         case 'ModelNotFoundException':
    //             // $name = $exception->getModel();
    //             echo $this->previous_page;
    //             // $this->back();
    //             break;
    //         case 'QueryException':
    //             echo $this->previous_page;
    //             // $this->back();
    //             break;
    //         default:
    //             _exception_handler($exception);
    //             break;
    //     }
    //
    // }
    //
    // private function get_exception_name($exception) {
    //     $broke_name = explode("\\", get_class($exception));
    //     return end($broke_name);
    // }
}
