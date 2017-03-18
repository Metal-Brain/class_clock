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
    public function getDisciplinas () {
      $this->db->where('status', TRUE);
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
    public function getDisciplinasById ($idDisciplina) {
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
    public function insertDisciplina ($disciplina) {
      return $this->db->insert('Disciplina', $disciplina);
    }

    /**
      * Atualiza os dados de uma disciplina
      * @author Caio de Freitas
      * @since 2017/03/17
      * @param INT $idDisciplina - ID da disciplina
      * @return Retorna um boolean TRUE caso os dados sejam atualizados com sucesso
      */
    public function updateDisciplina ($idDisciplina, $disciplina) {
      $this->db->where('id', $idDisciplina);
      $result = $this->db->update('Disciplina', $disciplina);

      return $result;
    }

    /**
      * Altera o status de uma disciplina para falso.
      * @author Caio de Freitas
      * @since 2017/03/17
      * @param INT $id - ID da disciplina
      * @return Retorna um boolean TRUE caso a disciplina seja deletada com sucesso
      */
<<<<<<< 158aac098ef9eb44f921b3c68181cecd103b6f23
    public function deleteDisciplina ($id) {
      $this->db->where('id', $id);
      $result = $this->db->update('Disciplina',array('status'=>FALSE));
=======
    public function deleteDisciplina ($idDisciplina) {
      $this->db->where('idDisciplina', $idDisciplina);
      $result = $this->db->update('Disciplina',array('statusDisciplina'=>FALSE));
>>>>>>> Realizada modificação no model e script da relação de disciplina

      return $result;
    }

  }


?>
