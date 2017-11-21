<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ValidationFailException extends Exception {

    private $redirect_URL;

    public function __construct ($redirect_URL, $message) {
        $this->redirect_URL = $redirect_URL;
        parent::__construct($message);
    }

    public function getURL(){
        return $this->redirect_URL;
    }
}
