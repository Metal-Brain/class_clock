<?php

  function convert ($array, $addSelect=FALSE) {
    $result = array();
    if ($addSelect)
      $result[0] = 'Selecione';


    foreach ($array as $array)
      $result[$array['id']] = $array['nome'];

    return $result;
  }

?>
