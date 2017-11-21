<?php
    /**
    *  Regras de negócio sobre disciplinas.
    *  @since 2018/08/28
    *  @author Thalita Barbosa
    */
    class Disciplina extends CI_Controller {
        function index () {
            $data = array(
              'disciplinas' => Disciplina_model::withTrashed()->get(),
              'cursos' => Curso_model::all('id','nome_curso'),
              'tipo_salas' => TipoSala_model::all('id','nome_tipo_sala')
            );
            $this->load->template('disciplinas/disciplinas',compact('data'),'disciplinas/js_disciplinas');
        }

        /**
        * Forumulário de cadastro de disciplinas.
        * @author Thalita Barbosa
        * @since 2018/08/28
        * @return view Formulário de cadastro de disciplinas
        */
        function cadastrar () {
			$data = array(
				'disciplinas' => Disciplina_model::withTrashed()->get(),
				'cursos' => Curso_model::all(),
				'tipo_salas' => TipoSala_model::all(),
				);
            $this->load->template('disciplinas/disciplinasCadastrar',compact('data'),'disciplinas/js_disciplinas');
        }

        /**
        * Salva uma nova disciplina no banco de dados.
        * @author Denny Azevedo
        * @since 2017/08/28
        */
        function salvar () {
            if ($this->validar()) {
                try {
                  if (Disciplina_model::withTrashed()->where("sigla_disciplina", $this->input->post('sigla_disciplina'))->where("curso_id", $this->input->post('curso_id'))->first()==null) {
                    $disciplina = new Disciplina_model();
                    $disciplina->curso_id = $this->input->post('curso_id');
                    $disciplina->tipo_sala_id = $this->input->post('tipo_sala_id');
                    $disciplina->nome_disciplina  = $this->input->post('nome_disciplina') ;
                    $disciplina->sigla_disciplina = $this->input->post('sigla_disciplina');
                    $disciplina->modulo = $this->input->post('modulo');
                    $disciplina->qtd_professor = $this->input->post('qtd_professor');
                    $disciplina->qtd_aulas = $this->input->post('qtd_aulas');

                    $disciplina->save();

                    $this->session->set_flashdata('success','Disciplina cadastrada com sucesso');
                    redirect("disciplina");
                  }else{
                    $this->session->set_flashdata('danger','Disciplina já esta cadastrada');
                    redirect("disciplina/cadastrar");
                  }
                } catch (Exception $ignored){}
            }

            $this->session->set_flashdata('danger','Problemas ao cadastrar a Disciplina, tente novamente!');
            redirect("disciplina");
        }

        /**
        * Formulário para alterar os dados da Disciplina
        * @author Denny Azevedo
        * @since 2017/08/28
        * @return view formulário de edição de disciplina
        */
        function editar($id) {
            $data = array(
      				'cursos' => Curso_model::all(),
      				'tipo_salas' => TipoSala_model::all(),
              'disciplina' => Disciplina_model::find($id),
				);
            $this->load->template('disciplinas/disciplinasEditar', compact('data','id'),'disciplinas/js_disciplinas');
        }

        /**
        * Edita os dado da disciplina.
        * @author Denny Azevedo
        * @since 2018/08/28
        */
        function atualizar ($id) {
            if($this->validar()){
                try {
                  if (Disciplina_model::withTrashed()->where("sigla_disciplina", $this->input->post('sigla_disciplina'))->where("curso_id", $this->input->post('curso_id'))->first()==null || Disciplina_model::where("sigla_disciplina", $this->input->post('sigla_disciplina'))->where("curso_id", $this->input->post('curso_id'))->where("id", $id)->first()) {
                    $disciplina = Disciplina_model::withTrashed()->findOrFail($id);
                    $disciplina->nome_disciplina  = $this->input->post('nome_disciplina') ;
                    $disciplina->sigla_disciplina = $this->input->post('sigla_disciplina');
					$disciplina->curso_id		   = $this->input->post('curso_id');
                    $disciplina->modulo           = $this->input->post('modulo')          ;
                    $disciplina->qtd_professor    = $this->input->post('qtd_professor')   ;
                    $disciplina->qtd_aulas        = $this->input->post('qtd_aulas')   ;
					$disciplina->tipo_sala_id     = $this->input->post('tipo_sala_id');
                    $disciplina->update();

                    $this->session->set_flashdata('success','Disciplina atualizada com sucesso');
                    redirect("disciplina");
                  }else{
                    $this->session->set_flashdata('danger','Sigla já esta cadastrada');
                    redirect('disciplina/editar/'.$id);
                  }
                } catch (Exception $ignored){}
            }

            $this->session->set_flashdata('danger','Problemas ao atualizar os dados da Disciplina, tente novamente!');
            redirect('disciplina/editar/'.$id);
        }

        /**
        * Deleta uma disciplina.
        * @author Denny Azevedo
        * @since  2018/08/28
        * @param $id ID da disciplina
        */
        function deletar ($id) {
            try {
                $disciplinas = Disciplina_model::findOrFail($id);
                $disciplinas->delete();

                $this->session->set_flashdata('success','Disciplina desativada com sucesso');
            } catch (Exception $e) {
                $this->session->set_flashdata('danger','Erro ao desativar a Disciplina, tente novamente');
            }

            redirect("disciplina");
        }

        /**
        * Ativa uma disciplina.
        * @author Gilberto Pagani Sevilio
        * @since 2017/09/11
        * @param ID da disciplina
        */
       function ativar ($id) {
         try {
           $disciplinas = Disciplina_model::withTrashed()->findOrFail($id);
           $disciplinas->restore();
           $this->session->set_flashdata('success','Disciplina ativada com sucesso');
         } catch (Exception $e) {
           $this->session->set_flashdata('danger','Erro ao ativar a Disciplina. Tente novamente!');
         }
         redirect("disciplina");
       }

        public function validar () {
            $this->form_validation->set_rules('nome_disciplina','nome','required|alpha_accent|min_length[5]|max_length[50]|trim|ucwords');

            $this->form_validation->set_rules('sigla_disciplina','sigla','required|min_length[3]|max_length[5]|alpha_numeric');

            $this->form_validation->set_rules('curso_id','curso','required');

            $this->form_validation->set_rules('modulo','modulo','required|integer|greater_than[0]|less_than[100]');

            $this->form_validation->set_rules('qtd_professor','professores','required|integer|greater_than[0]|less_than[11]');

            $this->form_validation->set_rules('qtd_aulas','aulas','required|integer|greater_than[0]|less_than[100]');

            $this->form_validation->set_rules('tipo_sala_id','sala','required');

            return $this->form_validation->run();
        }
    }
