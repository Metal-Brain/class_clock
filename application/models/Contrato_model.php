<?php defined('BASEPATH') OR exit('No direct script access allowed');
  /**
   *  Essa classe é um modelo que representa a relação Contrato no banco de dados
   * @author Jean Brock
   * @since 2017/04/04
   */
  class Contrato_model extends CI_Model {
    /**
      * Busca todos os graus cadastrados na base de dados.
      * @author Jean Brock
      * @since 2017/04/04
      * @return Array - Retorna um array com todos o contratos
      */
    public function getAll () {
      $result = $this->db->get('Contrato');
      return $result->result_array();
    }
  }
?>
