<?php defined('BASEPATH') OR exit('No direct script access allowed');

  /**
   *  Esse modelo possui uma serie de funções sob a relação de professores.
   *  @author Yasmin Sayad
   *  @since 2017/04/03
   */
  class Professor_model extends CI_Model {

    /**
      * Busca todos os professores cadastrados na base de dados.
      * @author Yasmin Sayad
	    * @since 2017/04/03
      * @return Retorna um array com todos os professores
      */
    public function getAll () {
      $this->db->select('Usuario.*, Professor.*, Contrato.nome AS contrato, Nivel.nome AS nivel');
      $this->db->join('Usuario','Usuario.id = Professor.id');
      $this->db->join('Contrato','Contrato.id = Professor.idContrato');
      $this->db->join('Nivel','Nivel.id = Professor.idNivel');
      $result = $this->db->get('Professor');

      return $result->result_array(); // converte o objeto em um array
    }

    /**
      * Busca o professor a partir do ID
      * @author Yasmin Sayad
	    * @since 2017/04/03
      * @param INT $id ID do professor
      * @return Retorna um array que representa a tupla.
      */
    public function getById ($idProfessor) {
      $this->db->select('Usuario.*, Professor.*, Contrato.nome AS contrato, Nivel.nome AS nivel');
      $this->db->join('Usuario','Usuario.id = Professor.id');
      $this->db->join('Contrato','Contrato.id = Professor.idContrato');
      $this->db->join('Nivel','Nivel.id = Professor.idNivel');
      $this->db->where('Usuario.id', $idProfessor);
      $result = $this->db->get('Professor');

      return $result->result_array();
    }

    public function getDisponibilidadeHorario ($idDisciplina, $horaInicio) {
      $this->db->join('Competencia as comp','comp.idDisciplina = Disciplina.id');
      $this->db->join('Professor as prof','prof.id = comp.idProfessor');
      $this->db->join('Usuario as user','user.id = prof.id');
      $this->db->join('Disponibilidade as disp','disp.idProfessor = prof.id');
      $this->db->where('Disciplina.id', $idDisciplina);
      $this->db->where('Disciplina.status', TRUE);
      $this->db->where('disp.inicio', $horaInicio);
      $this->db->where('disp.status',TRUE);
      $this->db->where('user.status',TRUE);

      $result = $this->db->get('Disciplina');
      //echo $this->db->last_query();
      return $result->result_array();
    }

    /**
      * Insere um novo professor na base de dados.
      * @author Yasmin Sayad
	    * @since 2017/04/03
      * @param Array $professor - array com os dados do professor
      * @return Retorna um boolean TRUE caso a inserção seja realizada com sucesso
      */
    public function insert ($idUsuario, $professor) {

      $dados = array(
        'id'          => $idUsuario,
        'nascimento'  => $professor['nascimento'],
        'coordenador' => $professor['coordenador'],
        'idCurso'     => $professor['idCurso'],
        'idContrato'  => $professor['idContrato'],
        'idNivel'     => $professor['idNivel']
      );

      return $this->db->insert('Professor', $dados);
    }

    /**
      * Atualiza os dados de um professor
      * @author Yasmin Sayad
	    * @since 2017/04/03
      * @param INT $idProfessor - ID do professor
      * @return Retorna um boolean TRUE caso os dados sejam atualizados com sucesso
      */
    public function update ($idProfessor, $professor) {

      $dados = array(
        'nascimento'  => $professor['nascimento'],
        //'coordenador' => $professor['coordenador'],
        'idContrato'  => $professor['idContrato'],
        'idNivel'     => $professor['idNivel']
      );

      $this->db->where('id', $idProfessor);
      $result = $this->db->update('Professor', $dados);

      return $result;
    }

    /**
      * Altera o status de um professor para falso.
      * @author Yasmin Sayad
	    * @since 2017/04/03
      * @param INT $id - ID do professor
      * @return Retorna um boolean TRUE caso o professor seja desativado com sucesso
      */
    public function disable ($id) {
      $this->db->select('Professor.*');
      $this->db->where("id = $id AND Professor.coordenador = FALSE");
      $prof = $this->db->get('Professor')->num_rows();
      if($prof>0){
        $this->db->select('Usuario.*');
        $this->db->where('id', $id);
        $result = $this->db->update('Usuario',array('status'=>FALSE));
        return true;
      }

      return false;
    }

    /**
      * Altera o status do professor para TRUE.
      * @author Yasmin Sayad
	    * @since 2017/04/03
      * @param INT $id - ID do professor
      * @return Retorna um boolean TRUE caso o status seja alterado
      */
    public function able ($id) {
      $this->db->where('id',$id);
      $result = $this->db->update('Usuario',array('status'=>TRUE));

      return $result;
    }

    public function getAllCoordenador($idCoordenador){
      $this->db->select('Usuario.*, Professor.*, Contrato.nome AS contrato, Nivel.nome AS nivel');
      $this->db->join('Usuario','Usuario.id = Professor.id');
      $this->db->join('Contrato','Contrato.id = Professor.idContrato');
      $this->db->join('Nivel','Nivel.id = Professor.idNivel');
      $this->db->join('CoordenadorDe as c', "c.idCoordenador = $idCoordenador");
      $this->db->where('c.idProfessor = Professor.id');
      $result = $this->db->get('Professor');

      return $result->result_array(); // converte o objeto em um array
    }

    /**
     * Verifica se o curso possui um coordenador
     * @author Caio de Freitas
     * @since 2017/05/30
     * @param INT $idCurso - ID do curso
     * @return Retorna um boolean FALSE caso o curso já tenha um coordenador
     */
    public function verificaCoordenadorCurso ($idCurso) {
      $this->db->where('coordenador',TRUE);
      $this->db->where('idCurso',$idCurso);
      $result = $this->db->get('Professor')->num_rows();

      $result = ($result == 1) ? TRUE : FALSE;
      return !$result;
    }

    /**
     *
     * @author Caio de Freitas
     */
    public function getCoordenadorByCurso($idCurso) {
      $this->db->where('idCurso',$idCurso);
      $result = $this->db->get("Professor");

      return $result->result();
    }

    public function getCoordenadorCurso($idCurso) {
      $this->db->where('idCurso',$idCurso);
      $result = $this->db->get("Professor");

      return $result->result_array();
    }

    /**
     * @author Caio de Freitas
     */
    public function setCoordenador($idProfessor,$idCurso,$status=TRUE) {

      if ($idProfessor == null) {
        $this->db->where('idCurso',$idCurso);
        $idCurso = 0;
      } else
        $this->db->where('id',$idProfessor);

      return $this->db->update('Professor',array('idCurso'=>$idCurso,'coordenador'=>$status));
    }

    public function removeCoordenadorCurso($idProfessor,$idCurso,$status=TRUE){
      if ($idProfessor == null) {
        $this->db->where('idCurso',$idCurso);
        $idCurso = 0;
      } else
        $this->db->where('id',$idProfessor);
    }

  }


?>
