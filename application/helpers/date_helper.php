<?php

  /**
    * Converte uma data em formato BR para SQL
    * @author Caio de Freitas
    * @since 2017/04/03
    * @param String $date - Data em formato BR
    * @return Retorna uma string com a data em formato SQL
    */
  function brToSql ($date) {
    $d = explode('/',$date);
    return $d[2].'-'.$d[1].'-'.$d[0];
  }

  /**
   * Converte uma data em formato SQL para BR
   * @author Caio de Freitas
   * @since 2017/04/06
   * @param String $date - Data em formato SQL
   * @return Retorna uma string com a data em formato BR
   */
  function sqlToBr ($date) {
    $d = explode('-',$date);
    return $d[2].'/'.$d[1].'/'.$d[0];
  }

  /**
   * Essa função informa apartir da data atual qual o semestre inicial.
   * @author Caio de Freitas
   * @return Retorna um int 1(incio no primeiro semestre) ou 2 (inicio no segundo semestre)
   */
  function primeiroSemestre() {
    $date = Date('m');

    return ($date <= 6) ? 1 : 2;
  }

  function removerSegundos($time){
    $time = date_create($time);
    return date_format($time, "H:i");
  }
?>
