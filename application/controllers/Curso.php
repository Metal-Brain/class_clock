<?php defined('BASEPATH') OR exit('No direct script access allowed');
    /**
    * Essa classe contem todos as função de Curso
    * @author Nikolas Lencioni
    * @since 2018/08/30
    */
    class Curso extends CI_Controller {
        public function index () {
            $data = array(
                'cursos' => Curso_model::withTrashed()->get(),
                'grau' => Grau_model::all('id','nome_grau')
            );
            $this->load->template('cursos/cursos', compact('data'), 'cursos/js_cursos');
        }

        public function cadastrar() {
            $data = Grau_model::withTrashed()->get();			
            $this->load->template('cursos/cadastrar', compact('data'), 'cursos/js_cursos');
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

                    $this->session->set_flashdata('success','Curso cadastrado com sucesso');
                    redirect('curso');
                } catch (Exception $ignored) {
                    exit ($ignored);
                }
            }
            $this->session->set_flashdata('danger','Problemas ao cadastrar o curso, tente novamente!');
            $this->cadastrar();
        }

        public function editar($id) {
            $data = array(
                'curso' => Curso_model::withTrashed()->findOrFail($id),
                'grau' => Grau_model::all('id','nome_grau')
            );
            $this->load->template('cursos/editar', compact('data','id'), 'cursos/js_cursos');		 
        }

        public function atualizar($id){
            if($this->validar('1')) {
                try {
                    $curso = Curso_model::withTrashed()->findOrFail($id);
                    $curso->update(['nome_curso'=>$this->input->post('nome_curso'),
                        "grau_id" => $this->input->post('grau_id'),
                        "codigo_curso" => $this->input->post('codigo_curso'),
                        "sigla_curso" => $this->input->post('sigla_curso'),
                        "qtd_semestre" => $this->input->post('qtd_semestre'),
                        "fechamento" => $this->input->post('fechamento')
                    ]);	

                    $this->session->set_flashdata('success', 'Curso atualizado com sucesso');
                    redirect('curso');
                } catch (Exception $ignored) {
                    exit ($ignored);
                }
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
                $curso->delete();
                $this->session->set_flashdata('success','Curso deletado com sucesso');

                redirect("curso");
            }catch (Exception $ignored) {}

            $this->session->set_flashdata('danger','Erro ao deletar um curso, tente novamente');
            redirect("curso");
        }



        public function validar($flag = null) {
            $this->form_validation->set_rules('nome_curso','nome','required|min_length[5]|max_length[75]|trim|strtolower|ucwords'); 

            $this->form_validation->set_rules('grau_id','modalidade','required|integer');

            
            if($flag == null){
                $this->form_validation->set_rules('sigla_curso','sigla','required|alpha|exact_length[3]|strtoupper|is_unique[curso.sigla_curso]');
                $this->form_validation->set_rules('codigo_curso','codigo','required|integer|greater_than[0]|less_than[100000]|is_unique[curso.codigo_curso]');
            }else{
                $this->form_validation->set_rules('sigla_curso','sigla','required|alpha|exact_length[3]|strtoupper');
                $this->form_validation->set_rules('codigo_curso','codigo','required|integer|greater_than[0]|less_than[100000]');
            }


            $this->form_validation->set_rules('qtd_semestre','semestres','required|integer|greater_than[0]');

            $this->form_validation->set_rules('fechamento','fechamento','required');

            return $this->form_validation->run();
        }

    }
?>
