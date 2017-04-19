<?php defined('BASEPATH') OR exit('No direct script access allowed');
<<<<<<< HEAD

=======
>>>>>>> 1979f79d960aa0ab3b35bc6e265fd19826e5519e
  /**
   *  Esse modelo possui uma serie de funções sob a relação de professores.
   *  @author Yasmin Sayad
   *  @since 2017/04/03
   */
  class Professor_model extends CI_Model {
<<<<<<< HEAD

=======
>>>>>>> 1979f79d960aa0ab3b35bc6e265fd19826e5519e
    /**
      * Busca todos os professores cadastrados na base de dados.
      * @author Yasmin Sayad
	  * @since 2017/04/03
      * @return Retorna um array com todos os professores
      */
    public function getAll () {
      $this->db->select('Professor.*, Contrato.nome AS contrato, Nivel.nome AS nivel');
      $this->db->join('Contrato','Contrato.id = Professor.idContrato');
      $this->db->join('Nivel','Nivel.id = Professor.idNivel');
      $result = $this->db->get('Professor');
<<<<<<< HEAD

      return $result->result_array(); // converte o objeto em um array
    }


=======
      return $result->result_array(); // converte o objeto em um array
    }
>>>>>>> 1979f79d960aa0ab3b35bc6e265fd19826e5519e
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
<<<<<<< HEAD

      return $result->result_array();
    }


=======
      return $result->result_array();
    }
>>>>>>> 1979f79d960aa0ab3b35bc6e265fd19826e5519e
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
<<<<<<< HEAD

=======
>>>>>>> 1979f79d960aa0ab3b35bc6e265fd19826e5519e
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
<<<<<<< HEAD

      return $result;
    }


=======
      return $result;
    }
>>>>>>> 1979f79d960aa0ab3b35bc6e265fd19826e5519e
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
<<<<<<< HEAD

      return $result;
    }


=======
      return $result;
    }
>>>>>>> 1979f79d960aa0ab3b35bc6e265fd19826e5519e
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
<<<<<<< HEAD

      return $result;
    }

  }



=======
      return $result;
    }
  }
>>>>>>> 1979f79d960aa0ab3b35bc6e265fd19826e5519e
?>
