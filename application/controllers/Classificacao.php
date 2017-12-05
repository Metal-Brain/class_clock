<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Classificacao extends MY_Controller {

    public function index() {
        $user  = $this->session->userdata('usuario_logado');
        $tipos  = $user['tipos'];
        $curso = $this->request('curso');
		$cursos = Curso_model::all();
            
		$user = Pessoa_model::find($user['id']);
		
		
		# id 3 é o do DAE
		if(in_array(3, $tipos)) {
			$cursos = Curso_model::all();
		} else {
			if(!is_null($user->docente)) {
				$docente = $user->docente;
				$cursos  = $docente->cursos;
				
				if($cursos->isEmpty()){
					$this->session->set_flashdata("danger", "É necessário ser coordenador de algum curso para acessar a classificação");
					redirect('/'); // Docente nao é coordenador
				}

				$curso = $cursos[0]; // Pega o curso que o docente coordena
				$cursos = Classificacao_model::where('curso_id', $curso->id)->get();
			}
		}

        $classificacoes = [];
        if(!is_null($curso)){
            $classificacoes = Classificacao_model::where('curso_id', $curso)->get();
        }
		
	    $this->load->template('classificacoes/classificacao', compact('classificacoes', 'cursos', 'tipos', 'user'), 'classificacoes/js_classificacao');
    }
}
