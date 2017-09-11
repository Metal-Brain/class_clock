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
}
