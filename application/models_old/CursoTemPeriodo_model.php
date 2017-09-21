<?php defined('BASEPATH') OR exit('No direct script access allowed');

  /**
   *  Essa classe representa o modelo da relação Curso_tem_periodo do banco de
   *  dados.
   *  @author Caio de Freitas
   *  @since 2017/03/25
   */
  class CursoTemPeriodo_model extends CI_Model {

    /**
      * Insere no banco de dados os dados do relacionamento entre curso e
      * periodo.
      * @author Caio de Freitas
      * @since 2017/03/25
      * @param INT $curso - ID do curso.
      * @param INT $periodo - ID do periodo.
      * @return boolean - Retorna um boolean TRUE caso os dados sejam persistidos
      * com sucesso;
      */
    public function insert ($curso,$periodo) {
      return $this->db->insert('Curso_tem_Periodo',array('idCurso'=>$curso,'idPeriodo'=>$periodo));
    }

    public function delete ($curso) {
      $this->db->where('idCurso', $curso);
      $result = $this->db->delete('Curso_tem_Periodo');

      return $result;
    }

    public function getPeriodoByCurso($curso) {
      $this->db->where('idCurso',$curso);
      $result = $this->db->get('Curso_tem_Periodo');

      return $result->row()->idPeriodo;
    }
	
	public function getAllPeriodos($curso) {
      $this->db->select('Periodo.*');
      $this->db->where('idCurso',$curso);
      $this->db->join('Periodo','Periodo.id = Curso_tem_Periodo.idPeriodo');
      $result = $this->db->get('Curso_tem_Periodo');

      return $result->result_array();
    }
  }


?>
