<?php defined('BASEPATH') OR exit('No direct script access allowed');
    /**
  * Essa classe contem todos as função de Curso
  * @author Nikolas Lencioni
  * @since 2018/08/30
  */
    class Curso extends CI_Controller {
        public function index () {
            $cursos = Curso_model::all();
            $this->load->template('cursos/cursos', compact('cursos'), 'cursos/js_cursos');
        }

        public function cadastrar() {
            $this->load->template('cursos/cadastrar', [], 'cursos/js_cursos');
        }

        public function salvar() {
            if($this->validar()) {
                try {
                    $curso = new Curso_model();
                    $curso->nome_curso = $this->input->post('nome_curso');
                    $curso->grau_id = $this->input->post('grau_id');
                    $curso->codigo_curso = $this->input->post('codigo_curso');
                    $curso->sigla_curso = $this->input->post('sigla_curso');
                    $curso->qtd_semestre = $this->input->post('qtd_semestre');
                    $curso->fechamento = $this->input->post('fechamento');
                    $curso->save();

                    $this->session->set_flashdata('success','Turno cadastrado com sucesso');
										redirect('cursos');
                } catch (Exception $ignored) {}
            }

            $this->session->set_flashdata('danger','Problemas ao cadastrar o curso, tente novamente!');
            redirect('cursos/cadastrar');
      }

			public function editar($id) {
          $curso = Curso_model::findOrFail($id);
          $this->load->template('cursos/editar', compact('curso'));
      }

      private function atualizar($id){
      		if($this->validar()) {
        			try {
		              $curso = Curso_model::findOrFail($id);
		              $curso->nome_curso 	 = $this->input->post('nome_curso');
		              $curso->grau_id      = $this->input->post('grau_id');
		              $curso->codigo_curso = $this->input->post('codigo_curso');
		              $curso->sigla_curso  = $this->input->post('sigla_curso');
		              $curso->qtd_semestre = $this->input->post('qtd_semestre');
		              $curso->fechamento 	 = $this->input->post('fechamento');
		              $curso->update();

		              $this->session->set_flashdata('success', 'Curso atualizado com sucesso');
									redirect('cursos');
          		} catch (Exception $ignored) {}

							$this->session->set_flashdata('danger', 'Problemas ao atualizar o turno, tente novamente!');
							redirect('cursos/editar');
      		}

          $this->session->set_flashdata('danger', 'Problemas ao atualizar os dados do curso, tente novamente!');
          redirect('cursos');
      }

      public function deletar(){
          try {
              $curso = Curso_model::findOrFail($id);
              $curso->delete();
              $this->session->set_flashdata('success','Curso deletado com sucesso');

							redirect("cursos");
          } catch (Exception $ignored) {}

          $this->session->set_flashdata('danger','Erro ao deletar um curso, tente novamente');
          redirect("cursos");
      }

      public function validar() {
				    // TODO: Separar as regras  de validação do Salvar e atualizar
						//   		 Pra remover o is_unique quando atualizar
            $this->form_validation->set_rules('nome_curso',
                              'nome do curso',
                               array('required',
                                      'min_length[5]',
                                 'is_unique[curso.nome_curso]',
                                 'trim',
                                 'ucwords')
                              );
            $this->form_validation->set_rules('grau_id',
                              'grau do curso',
                               array('required',
                                     'integer')
                              );
            $this->form_validation->set_rules('codigo_curso)',
                              'codigo do curso',
                               array('required',
                                 'integer',)
                              );
            $this->form_validation->set_rules('sigla_curso',
                              'sigla do curso',
                               array('required',
                                     'max_length[5]',
                                 'is_unique[curso.sigla_curso]',
                                 'strtoupper')
                              );
            $this->form_validation->set_rules('qtd_semestre',
                              'quantidade de semestres',
                               array('required',
                                 'integer',
                                 'greater_than[0]',
                                 'less_than[20]')
                              );
            $this->form_validation->set_rules('fechamento',
                              'fechamento das notas',
                                  array('required')
                               );
            return $this->form_validation->run();
        }

}
