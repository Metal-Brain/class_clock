<?php defined('BASEPATH') OR exit('No direct script access allowed');

  /**
    * Essa classe é uma modelo que representa a relação "Periodo" no banco de dados.
    * @author Caio de Freitas
    * @since 2017/03/24
    */
  class Periodo_model extends CI_Model {

    /**
      * Busca todos os periodos cadastrados na base de dados
      * @author Caio de Freitas
      * @since 2017/03/24
      * @return Array - Retorna uma array com todos os periodos
      */
    public function getAll () {
      $result = $this->db->get('Periodo');
      return $result->result_array();
    }

    public function getTurno () {
      $this->db->where('nome !=', 'Integral');
      return $result = $this->db->get('Periodo')->result_array();
    }

  }

?>
