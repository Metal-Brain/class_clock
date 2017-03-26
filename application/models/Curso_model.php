<?php defined('BASEPATH') OR exit('No direct script access allowed');

  /**
    * Essa classe é um modelo que representa a relação Curso da base de dados.
    * @author Caio de Freitas
    * @since 2017/03/20
    */
  class Curso_model extends CI_Model {

    /**
          *Essa função ira pegar tudo da tabela Curso
          *e colocar em um array.
          *@author Felipe Ribeiro da Silva
          *@since 2017/03/21
    */
    function getAll() {
      $this->db->select('Curso.*, Grau.nome AS grauNome, GROUP_CONCAT(Periodo.nome) AS periodo');
      $this->db->join('Grau','Grau.id = Curso.grau');
      $this->db->join('Curso_tem_Periodo AS cp','cp.idCurso = Curso.id');
      $this->db->join('Periodo','Periodo.id = cp.idPeriodo');
      $this->db->where('status',True);
      $this->db->group_by('Curso.id');
      $result = $this->db->get('Curso');

      return $result->result_array();
    }

    /**
      * Essa função tem como objetivo encontrar um Curso
      * pelo seu ID.
      * @author Felipe Ribeiro da Silva
      * @since 2017/03/21
      * @param  $idCurso - ID de Cursos
      * @return array de Cursos
    */
    function getCursoById($idCurso) {
      $this->db->where('idCurso', $idCurso);
      $result = $this->db->get('Curso');

      return $result->result_array();
    }

    /**
      * Essa função insere um Curso.
      * Caso esteja tudo correto, o curso
      * será inserido na tabela.
      * @author Felipe Ribeiro da Silva
      * @since 2017/03/21
      * @param  pega como paramentro $curso
      * @return uma inserção na tabela curso.
    */
    function insert($curso) {
      return $this->db->insert('Curso', $curso);
    }

    /**
      * Atualiza os dados do usuario.
      * Caso seja preenchido corretamente.
      * os dados do usuario serão atualizados.
      * @author Felipe Ribeiro da Silva
      * @since 2017/03/21
      * @param Int $idCurso - ID do Curso
    */
    function updateCurso($idCurso, $curso) {
      $this->db->where('idCurso');
      $result = $this->db->update('Curso', $curso);

      return $result;
    }

    /**
      * Deleta um curso.
      * @author Felipe Ribeiro da Silva
      * @since 2017/03/21
      * @param Int $idCurso - ID do Curso
      * @return altera o boolean  para TRUE ou False dos Dados caso Seja deletado.
    */
    function deleteCurso($idCurso) {
      $this->db->where('id', $idCurso);
      $result = $this->db->update('Curso', array('status' =>FALSE));

      return $result;
    }

  }

?>
