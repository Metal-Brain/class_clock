<?php defined('BASEPATH') OR exit('No direct script access allowed');

  /**
   *  Essa classe é um modelo que representa a relação Grau no banco de dados
   *  @author Caio de Freitas
   *  @since 2017/03/24
   */
  class Grau_model extends CI_Model {

    /**
      * Busca todos os graus cadastrados na base de dados.
      * @author Caio de Freitas
      * @since 2017/03/24
      * @return Array - Retorna um array com todos o graus
      */
    public function getAll () {
      $result = $this->db->get('Grau');
      return $result->result_array();
    }

  }


?>
