<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Classificacao extends MY_Controller {

    public function index() {
        $user  = $this->session->userdata('usuario_logado');
        $tipo  = $user['tipo'];
        $curso = $this->request('curso');
            
		$user = Pessoa_model::find($user['id']);
		
		if(!is_null($user->docente)) {
			$docente = $user->docente;
			$cursos  = $docente->cursos;
			
			if($cursos->isEmpty()){
				$this->session->set_flashdata("É necessário ser coordenador de algum curso para acessar a classificação");
				redirect('/'); // Docente nao é coordenador
			}

			$curso = $cursos[0]; // Pega o curso que o docente coordena
		}
		
		# id 3 é o do DAE
		if($tipo == 3) {
			$cursos = Curso_model::all();
		}        

        $classificacoes = [];
        if(!is_null($curso)){
            $classificacoes = Classificacao_model::where('curso_id', $curso)->get();
        }
		
	    $this->load->template('classificacoes/classificacao', compact('classificacoes', 'cursos', 'tipo', 'user'), 'classificacoes/js_classificacao');
    }
}