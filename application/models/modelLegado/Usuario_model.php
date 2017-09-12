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
     * Altera a senha do usuário
     * @author Caio de Freitas
     * @since 2017/05/22
     * @param INT $id
     * @param STRING $senhaAtual - Senha atual do usuário
     * @param STRING $novaSenha - Nova senha
     * @return Retorna um boolean TRUE caso a senha seja alterada
     */
    public function alterarSenha ($id, $senhaAtual, $novaSenha) {
      $this->db->where('id',$id);
      $this->db->where('senha',$senhaAtual);

      return $this->db->update('Usuario',array('senha'=>$novaSenha));
    }

    /**
     * Verifica a senha do usuário
     * @author Caio de Freitas
     * @since 2017/05/24
     * @param INT $id - ID do usuário
     * @param STRING $password - Senha do usuário
     * @return Retorna um boolean true caso a senha esteja correta
     */
    public function checkPassword ($id, $password) {
      $this->db->where('id',$id);
      $this->db->where('senha',$password);
      $result = $this->db->get('Usuario')->num_rows();

      return ($result == 1) ? TRUE : FALSE;
    }

    /**
     * Altera o email do usuário
     * @author Caio de Freitas
     * @since 2017/05/23
     * @param INT $id - ID do usuário
     * @param STRING $emailAtual - Email atual do usuário
     * @param STRING $novoEmail - Novo email do usuário
     * @return Retorna um boolean TRUE caso o email seja alterado
     */
    public function alterarEmail ($id,$emailAtual,$novoEmail) {
      $this->db->where('id',$id);
      $this->db->where('email',$emailAtual);

      return $this->db->update('Usuario',array('email'=>$novoEmail));
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
     * Verifica se o usuário é DAE.
     * @author Yasmin Sayad
     * @since 2017/06/07
     * @param ARRAY $usuario - Vetor com os dados do usuario
     * @return Retorna um boolean TRUE caso o usuario seja DAE
     */
    public function isDae ($usuario) {
      $this->db->where('id', $usuario['id']);
      $result = $this->db->get('Usuario')->row();
	  
      return ($result->dae == 1) ? true : false;
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
