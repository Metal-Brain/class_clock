<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *  Regras de negócio sobre Modalidade.
 * @author Jean Brock
 * @since 2017/08/20
 */
class ConsultaDocente extends CI_Controller {

    /**
    * Página inicial da consulta dos docentes
    * @author Thalita Barbosa
    */
    function index () {
        $modalidades = Modalidade_model::withTrashed()->get();
        $this->load->template('modalidades/modalidades', compact('modalidades'),'modalidades/js_modalidades');
    }
}
