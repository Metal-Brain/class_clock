<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MY_Form_validation extends CI_Form_validation {
    protected $CI;
    public function __construct() {
        parent::__construct();
        $this->CI =& get_instance();
    }
    public function valid_date($date) {
        $this->CI->form_validation->set_message('valid_date', 'O campo %s não contém uma data válida.');
        $format = 'Y-m-d';
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) == $date;
    }
    public function is_unique_except($value, $field_and_except){
        $controller = $this->CI;
        $db = $controller->db;
        $controller->form_validation->set_message('is_unique_except', '{field} já existente.');
        list($table_field, $except) = explode(',', $field_and_except);
        list($table, $field) = explode('.', $table_field);
        if($value == $except) {
            return true;
        }
        $db->select('*')->from($table);
        $db->where($field, $value);
        $db->limit(1);
        return $db->get()->num_rows() == 0;
    }

	public function alpha_accent($str){
		$controller = $this->CI;
        $controller->form_validation->set_message('alpha_accent', 'O campo {field} pode conter apenas letras, espaços e acentos.');
		return (bool) preg_match('/^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$/', $str);
	}
}