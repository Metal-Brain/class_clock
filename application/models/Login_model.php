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

    public function validate($username, $password){
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $this->db->where('status', TRUE); // Verifica o status do usuário
        $usuario = $this->db->get("Login")->row_array();
        return $usuario;
    }
  }
?>
