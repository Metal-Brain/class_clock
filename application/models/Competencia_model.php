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
      * Deleta um relação entre professor e disciplina
      * @author Jean Brock
      * @since 2017/04/04
      * @param INT $professor - ID do professor
      * @return Retorna um boolean True caso a relação foi desfeita
      */
    public function delete ($professor) {
      $this->db->where('idProfessor', $professor);
      $result = $this->db->delete('Competencia');

      return $result;
    }

    /**
      * @author Jean Brock
      * @since 2017/04/04
      * @param INT $professor - ID do professor
      * @return Retorna um array com todas as disciplinas
      */
    public function getAllDisciplinas($professor) {
      $this->db->select('Disciplina.*');
      $this->db->where('idProfessor',$professor);
      $this->db->join('Disciplina','Disciplina.id = Competencia.idDisciplina');
      $result = $this->db->get('Competencia');

      return $result->result_array();
    }

  }

?>
