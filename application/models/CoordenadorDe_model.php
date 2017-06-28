<?php defined('BASEPATH') OR exit('No direct script access allowed');

  /**
     * Essa classe representa o modelo da relação Curso_tem_Disciplina.
     * @author Jean Brock
    * @since 2017/04/04
    */
  class CoordenadorDe_model extends CI_Model {

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
    public function insert ($idCoordenador, $idProfessor) {
      return $this->db->insert('CoordenadorDe',array(
        'idCoordenador'       => $idCoordenador,
        'idProfessor'  => $idProfessor
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
      $this->db->where('idCoordenador', $professor);
      $result = $this->db->delete('CoordenadorDe');

      return $result;
    }

    /**
      * @author Jean Brock
      * @since 2017/04/04
      * @param INT $professor - ID do professor
      * @return Retorna um array com todas as disciplinas
      */
    public function getAllProfessor($idCoordenador) {
      $this->db->select('Professor.*');
      $this->db->where('idCoordenador',$idCoordenador);
      $this->db->join('Professor','Professor.id = CoordenadorDe.idProfessor');
      $result = $this->db->get('CoordenadorDe');

      return $result->result_array();
    }

    public function insertCoordenadorDe($idProfessor, $idCoordenador){
      $result = $this->db->insert('CoordenadorDe',array('idProfessor'=>$idProfessor,'idCoordenador'=>$idCoordenador));

			return $result;
		}

    public function clearProfessor($id) {
      $this->db->where('idCoordenador',$id);
      return $this->db->delete('CoordenadorDe');
    }

    /**
     * Busca as disciplinas em que o professor quer lecionar.
     * @author Caio de Freitas
     * @since 2017/04/21
     * @param INT $idProfessor - ID do professor
     * @return Array - Retorna um vetor com as disciplinas.
     */
    public function getCoordenadorDe ($idCoordenador) {
      $this->db->where('idCoordenador', $idCoordenador);
      $result = $this->db->get('CoordenadorDe');

      return $result->result_array();
    }

    /**
     * Altera o relacionamento entre coodenador e coordenado.
     * @author Caio de Freitas Adriano
     * @since 2017/06/08
     * @param INT $idCoordenador - Identificador do professores coordenador.
     * @param ARRAY $professores - Vetor com todos os professores
     * @return retorna um boolean true caso as modificações sejam realizadas.
     */
    public function setCoordenadorDe($idCoordenador,$professores) {
      $this->db->where_in('idProfessor',$professores);
      $this->db->set('idCoordenador',$idCoordenador);
      $result = $this->db->update('CoordenadorDe');

      return $result;
    }

  }

?>
