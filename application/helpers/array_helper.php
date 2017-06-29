<?php

  /**
   * @author Caio de Freitas
   */
  function construirVetor($vetor) {

    $newArray = array();
    foreach ($vetor as $v) {
      array_push($newArray,$v);
    }

    return $newArray;

  }

?>
