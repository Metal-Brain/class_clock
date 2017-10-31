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
        'docentes' => Pessoa_model::join('docente', 'pessoa.id', '=', 'docente.pessoa_id')
                                  ->select('pessoa.nome', 'docente.id', 'pessoa.prontuario')
                                  ->get(),
      );
      $this->load->template('cursos/cursos', compact('data'), 'cursos/js_cursos');
    }

    public function cadastrar() {
      $data = array(
        'cursos' => Curso_model::withTrashed()->get(),
        'modalidades' => Modalidade_model::withTrashed()->get(),
        'docentes' => Pessoa_model::join('docente', 'pessoa.id', '=', 'docente.pessoa_id')
                                  ->whereNotIn('docente.id', function($query){
                                      $query->from('curso')
                                            ->where('curso.docente_id', '!=', null)
                                            ->select('curso.docente_id');
                                    })
                                  ->where('docente.deletado_em', null)
                                  ->select('docente.id', 'pessoa.nome', 'pessoa.prontuario')
                                  ->get(),
      );
      $this->load->template('cursos/cadastrar', compact('data'), 'cursos/js_cursos');
    }

    public function salvar() {
      if($this->validar()) {
        try {
          $curso = new Curso_model();
          $curso->nome_curso = $this->input->post('nome_curso');
          $curso->modalidade_id = $this->input->post('modalidade_id');
          if($this->input->post('docente_id')){
            $curso->docente_id = $this->input->post('docente_id');
          }else($curso->docente_id = null);
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
      $curso = Curso_model::withTrashed()->findOrFail($id);
      $docente_id = $curso['docente_id'];

      $data = array(
        'curso' => $curso,
        'modalidades' => Modalidade_model::all('id','nome_modalidade'),
        'coordenador' => Pessoa_model::join('docente', 'pessoa.id', '=', 'docente.pessoa_id')
                                      ->where('docente.id', '=', $docente_id)
                                      ->select('pessoa.nome', 'docente.id','pessoa.prontuario')
                                      ->get(),
        'docentes' => Pessoa_model::join('docente', 'pessoa.id', '=', 'docente.pessoa_id')
                                  ->whereNotIn('docente.id', function($query){
                                      $query->from('curso')
                                            ->where('curso.docente_id', '!=', null)
                                            ->select('curso.docente_id');
                                    })
                                  ->where('docente.deletado_em', null)
                                  ->select('docente.id', 'pessoa.nome', 'pessoa.prontuario')
                                  ->get(),
      );
      $this->load->template('cursos/editar', compact('data','id'), 'cursos/js_cursos');
    }

    public function atualizar($id){
      if($this->validar($id)) {
        try {
          $curso = Curso_model::withTrashed()->findOrFail($id);
          $curso->nome_curso = $this->input->post('nome_curso');
          $curso->modalidade_id = $this->input->post('modalidade_id');
          if($this->input->post('docente_id')){
            $curso->docente_id = $this->input->post('docente_id');
          }else($curso->docente_id = null);
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
      $curso = Curso_model::withTrashed()->findOrFail($id)->restore();
      $this->session->set_flashdata('success', 'Curso ativado com sucesso');
      }catch(Exception $e){
        $this->session->set_flashdata('danger', 'Não foi possivel ativar o curso');
      }
      redirect('curso');
    }

    public function deletar($id){
      try {
        $curso = Curso_model::findOrFail($id);
        $curso->docente_id = null;
        $curso->save();
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

  //select pessoa.nome, docente.id from pessoa inner join docente on pessoa.id = docente.pessoa_id
  //where docente.id not in (SELECT docente_id from curso where docente_id is not null);
?>
