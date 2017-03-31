<?php defined('BASEPATH') OR exit('No direct script access allowed');

  /**
   *  Esse modelo possui uma serie de funções sob a relação de salas.
   *  @author Jean Brock
   *  @since 2017/03/23
   */
  class Sala_model extends CI_Model {

    /**
      * Busca todas as salas cadastradas na base de dados.
      * @author Jean Brock
      * @since 2017/03/23
      * @return Retorna um array com todas as salas
      */
    public function getAll () {
      $this->db->where('status', TRUE);
      $result = $this->db->get('Sala');

      return $result->result_array(); // converte o objeto em um array
    }

    /**
      * Busca a sala a partir do ID
      * @author Jean Brock
      * @since 2017/03/23
      * @param INT $idSala
      * @return Retorna um array que representa a tupla.
      */
    public function getSalaById ($idSala) {
      $this->db->where('id', $idSala);
      $result = $this->db->get('Sala');

      return $result->result_array();
    }

    /**
      * Insere uma nova Sala na base de dados.
      * @author Jean Brock
      * @since 2017/03/23
      * @param Array $sala - array com os dados da salas
      * @return Retorna um boolean TRUE caso a inserção seja realizada com sucesso
      */
    public function insertSala ($sala) {
      return $this->db->insert('Sala', $sala);
    }

    /**
      * Atualiza os dados de uma sala
      * @author Jean Brock
      * @since 2017/03/23
      * @param INT $id - ID da sala
      * @return Retorna um boolean TRUE caso os dados sejam atualizados com sucesso
      */
    public function updateSala ($idSala, $sala) {
      $this->db->where('id', $idSala);
      $result = $this->db->update('Sala', $sala);

      return $result;
    }

    /**
      * Altera o status de uma sala para falso.
      * @author Jean Brock
      * @since 2017/03/23
      * @param INT $id - ID da disciplina
      * @return Retorna um boolean TRUE caso a sala seja deletada com sucesso
      */
    public function deleteSala ($idSala) {
      $this->db->where('id', $idSala);
      $result = $this->db->update('Sala',array('status'=>FALSE));

      return $result;
    }
  }
?>
