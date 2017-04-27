<?php defined('BASEPATH') OR exit('No direct script access allowed');

  /**
    * Essa classe representa o modelo da relação disponibilidade.
    * @author Jean Brock
    * @since 2017/04/27
    */
  class Disponibilidade_model extends CI_Model {

    /**
      * Insere no banco de dados os dado do relacionamento entre professor e
      * disponibilidade
      * @author Jean Brock
      * @since 2017/04/27
      * @param INT $professor - ID do professor
      * @param INT $periodo - ID do periodo
      * @param TIME $dia - dia da semana
      * @param TIME $inicio - hora de inicio
      * @param TIME $fim - hora de fim
      * @return boolean - Retorna TRUE caso os dados sejam inseridos no banco
      * de dados com sucesso.
      */
    public function insertDisponibilidade ($periodo, $professor, $dia, $inicio, $fim) {
      return $this->db->insert('Disponibilidade',array(
        'idPeriodo'       => $periodo,
        'idProfessor'     => $professor,
        'dia'             => $dia,
        'inicio'          => $inicio,
        'fim'             => $fim,
      ));
    }

    /**
      * Deleta um relação entre professor e periodo
      * @author Jean Brock
      * @since 2017/04/27
      * @param INT $professor - ID do professor
      * @param INT $periodo - ID do periodo
      * @return Retorna um boolean True caso a relação foi desfeita
      */
    public function delete ($periodo, $professor) {
      $this->db->where('idPeriodo', $periodo);
      $this->db->where('idProfessor', $professor);
      $result = $this->db->delete('Disponibilidade');

      return $result;
    }

    /**
      * @author Jean Brock
      * @since 2017/04/27
      * @param INT $professor - ID do professor
      * @return Retorna um array com todas as disponibilidade do professor
      */
    public function getAllDisponibilidades($professor) {
      $this->db->select('Disponibilidade.*');
      $this->db->where('idProfessor',$professor);
      $this->db->join('Professor','Professor.id = Disponibilidade.idProfessor');
      $result = $this->db->get('Disponibilidade');

      return $result->result_array();
    }
  }

?>
