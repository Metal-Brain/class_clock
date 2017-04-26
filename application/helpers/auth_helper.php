<?php

function verificaSessao () {
  $CI = get_instance();
  $usuario = $CI->session->userdata();

  return (sizeof($usuario) > 1) ? TRUE : FALSE;
}

/**
 * Essa função verifica se o usuário tem permissão para acessar a página.
 * 1 - Acesso administrador
 * 2 - Acesso Professor
 * @author Caio de Freitas
 * @since 2017/04/14
 * @param Array $niveis - Vetor com as permessões que a página possui.
 * @return Retorna um Boolean true caso o usuário tenha permissão para acessar a página
 */
function verificaNivelPagina($niveis) {
  $CI = get_instance();
  return (array_search($CI->session->nivel, $niveis) === false) ? FALSE : TRUE;
}
