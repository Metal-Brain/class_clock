<?php

function verificaSessao () {
  $CI = get_instance();
  $usuario = $CI->session->userdata();

  return (sizeof($usuario) > 1) ? TRUE : FALSE;
}

function verificaNivelPagina($niveis) {
  $CI = get_instance();
  return (array_search($CI->session->nivel, $niveis) === false) ? FALSE : TRUE;
}
