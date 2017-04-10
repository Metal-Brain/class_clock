<?php

function autoriza(){
  $CI = get_instance();
  $usuarioLogado = $CI->session->userdata('usuario_logado');
  if (!$usuarioLogado) {
    $CI->session->set_flashdata("danger","Você precisa estar logado");
  }
  return $usuarioLogado;
}
