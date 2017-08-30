<?php defined('BASEPATH') OR exit('No direct script access allowed');
  /**
    * Essa classe contem todos as função de Curso
    * @author Nikolas Lencioni
    * @since 2018/08/30
    */
	class Curso extends CI_Controller {
		public function index () {
			$cursos = Curso_model::all();
			$this->load->template('cursos/cursos',compact('cursos'),'cursos/js_cursos');
		}
		
		public function cadastrar() {			
			//Define regras de validação do formulario!!!
			$this->form_validation->set_rules('nome_curso', 
											  'nome do curso',
											  array('required',
													'min_length[5]',
													'is_unique[Curso.nome_curso]',
													'trim',
													'ucwords')
											  );
			$this->form_validation->set_rules('grau_id)', 
											  'grau do curso',
											  array('required',
													'integer')
											  );
			$this->form_validation->set_rules('sigla_curso',
											  'sigla do curso', 
											  array('required', 
													'max_length[5]',
													'is_unique[Curso.sigla_curso]', 
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
			
			$this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');
			//condição para o formulario
			if($this->form_validation->run()){
				$this->salvar();
			}else{
				$cursos = Curso_model::all();
				$this->load->template('cursos/cursos',compact('cursos'),'cursos/js_cursos');
			}
		}	
		
		public function salvar(){
			//try {
				DB::transaction(function () {
					$curso = new Curso_model();
					$curso->nome_curso = $this->input->post('nome_curso');
					$curso->grau_id = $this->input->post('grau_id');
					$curso->sigla_curso = $this->input->post('sigla_curso');
					$curso->qtd_semestre = $this->input->post('qtd_semestre');
					$curso->fechamento = $this->input->post('fechamento');
					//var_dump($curso);
					$curso->save();
				});
				$this->session->set_flashdata('success','Turno cadastrado com sucesso');

			//} catch (Exception $e) {
			//	$this->session->set_flashdata('danger','Problemas ao cadastrar o turno, tente novamente!');
			}

		//redirect("Curso");
		

		public function editar(){
			//Define regras de validação do formulario!!!
			$this->form_validation->set_rules('nome_curso', 
											  'nome do curso',
											  array('required',
													'min_length[5]',
													'is_unique[Curso.nome]',
													'trim',
													'ucwords')
											  );
			$this->form_validation->set_rules('grau_id)', 
											  'grau do curso',
											  array('required',
													'integer')
											  );
			$this->form_validation->set_rules('sigla_curso',
											  'sigla do curso', 
											  array('required', 
													'max_length[3]',
													'is_unique[Curso.sigla]', 
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
			
			$this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');
			//condição para o formulario
			if($this->form_validation->run()){
				$this->atualizar($id);
			}else{
				$cursos = Curso_model::all();
				$this->load->template('cursos/cursosEditar',compact('cursos'));
			}
		}
		
		private function atualizar($id){
			try {
				DB::transaction(function ($id) use ($id) {
					$curso = Curso_model::findOrFail($id);
					$curso->nome_curso = $this->input->post('nome_curso');
					$curso->grau_id = $this->input->post('grau_id');
					$curso->sigla_curso = $this->input->post('sigla_curso');
					$curso->qtd_semestre = $this->input->post('qtd_semestre');
					$curso->fechamento = $this->input->post('fechamento');
					$curso->save();
				});
				$this->session->set_flashdata('success','Curso atualizado com sucesso');
			} catch (Exception $e) {
				$this->session->set_flashdata('danger','Problemas ao atualizar os dados do curso, tente novamente!');
			}
			redirect('Curso');
		}
		
		public function deletar(){
			try {
				DB::transaction(function ($id) use ($id) {
					$curso = Curso_model::findOrFail($id);
					$curso->delete();
				});

				$this->session->set_flashdata('success','Curso deletado com sucesso');
			}catch (Exception $e) {
				$this->session->set_flashdata('danger','Erro ao deletar um curso, tente novamente');
			}
			redirect("Curso");
		}
		
		public function disciplinas ($id) {
			$disciplinas = Curso::where('id', $id);
			echo json_encode($disciplinas);
		}
	}
	/*
	public function verificaNome(){
      $validate_data = array('nome_curso' => $this->input->get('nome_curso'));
      $this->form_validation->set_data($validate_data);
      $this->form_validation->set_rules('nome_curso', 'nome', 'is_unique[Curso.nome]');

      if($this->form_validation->run() == FALSE){
        echo "false";
      }else{
        echo "true";
      }
    }

    public function verificaSigla(){
      $validate_data = array('sigla' => $this->input->get('sigla'));
      $this->form_validation->set_data($validate_data);
      $this->form_validation->set_rules('sigla', 'sigla', 'is_unique[Curso.sigla]');

      if($this->form_validation->run() == FALSE){
        echo "false";
      }else{
        echo "true";
      }
    }
	
	public function ativar ($id) {
       if (verificaSessao() && verificaNivelPagina(array(1))){
         $this->load->model('Curso_model');
         if ( $this->Curso_model->able($id) )
           $this->session->set_flashdata('success','Curso ativado com sucesso');
         else
           $this->session->set_flashdata('danger','Não foi possível ativar o Curso, tente novamente ou entre em contato com o administrador do sistema.');
         redirect('Curso');
       }else{
           redirect('/');
       }
    }
	*/
?>
