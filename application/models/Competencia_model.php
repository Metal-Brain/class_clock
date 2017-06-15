<?php defined('BASEPATH') OR exit('No direct script access allowed');

  /**
    * Essa classe representa o modelo da relação Curso_tem_Disciplina.
    * @author Jean Brock
    * @since 2017/04/04
    */
  class Competencia_model extends CI_Model {

    /**
      * Insere no banco de dados os dado do relacionamento entre professor e
      * disciplina.
      * @author Jean Brock
      * @since 2017/04/04
      * @param INT $professor - ID do professor
      * @param INT $disciplina - ID da disciplina
      * @return boolean - Retorna TRUE caso os dados sejam inseridos no banco
      * de dados com sucesso.
      */
    public function insert ($professor, $disciplina) {
      return $this->db->insert('Competencia',array(
        'idProfessor'       => $professor,
        'idDisciplina'  => $disciplina
      ));
    }

    /**
     * @return Retorna um boolena TRUE caso a disciplina esteja vinculada ao
     * professor.
     */
    public function verificaCompetencia ($idProfessor,$idDisciplina) {
      $this->db->where('idProfessor',$idProfessor);
      $this->db->where('idDisciplina',$idDisciplina);
      $result = $this->db->get('Competencia')->num_rows();

      return ($result == 1) ? TRUE : FALSE;
    }

    /**
     *
     */
    public function setCompetencia ($idProfessor,$idDisciplina) {
      $this->db->where('idProfessor',$idProfessor);
      $this->db->where('idDisciplina',$idDisciplina);
      $result = $this->db->update('Competencia',array('active'=>TRUE));

      return $result;
    }

    /**
      * Deleta um relação entre professor e disciplina
      * @author Jean Brock
      * @since 2017/04/04
      * @param INT $professor - ID do professor
      * @return Retorna um boolean True caso a relação foi desfeita
      */
    public function delete ($professor) {
      $this->db->where('idProfessor', $professor);
      $result = $this->db->update('Competencia',array('active'=>FALSE));

      return $result;
    }

    /**
      * @author Jean Brock
      * @since 2017/04/04
      * @param INT $professor - ID do professor
      * @return Retorna um array com todas as disciplinas
      */
    public function getAllDisciplinas($professor) {
      $result = $this->db->get('disciplinaSigla');

      return $result->result_array();
    }

    public function insertPreferencia($idProfessor, $idDisciplina, $status){
			$this->db->where('idProfessor', $idProfessor);
			$this->db->where('idDisciplina', $idDisciplina);

			$result = $this->db->update('Competencia', array('interesse'=>$status));

			return $result;
		}

    public function clearPreferencia($idProfessor) {
      $this->db->update('Competencia', array('interesse'=>FALSE));
    }

    /**
     * Busca as disciplinas em que o professor quer lecionar.
     * @author Caio de Freitas
     * @since 2017/04/21
     * @param INT $idProfessor - ID do professor
     * @return Array - Retorna um vetor com as disciplinas.
     */
    public function getPreferencia ($idProfessor) {
      $this->db->where('idProfessor', $idProfessor);
      $this->db->where('interesse', TRUE);
      $result = $this->db->get('Competencia');

      return $result->result_array();
    }

  }

?>
