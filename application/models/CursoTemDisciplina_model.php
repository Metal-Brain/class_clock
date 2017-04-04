<?php defined('BASEPATH') OR exit('No direct script access allowed');

  /**
    * Essa classe representa o modelo da relação Curso_tem_Disciplina.
    * @author Caio de Freitas
    * @since 2017/03/25
    */
  class CursoTemDisciplina_model extends CI_Model {

    /**
      * Insere no banco de dados os dado do relacionamento entre curso e
      * disciplina.
      * @author Caio de Freitas
      * @since 2017/03/
      * @param INT $curso - ID do curso
      * @param INT $disciplina - ID da disciplina
      * @return boolean - Retorna TRUE caso os dados sejam inseridos no banco
      * de dados com sucesso.
      */
    public function insert ($curso, $disciplina) {
      return $this->db->insert('Curso_tem_Disciplina',array(
        'idCurso'       => $curso,
        'idDisciplina'  => $disciplina
      ));
    }

    /**
      * Deleta um relação entre curso e disciplina
      * @author Caio de Freitas
      * @since 2017/03/28
      * @param INT $curso - ID do curso
      * @return Retorna um boolean True caso a relação foi desfeita
      */
    public function delete ($curso) {
      $this->db->where('idCurso', $curso);
      $result = $this->db->delete('Curso_tem_Disciplina');

      return $result;
    }

    /**
      * @param INT $curso - ID do curso
      * @return Retorna um array com todas as disciplinas
      */
    public function getAllDisciplinas($curso) {
      $this->db->select('Disciplina.*');
      $this->db->where('idCurso',$curso);
      $this->db->join('Disciplina','Disciplina.id = Curso_tem_Disciplina.idDisciplina');
      $result = $this->db->get('Curso_tem_Disciplina');

      return $result->result_array();
    }

    public function hasRelation($idDisciplina) {
      $this->db->where('idDisciplina', $idDisciplina);
      $result = $this->db->get('Curso_tem_Disciplina');

      return $result->num_rows();
    }

  }

?>
