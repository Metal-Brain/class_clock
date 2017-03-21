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
    *@param Int $idCurso - ID do Curso
    *@return retorna um array com todos os cursos!
    */
    function getCurso() {
      $result = $this->db->get('Curso');

      return $result->result_array();
    }

    /**
    *Essa função tem como objetivo encontrar um Curso
    *pelo seu ID.
    *@author Felipe Ribeiro da Silva
    *@since 2017/03/21
    *@param Int $idCurso - ID do Curso
    *@return retorna um array do curso atraves do ID!
    */
    function getCursoById($idCurso) {
    $this->db->where('idCurso', $idCurso);
    $result = $this->db->get('Curso');

    return $result->result_array();
    }

    /**
    *Essa função insere um Curso.
    *Caso esteja tudo correto, o curso
    *será inserido na tabela.
    *@author Felipe Ribeiro da Silva
    *@since 2017/03/21
    *@param Int $idCurso - ID do Curso
    *@return Insere um curso na tabela Curso!
    */
    function insertCurso($curso) {
    return $this->db->insert('Curso', $curso);

    }

    /**
    *Atualiza os dados do usuario.
    *Caso seja preenchido corretamente.
    *os dados do usuario serão atualizados.
    *@author Felipe Ribeiro da Silva
    *@since 2017/03/21
    *@param Int $idCurso - ID do Curso
    *@return retorna boolean TRUE ou False dos Dados Caso seja Atualizado
    */

    function updateCurso($idCurso, $curso) {
    $this->db->where('idCurso');
    $result = $this->db->update('Curso', $curso);

    return $result;
    }

    /**
    *Deleta um curso.
    *@author Felipe Ribeiro da Silva
    *@since 2017/03/21
    *@param Int $idCurso - ID do Curso
    *@return retorna boolean TRUE ou False dos Dados Caso Seja deletado
    */

    function deleteCurso($idCurso) {
      $this->db->where('idCurso', $idCurso);
      $result = $this->db->update('Curso', array('statusCurso' =>FALSE));

      return $result;
    }

  }

?>
