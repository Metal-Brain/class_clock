<?php

function autoriza(){
  $CI = get_instance();
  $usuarioLogado = $CI->session->userdata('usuario_logado');
  if (!$usuarioLogado) {
    $CI->session->set_flashdata("danger","Você precisa estar logado");
  }
  return $usuarioLogado;
}


function verificaSessao () {
  $CI = get_instance();
  $usuario = $CI->session->userdata();

  return (sizeof($usuario) > 1) ? TRUE : FALSE;
}

function verificaNivelPagina($niveis) {
  $CI = get_instance();
  return in_array($CI->session->nivel, $niveis);
}
