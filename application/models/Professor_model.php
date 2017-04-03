<?php defined('BASEPATH') OR exit('No direct script access allowed');

  /**
   *  Esse modelo possui uma serie de funções sob a relação de professores.
   *  @author Yasmin Sayad
   *  @since 2017/04/03
   */
  class Professor_model extends CI_Model {

    /**
      * Busca todos os professores cadastrados na base de dados.
      * @author Yasmin Sayad
	  * @since 2017/04/03
      * @return Retorna um array com todos os professores
      */
    public function getAll () {
      $result = $this->db->get('Professor');

      return $result->result_array(); // converte o objeto em um array
    }

    /**
      * Busca o professor a partir do ID
      * @author Yasmin Sayad
	  * @since 2017/04/03
      * @param INT $id ID do professor
      * @return Retorna um array que representa a tupla.
      */
    public function getById ($idProfessor) {
      $this->db->where('id', $idProfessor);
      $result = $this->db->get('Professor');

      return $result->result_array();
    }

    /**
      * Insere um novo professor na base de dados.
      * @author Yasmin Sayad
	  * @since 2017/04/03
      * @param Array $professor - array com os dados do professor
      * @return Retorna um boolean TRUE caso a inserção seja realizada com sucesso
      */
    public function insert ($professor) {
      return $this->db->insert('Professor', $professor);
    }

    /**
      * Atualiza os dados de um professor
      * @author Yasmin Sayad
	  * @since 2017/04/03
      * @param INT $idProfessor - ID do professor
      * @return Retorna um boolean TRUE caso os dados sejam atualizados com sucesso
      */
    public function update ($idProfessor, $professor) {
      $this->db->where('id', $idProfessor);
      $result = $this->db->update('Professor', $professor);

      return $result;
    }

    /**
      * Altera o status de um professor para falso.
      * @author Yasmin Sayad
	  * @since 2017/04/03
      * @param INT $id - ID do professor
      * @return Retorna um boolean TRUE caso o professor seja desativado com sucesso
      */
    public function disable ($id) {
      $this->db->where('id', $id);
      $result = $this->db->update('Professor',array('status'=>FALSE));

      return $result;
    }

    /**
      * Altera o status do professor para TRUE.
      * @author Yasmin Sayad
	  * @since 2017/04/03
      * @param INT $id - ID do professor
      * @return Retorna um boolean TRUE caso o status seja alterado
      */
    public function able ($id) {
      $this->db->where('id',$id);
      $result = $this->db->update('Professor',array('status'=>TRUE));

      return $result;
    }

  }


?>
