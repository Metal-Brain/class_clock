<?php defined('BASEPATH') OR exit('No direct script access allowed');

class RouteHook {

    /**
    * @author Vitor "Pliavi"
    * Coloca na sessão a págian atual e a página anterior para utilização
    * em redirecionamento
    */
    function setPreviousPage(){
        $sess = get_instance()->session;
        $sess->set_userdata('_previous_page', $sess->userdata('_current_page'));
        $sess->set_userdata('_current_page', current_url());
    }
}
