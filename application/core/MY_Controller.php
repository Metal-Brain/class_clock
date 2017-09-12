<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require "exceptions/ValidationFailException.php";

class MY_Controller extends CI_Controller {

    protected $previous_page;
    protected $name;

    public function __construct() {
        parent::__construct();

        // Nome para ser utilizado em falhas
        if(is_null($this->name)){ $this->name = get_class($this); }

        // Informa o método que controlará as exceções
        set_exception_handler([$this, '_exception_handler']);
    }

    function run_validation() {
        if(!$this->form_validation->run()) {
            throw new ValidationFailException("Falha na validação");
        }
    }

    function request($field, $xss = null) {
        return $this->input->get_post($field, $xss);
    }

    function request_all() {
        return $this->request();
    }

    function set_validation($field, $label='', $rules='', $errors=[]){
        $this->form_validation->set_rules($field, $label, $rules, $errors);
    }

    function set_validations($rules=[]){
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

    function _exception_handler($exception) {
        $sess = $this->session;
        $exception_name = $this->get_exception_name($exception);

        switch ($exception_name) {
            case 'ModelNotFoundException':
                $sess->set_flashdata('danger', "{$model} não encontrado.");
                back();
                break;
            case 'ValidationFailException':
                $sess->set_flashdata('danger',"O cadastro de {$this->name} falhou!");
                back();
                break;
            default:
                // Se não for nenhum, chama o Exception Handler padrão do CodeIgniter
                _exception_handler($exception);
                break;
        }
    }

    private function get_exception_name($exception) {
        $broke_name = explode("\\", get_class($exception));
        return end($broke_name);
    }
}
