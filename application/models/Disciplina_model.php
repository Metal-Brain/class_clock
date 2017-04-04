<?php defined('BASEPATH') OR exit('No direct script access allowed');

  /**
   *  Esse modelo possui uma serie de funções sob a relação de disciplinas.
   *  @author Caio de Freitas
   *  @since 2017/03/17
   */
  class Disciplina_model extends CI_Model {

    /**
      * Busca todas as disciplinas cadastradas na base de dados.
      * @author Caio de Freitas
      * @since 2017/03/17
      * @return Retorna um array com todas as disciplinas
      */
    public function getAll ($status=NULL) {
      if ($status)
        $this->db->where('status',$status);
      $result = $this->db->get('Disciplina');

      return $result->result_array(); // converte o objeto em um array
    }

    /**
      * Busca a disciplina a partir do ID
      * @author Caio de Freitas
      * @since 2017/03/17
      * @param INT $id ID da disciplina
      * @return Retorna um array que representa a tupla.
      */
    public function getById ($idDisciplina) {
      $this->db->where('id', $idDisciplina);
      $result = $this->db->get('Disciplina');

      return $result->result_array();
    }

    /**
      * Insere uma nova disciplina na base de dados.
      * @author Caio de Freitas
      * @since 2017/03/17
      * @param Array $disciplina - array com os dados da disciplina
      * @return Retorna um boolean TRUE caso a inserção seja realizada com sucesso
      */
    public function insert ($disciplina) {
      return $this->db->insert('Disciplina', $disciplina);
    }

    /**
      * Atualiza os dados de uma disciplina
      * @author Caio de Freitas
      * @since 2017/03/17
      * @param INT $idDisciplina - ID da disciplina
      * @return Retorna um boolean TRUE caso os dados sejam atualizados com sucesso
      */
    public function update ($idDisciplina, $disciplina) {
      $this->db->where('id', $idDisciplina);
      $result = $this->db->update('Disciplina', $disciplina);

      return $result;
    }

    /**
      * Altera o status de uma disciplina para falso.
      * @author Caio de Freitas
      * @since 2017/03/17
      * @param INT $id - ID da disciplina
      * @return Retorna um boolean TRUE caso a disciplina seja desativada com sucesso
      */
    public function disable ($id) {
      $this->db->where('id', $id);
      $result = $this->db->update('Disciplina',array('status'=>FALSE));

      return $result;
    }

    /**
      * Altera o status da disciplina para TRUE.
      * @author Caio de Freitas
      * @since 2017/03/31
      * @param INT $id - ID da disciplina
      * @return Retorna um boolean TRUE caso o status seja alterado
      */
    public function able ($id) {
      $this->db->where('id',$id);
      $result = $this->db->update('Disciplina',array('status'=>TRUE));

      return $result;
    }

  }


?>
