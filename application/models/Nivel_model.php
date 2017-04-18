<?php defined('BASEPATH') OR exit('No direct script access allowed');

  /**
   *  Essa classe é um modelo que representa a relação Nivel no banco de dados
   * @author Jean Brock
   * @since 2017/04/04
   */
  class Nivel_model extends CI_Model {

    /**
      * Busca todos os niveis cadastrados na base de dados.
      * @author Jean Brock
      * @since 2017/04/04
      * @return Array - Retorna um array com todos o niveis.
      */
    public function getAll () {
      $result = $this->db->get('Nivel');
      return $result->result_array();
    }

  }


?>
