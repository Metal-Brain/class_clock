<?php defined('BASEPATH') OR exit('No direct script access allowed');
  /**
  * Essa classe contem todas as funções de Curso
  * @author Nikolas Lencioni
  * @since 2018/08/30
  */
  class Curso extends CI_Controller {
    public function index () {
      $data = array(
        'cursos' => Curso_model::withTrashed()->get(),
        'modalidade' => Modalidade_model::all('id','nome_modalidade'),
        'docentes' => DB::table('pessoa')->join('docente', 'pessoa.id', '=', 'docente.pessoa_id')->select('pessoa.nome', 'pessoa.id')->get()
      );
      $this->load->template('cursos/cursos', compact('data'), 'cursos/js_cursos');
    }

    public function cadastrar() {
      $data = array(
        'cursos' => Curso_model::withTrashed()->get(),
        'modalidades' => Modalidade_model::withTrashed()->get(),
        'docentes' => DB::table('docente')
                          ->join('pessoa', 'docente.pessoa_id', '=', 'pessoa.id')
                          ->select('pessoa.nome', 'docente.id')
                          ->get()
      );
      $this->load->template('cursos/cadastrar', compact('data'), 'cursos/js_cursos');
    }

    public function salvar() {
      if($this->validar()) {
        try {
          $curso = new Curso_model();
          $curso->nome_curso = $this->input->post('nome_curso');
          $curso->modalidade_id = $this->input->post('modalidade_id');
          $curso->docente_id = $this->input->post('docente_id');
          $curso->codigo_curso = $this->input->post('codigo_curso');
          $curso->sigla_curso = $this->input->post('sigla_curso');
          $curso->qtd_semestre = $this->input->post('qtd_semestre');
          $curso->fechamento = $this->input->post('fechamento');
          $curso->save();

          $this->session->set_flashdata('success','Curso cadastrado com sucesso');
          redirect('curso');
        } catch (Exception $ignored) {}
      }
      $this->session->set_flashdata('danger','Problemas ao cadastrar o curso, tente novamente!');
      $this->cadastrar();
    }

    public function editar($id) {
      $data = array(
        'cursos' => Curso_model::withTrashed()->get(),
        'curso' => Curso_model::withTrashed()->findOrFail($id),
        'modalidades' => Modalidade_model::all('id','nome_modalidade'),
        'docentes' => DB::table('docente')
                          ->join('pessoa', 'docente.pessoa_id', '=', 'pessoa.id')
                          ->select('pessoa.nome', 'docente.id')
                          ->get()
      );
      $this->load->template('cursos/editar', compact('data','id'), 'cursos/js_cursos');
    }

    public function atualizar($id){
      if($this->validar($id)) {
        try {
          $curso = Curso_model::withTrashed()->findOrFail($id);
          $curso->nome_curso = $this->input->post('nome_curso');
          $curso->modalidade_id = $this->input->post('modalidade_id');
          $curso->docente_id = $this->input->post('docente_id');
          $curso->codigo_curso = $this->input->post('codigo_curso');
          $curso->sigla_curso = $this->input->post('sigla_curso');
          $curso->qtd_semestre = $this->input->post('qtd_semestre');
          $curso->fechamento = $this->input->post('fechamento');
          $curso->save();

          $this->session->set_flashdata('success', 'Curso atualizado com sucesso');
          redirect('curso');
        } catch (Exception $ignored) {}
      }

      $this->session->set_flashdata('danger', 'Problemas ao atualizar os dados do curso, tente novamente!');
      $this->editar($id);
    }

    public function ativar($id){
      try{
      $curso = Curso_model::withTrashed()->findOrFail($id);
      $curso->restore();
      $this->session->set_flashdata('success', 'Curso ativado com sucesso');
      }catch(Exception $e){
        $this->session->set_flashdata('danger', 'Não foi possivel ativar o curso');
      }
      redirect('curso');
    }

    public function deletar($id){
      try {
        $curso = Curso_model::findOrFail($id);
        //$curso->docente_id = null;
        //$curso->save();
        $curso->delete();
        $this->session->set_flashdata('success','Curso deletado com sucesso');
        redirect("curso");
      }catch (Exception $ignored) {}
      $this->session->set_flashdata('danger','Erro ao deletar um curso, tente novamente');
      redirect("curso");
    }

    public function validar($id = null) {
      $this->form_validation->set_rules('nome_curso','nome','required|alpha_accent|min_length[5]|max_length[75]|trim|ucwords');
      $this->form_validation->set_rules('modalidade_id','modalidade','required|integer');
      $this->form_validation->set_rules('sigla_curso','sigla_curso','required|alpha|exact_length[3]|strtoupper');
      $this->form_validation->set_rules('codigo_curso','codigo_curso','required|integer|greater_than[0]|less_than[100000]');
      $this->form_validation->set_rules('qtd_semestre','semestres','required|integer|greater_than[0]');
      $this->form_validation->set_rules('fechamento','fechamento','required');

      $codigo = $this->input->post('codigo_curso');
      $cursos_mesmo_codigo = Curso_model::withTrashed()->where('codigo_curso',$codigo)->where('id','!=',$id)->get();
      if(!empty($cursos_mesmo_codigo[0])){
          $this->form_validation->set_rules('codigo_curso','codigo','is_unique[curso.codigo_curso]');
      }
      return $this->form_validation->run();
    }
  }

//INSERT INTO curso(docente_id, modalidade_id, codigo_curso, nome_curso, sigla_curso, qtd_semestre, fechamento) VALUES(1, 1, 1356, "Análise e Desenvolvimento", "ADW", 6, "S");
//INSERT INTO pessoa(nome, prontuario, senha, email) VALUES("João José", "cg1234", "joaojose", "joaojose@gmail.com");
//INSERT INTO docente(pessoa_id, area_id, nascimento, ingresso_campus, ingresso_ifsp, regime) VALUES(1, 1, "01/01/1980", "01/01/2000", "01/01/2002", "N");

//INSERT INTO pessoa(nome, prontuario, senha, email) VALUES("asivdasd", "cg1234", "joaojose", "joadasdasdojose@gmail.com");
//INSERT INTO docente(pessoa_id, area_id, nascimento, ingresso_campus, ingresso_ifsp, regime) VALUES(2, 1, "01/01/1980", "01/01/2000", "01/01/2002", "S");
?>
