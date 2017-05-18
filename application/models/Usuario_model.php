<?php defined('BASEPATH') OR exit('No direct script access allowed');

  /**
   *  Esse modelo possui uma serie de funções sob a relação de login.
   *  @author Jean Brock
   *  @since 2017/04/05
   */
  class Usuario_model extends CI_Model {

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
     *  Verifica se o usuário é professor.
     *  @author Caio de Freitas
     *  @since 2017/04/12
     *  @param $usuario - Vetor com os dados do usuário
     *  @return Retorna um boolean TRUE caso o usuário informado sejá um professor.
     */
    public function isProfessor($usuario) {
      $this->db->where('id',$usuario['id']);
      $result = $this->db->get('Professor')->num_rows();

      return ($result == 1) ? TRUE : FALSE;
    }

    /**
     * Verifica se o usuário é um coordenador.
     * @author Caio de Freitas
     * @since 2017/05/18
     * @param ARRAY $usuario - Vetor com os dados do usuario
     * @return Retorna um boolean TRUE caso o usuario sejá um coordenador
     */
    public function isCoordenador ($usuario) {
      $this->db->where('id', $usuario['id']);
      $result = $this->db->get('Professor')->row();

      return $result->coordenador;
    }

    /**
     * Insere um novo usuário na base de dados.
     * @author Caio de Freitas
     * @since 2017/04/16
     * @param Array $usuario - Vetor com os dados do usuário
     * @return Retorna um boolean TRUE caso o usuário sejá cadastrado com sucesso
     */
    public function insert ($usuario) {
      $dados = array(
        'nome'      => $usuario['nome'],
        'matricula' => $usuario['matricula'],
        'email'     => $usuario['email'],
        'senha'     => $usuario['senha']
      );

      return $this->db->insert('Usuario',$dados);
    }

    /**
     * Atualiza os dados do usuário na base de dados.
     * @author Caio de Freitas
     * @since 2017/04/16
     * @param INT $id - ID do Usuário
     * @param Array $usuario - Vetor com os dados do usuário.
     * @return Retorna um boolean TRUE caso os dados sejam atualizados com sucesso
     */
    public function update ($id, $usuario) {

      $dados = array(
        'nome'      => $usuario['nome'],
        'matricula' => $usuario['matricula'],
        'email'     => $usuario['email']
      );

      $this->db->where('id',$id);
      return $this->db->update('Usuario',$dados);
    }

  }
?>
