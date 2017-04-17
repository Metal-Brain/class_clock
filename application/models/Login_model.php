<?php defined('BASEPATH') OR exit('No direct script access allowed');

  /**
   *  Esse modelo possui uma serie de funções sob a relação de login.
   *  @author Jean Brock
   *  @since 2017/04/05
   */
  class Login_model extends CI_Model {

    /**
      * Verifica se existe o login no banco
      * @author Jean Brock
      * @since 2017/04/05
      * @return Retorna um objeto login
      */
    public function validate($usuario){
      $this->db->where("matricula", $usuario['matricula']);
      $this->db->where("senha", $usuario['senha']);
      $this->db->where('status', TRUE); // Verifica o status do usuário
      $usuario = $this->db->get("Usuario")->row_array();

      return $usuario;
    }

    /**
     *  @author Caio de Freitas
     */
    public function isProfessor($usuario) {
      $this->db->where('id',$usuario['id']);
      $result = $this->db->get('Professor')->num_rows();

      return ($result == 1) ? TRUE : FALSE;
    }

    public function verificaEmail($usuario){
      $this->db->where("matricula", $usuario['matricula']);
      $this->db->where('status', TRUE); // Verifica o status do usuário
      $usuario = $this->db->get("Usuario")->row_array();
      return $usuario;
    }
    function updateSenha($idUsuario, $usuario) {
      $this->db->where('id', $idUsuario);
      $result = $this->db->update('Usuario', $usuario);

      return $result;
    }

  }
?>
