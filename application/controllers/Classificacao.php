<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Classificacao extends MY_Controller {

    public function index() {
        $user  = $this->CI->session->userdata('usuario_logado');
        $curso = $this->request('curso');

        if (!is_null($user)) {
            
            $user = Pessoa_model::find($user['id']);
            
            if(!is_null($user->docente)) {
                $docente = $user->docente;
                $cursos = $docente->cursos;
                
                if($cursos->isEmpty()){
                    throw new Exception("Docente não é coordenador de nenhum curso");
                }
                
            }
            
            # id 3 é o do DAE
            if($user->tipo->id == 3) {
                $cursos = Curso_model::all();
            }
        } else {
            throw new Exception("Não foi possível recuperar nenhum usuário logado");
        }

        $classificacoes = [];
        if(!is_null($curso)){
            $classificacoes = Classificacao_model::where('curso_id', $curso)->get();
        }
		
	  $this->load->template('classificacoes/classificacao', compact('classificacoes', 'cursos'), 'classificacoes/js_classificacao');
    }

}
    