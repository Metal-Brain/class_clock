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

  function fimPeriodo ($periodo){
    $fim;

    switch ($periodo) {
      case 1:
        $fim = 12;
        break;

      case 2:
        $fim = 18;
        break;

      case 3:
        $fim = 22;
        break;
    }

    return $fim;
  }

  /**
   *
   * @since 2017/06/11
   */
  function inicioPeriodo ($periodo){
    $inicio;

    switch ($periodo) {
      case 1:
        $inicio = 7;
        break;

      case 2:
        $inicio = 14;
        break;

      case 3:
        $inicio = 19;
        break;
    }

    return $inicio;
  }

  /**
   * converte um numero da semana em dia da semana em texto.
   * @author Caio de Freitas
   * @since 201/06/11
   * @param INT $number - Dia da semana em número
   * @return Retorna o dia da semana em texto
   */
  function numberToDay($number) {
    $day = array (
      'segunda',
      'terça',
      'quarta',
      'quinta',
      'sexta',
      'sabado',
      'domingo'
    );

    return $day[$number];
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


  function getHorasPeriodo($periodo){
    switch ($periodo) {
      case 3:
        $horas = array(
          '19:00',
          '20:00',
          '21:00',
          '22:00'
        );
        break;

        case 2:
          $horas = array(
            '14:00',
            '15:00',
            '16:00',
            '17:00',
            '18:00'
          );
          break;

        case 1:
          $horas = array(
            '07:00',
            '08:00',
            '09:00',
            '10:00',
            '11:00',
            '12:00'
            );
            break;

    }
    return $horas;
  }


?>
