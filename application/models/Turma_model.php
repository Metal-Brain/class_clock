<?php defined('BASEPATH') OR exit('No direct script access allowed');

  /**
    * Essa classe é um modelo que representa a relação Curso da base de dados.
    * @author Caio de Freitas
    * @since 2017/03/20
    */
  class Turma_model extends CI_Model {

    /**
      * Essa função ira pegar tudo da tabela Turma
      * e colocar em um array.
      *  @since 2017/04/15
      *  @author Jean Brock
    */
    function getAll() {
      $result = $this->db->get('Turma');
      return $result->result_array();
    }

    /**
      * Essa função tem como objetivo encontrar uma Turma
      * pelo seu ID.
      * @since 2017/04/15
      * @author Jean Brock
      * @param  $idTurma - ID de Turmas
      * @return array de Turmas
    */
    function getTurmaById($idTurma) {
      $this->db->where('idTurma', $idTurma);
      $result = $this->db->get('Turma');
      return $result->result_array();
    }

    /**
      * Essa função insere uma Turma.
      * Caso esteja tudo correto, a turma
      * será inserido na tabela.
      * @since 2017/04/15
      * @author Jean Brock
      * @param  pega como paramentro $turma
      * @return uma inserção na tabela turma.
    */
    function insert($turma) {
      return $this->db->insert('Turma', $turma);
    }

    /**
      * Atualiza os dados da turma.
      * Caso seja preenchido corretamente.
      * os dados do turma serão atualizados.
      * @since 2017/04/15
      * @author Jean Brock
      * @param Int $idTurma - ID da turma
    */
    function updateTurma($idTurma, $turma) {
      $this->db->where('id', $idTurma);
      $result = $this->db->update('Turma', $turma);
      return $result;
    }

    /**
      * Deleta uma turma.
      * @since 2017/04/15
      * @author Jean Brock
      * @param Int $idTurma - ID da turma
      * @return altera o boolean  para TRUE ou False dos Dados caso Seja deletado.
    */
    function deleteTurma($idTurma) {
      $this->db->where('id', $idTurma);
      $result = $this->db->update('Turma', array('status' =>FALSE));
      return $result;
    }

	/**
      * Altera o status da turma para TRUE.
      * @since 2017/04/15
      * @author Jean Brock
      * @param INT $id - ID da turma
      * @return Retorna um boolean TRUE caso o status seja alterado
      */
    public function able ($id) {
      $this->db->where('id',$id);
      $result = $this->db->update('Turma',array('status'=>TRUE));
      return $result;
    }

  }

?>
