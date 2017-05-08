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
      * @param ARRAY $disponibilidade - Vetor com todos os dados de disponibilidade
      * @return boolean - Retorna TRUE caso os dados sejam inseridos no banco
      * de dados com sucesso.
      */
    public function insertDisponibilidade ($disponibilidade) {
      return $this->db->insert('Disponibilidade',$disponibilidade);
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

    public function getProfDisponibilidade ($idProfessor,$dia=NULL) {
      $this->db->where('idProfessor',$idProfessor);
      if ($dia)
        $this->db->where('dia',$dia);
      $this->db->where('status',TRUE);
      $this->db->order_by('inicio');
      $result = $this->db->get('Disponibilidade');

      return $result->result_array();
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

    public function verificaHorasPeriodo(){
      $query  = $this->db
              ->select('idPeriodo, count(idPeriodo) AS qtdAulasPeriodo')
              ->join('Periodo as p','p.id = Disponibilidade.idPeriodo')
              ->group_by('idPeriodo')
              ->order_by('qtdAulasPeriodo', 'desc')
              ->get('Disponibilidade');
      $result = $query->result_array();
      $matutino = $result[0];
      print_r($matutino);
    }

    public function verificaHorasDia($dia){
      $this->db->select('count(idPeriodo) AS qtdAulasDia');
      $this->db->join('Periodo as p','p.id = Disponibilidade.idPeriodo');
      $this->db->where('dia',$dia);
      $query = $this->db->get('Disponibilidade');
      $result = $query->row_array();

      if ($result['qtdAulasDia'] > 6) {
        return FALSE;
      }else{
        return TRUE;
      }

    }
  }

?>
