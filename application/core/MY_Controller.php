<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    protected $name; // Nome alternativo para mostrar nos erros

    public function __construct() {
        parent::__construct();

        // Nome para ser utilizado em falhas
        if(is_null($this->name)){ $this->name = get_class($this); }

        // Informa o método que controlará as exceções

        // set_exception_handler([$this, '_exception_handler']);
        set_exception_handler([$this, '_exception_handler']);

    }

    /**
    * Roda a validação e gera uma exceção em caso de falha
    * @author Vitor "Pliavi"
    * @throws ValidationFailException
    */
    function run_validation() {
        return $this->form_validation->run();
    }

    /**
    * Busca valores nos verbos GET e POST
    * @author Vitor "Pliavi"
    * @param $field campo a ser buscado
    * @param $xss verifica a necessidade de cross-site script
    * @return null|mixed Dado solicitado
    */
    function request($field = null, $xss = null) {
        return $this->input->get_post($field, $xss);
    }

    /**
    * Busca todos os valores nos verbos GET e POST
    * @author Vitor "Pliavi"
    * @return array array com todos os dados
    */
    function request_all() {
        return $this->request();
    }

    /**
    * Adiciona uma regra de validação
    * @author Vitor "Pliavi"
    * @param $field campo a ser verificado
    * @param $label nome alternativo do campo
    * @param $rules regras de validação
    * @param $errors mensagens de erro
    */
    function set_validation($field, $label='', $rules='', $errors=[]){
        $this->form_validation->set_rules($field, $label, $rules, $errors);
    }

    /**
    * Adiciona várias regras de validação
    * @param $rules array de regras de validação
    */
    function set_validations($rules=[]) {
        foreach ($rules as $rule) {
            list($field, $label, $rules, $errors) = [
                $rule[0],
                isset($rule[1]) ? $rule[1] : '',
                isset($rule[2]) ? $rule[2] : '',
                isset($rule[3]) ? $rule[3] : [],
            ];
            $this->set_validation($field, $label, $rules, $errors);
        }
    }

    /**
    * Controla exceções específicas e já dá os retornos automaticamente, é função mágica
    * @author Vitor "Pliavi"
    * @param $exception entrada de exceção
    */
    function _exception_handler($exception) {
        $sess = $this->session;
        $exception_name = $this->get_exception_name($exception);

        $this->session->set_flashdata('_last_exception',$exception->getMessage());

        switch ($exception_name) {
            case 'ModelNotFoundException':
                $sess->set_flashdata('danger', "{$model} não encontrado.");
                back();
                break;

            // case 'ValidationFailException':
            //     $sess->set_flashdata('danger',"O cadastro de {$this->name} falhou!");
            //     log_message('error', validation_errors());
            //     redirect($exception->getURL());
            //     break;

            case 'ValidationFailException':
                $sess->set_flashdata('danger',"O cadastro de {$this->name} falhou!");
                log_message('error', validation_errors());
                redirect($exception->getURL());
                break;

            default:
                // Se não for nenhum, chama o Exception Handler padrão do CodeIgniter
                _exception_handler($exception);
                break;
        }
    }

    /**
    * Pega o último nome da exceção, removendo o namespace caso exista
    * @author Vitor "Pliavi"
    * @param $exception
    */
    private function get_exception_name($exception) {
        $broke_name = explode("\\", get_class($exception));
        return end($broke_name);
    }
}
