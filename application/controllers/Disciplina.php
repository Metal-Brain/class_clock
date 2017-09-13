<?php
    /**
    *  Regras de negócio sobre disciplinas.
    *  @since 2018/08/28
    *  @author Thalita Barbosa
    */
    class Disciplina extends CI_Controller {
        function index () {
            $disciplinas = Disciplina_model::withTrashed()->get();
            $this->load->template('disciplinas/disciplinas',compact('disciplinas'),'disciplinas/js_disciplinas');
        }

        /**
        * Forumulário de cadastro de disciplinas.
        * @author Thalita Barbosa
        * @since 2018/08/28
        * @return view Formulário de cadastro de disciplinas
        */
        function cadastrar () {
			$data = array(
				'disciplinas' => Disciplina_model::all(),
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
          //  if ($this->validar()) {
                try {
                    $disciplinas = new Disciplina_model();
					$disciplinas->curso_id = $this->input->post('curso_id');
					$disciplinas->tipo_sala_id = $this->input->post('tipo_sala_id');
					$disciplinas->nome_disciplina  = $this->input->post('nome_disciplina') ;
                    $disciplinas->sigla_disciplina = $this->input->post('sigla_disciplina');
					$disciplinas->modulo = $this->input->post('modulo');
					$disciplinas->qtd_professor = $this->input->post('qtd_professor');
					$disciplinas->qtd_aulas = $this->input->post('qtd_aulas');

                    $disciplinas->save();

                    $this->session->set_flashdata('success','Disciplina cadastrada com sucesso');
                    redirect("disciplina");
                } catch (Exception $ignored){}
          //  }

            $this->session->set_flashdata('danger','Problemas ao cadastrar a Disciplina, tente novamente!');
            redirect("disciplina/cadastrar");
        }

        /**
        * Formulário para alterar os dados da Disciplina
        * @author Denny Azevedo
        * @since 2017/08/28
        * @return view formulário de edição de disciplina
        */
        function editar($id) {
            $data = array(
				'disciplinas' => Disciplina_model::all(),
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
          //  if($this->validar()){
                try {
                    $disciplinas = Disciplina_model::findOrFail($id);
                    $disciplinas->nome_disciplina  = $this->input->post('nome_disciplina') ;
                    $disciplinas->sigla_disciplina = $this->input->post('sigla_disciplina');
					$disciplinas->curso_id		   = $this->input->post('curso_id');
                    $disciplinas->modulo           = $this->input->post('modulo')          ;
                    $disciplinas->qtd_professor    = $this->input->post('qtd_professor')   ;
                    $disciplinas->qtd_aulas        = $this->input->post('qtd_aulas')   ;
					$disciplinas->tipo_sala_id     = $this->input->post('tipo_sala_id');
                    $disciplinas->update();

                    $this->session->set_flashdata('success','Disciplina atualizada com sucesso');
                    redirect("disciplina");
                } catch (Exception $ignored){}
          //  }

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

                $this->session->set_flashdata('success','Disciplina deletada com sucesso');
            } catch (Exception $e) {
                $this->session->set_flashdata('danger','Erro ao deletar uma Disciplina, tente novamente');
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


        /**
        * Valida os campos utilizados no cadastro e edição
        * @return boolean Indica se a validação passou ou não
        */
        private function validar () {
            $this->form_validation->set_rules('nome_disciplina',
                                              'nome da disciplina',
                                              array('required',
                                                    'min_length[5]',
                                                    'ucwords'
                                                    )
                                             );
            $this->form_validation->set_rules('sigla_disciplina',
                                              'sigla',
                                              array('required',
                                                    'min_length[3]',
                                                    'max_length[5]',
                                                    'strtoupper'
                                                   )
                                             );
            $this->form_validation->set_rules('modulo',
                                              'modulo',
                                              array('required',
                                                    'integer',
                                                    'greater_than[0]',
                                                    'less_than[20]'
                                                   )
                                             );
            $this->form_validation->set_rules('qtd_professor',
                                              'quantidade de professores',
                                              array('required',
                                                    'integer',
                                                    'greater_than[0]',
                                                    'less_than[10]'
                                                   )
                                             );
            $this->form_validation->set_rules('qtd_aulas',
                                              'quantidade de aulas',
                                              array('required',
                                                    'integer',
                                                    'greater_than[0]',
                                                    'less_than[10]'
                                                   )
                                             );

            $this->form_validation->set_error_delimiters('<span class="text-danger">','</span>');

            return $this->form_validation->run();
        }
    }
