<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Classificacao extends MY_Controller {
    
    public function index2(){
        $curso = $this->request('curso');
        
        $classificacao = DB::select("call classificacao(?)", [$curso]);
    }

    public function index() {
        $curso = $this->request('curso');

        $classificacoes = Classificacao_model::where('curso_id', $curso)
        //aqui tu pode colocar qualquer where, orderby ou a p#rra toda
        ->get();
		
	  $this->load->template('classificacoes/classificacao', compact('classificacoes'), 'classificacoes/js_classificacao');
    }

}
    