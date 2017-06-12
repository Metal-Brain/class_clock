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
      $this->db->where('status',TRUE);
      $this->db->join('Professor','Professor.id = Disponibilidade.idProfessor');
      $result = $this->db->get('Disponibilidade');

      return $result->result_array();
    }

    public function getDisponibilidade($idDisciplina,$dia,$hora) {
      $this->db->select('Competencia.idDisciplina, Disponibilidade.*');
      $this->db->join('Professor','Professor.id = Disponibilidade.idProfessor');
      $this->db->join('Competencia','Competencia.idProfessor = Professor.id');
      $this->db->where('Disponibilidade.dia',$dia);
      $this->db->where('Disponibilidade.inicio',$hora);
      $this->db->where('Competencia.idDisciplina',$idDisciplina);
      $result = $this->db->get('Disponibilidade');

      return $result->result();
    }

    public function able($id){
      $this->db->where('id', $id);
      $result = $this->db->update('Disponibilidade',array('status'=>TRUE));
      return $result;
    }

    public function disable($id){
      $this->db->where('id', $id);
      $result = $this->db->update('Disponibilidade',array('status'=>FALSE));
      return $result;
    }

    public function verificaHora($dia, $inicio, $idProfessor){
      $this->db->select('Disponibilidade.*');
      $this->db->where('idProfessor',$idProfessor);
      $this->db->where('dia',$dia);
      $this->db->where('inicio',$inicio);
      $this->db->where('status',TRUE);
      $result = $this->db->get('Disponibilidade');
      if ($result->num_rows() > 0) {
        return FALSE;
      }else {
        return TRUE;
      }

    }

    public function getPorPeriodo($idPeriodo){
      $this->db-where('idPeriodo',$idPeriodo);
      $this->db->where('status',TRUE);
      return $result = $this->db->get('Disponibilidade')->result_array();
    }
  }

?>
