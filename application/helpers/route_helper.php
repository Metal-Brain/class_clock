<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* @author Vitor "Pliavi"
* Redireciona à pagina anterior salva na seção pelo RouteHook
*/
function back() {
    $sess = get_instance()->session;

    if($sess->userdata('_previous_page') != $sess->userdata('_current_page')){
        redirect($sess->userdata('_previous_page'));
    } else {
        echo "Erro antes do loop: " . $sess->flashdata('_last_exception') . "\n<br>";
        die('O redirecionamento página anterior entrou em loop');
    }
}
