<?php


  /**
   * Gera uma senha aleatória.
   * @author Caio de Freitas
   * @since 2017/04/14
   * @param INT $length - Tamanho da senha.
   * @return String - Retorna a senha gerada.
   */
  function gerate ($length) {

    $password = '';

    $uppercase = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $lowercase = 'abcdefghijklmnopqrstuvwxyz';
    $validChar = '';
    $number = '123456789';

    // Setando os caracteres válidos
    $validChar .= $uppercase;
    $validChar .= $lowercase;
    $validChar .= $number;

    $charLength = strlen($validChar);

    // Gerando a senha
    for ($i = 0; $i < $length; $i++) {
      $rand = mt_rand(1,$charLength);
      $password .= $validChar[$rand-1];
    }

    return $password;
  }

?>
