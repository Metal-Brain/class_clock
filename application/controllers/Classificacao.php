<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Classificacao extends MY_Controller {
    
    public function index(){
        $curso = $this->request('curso');
        
        $classificacao = DB::select("call classificacao(?)", [$curso]);
    }

    public function index2() {
        $curso = $this->request('curso');

        $classificacao = Classificacao_model::where('curso_id', $curso)
        //aqui tu pode colocar qualquer where, orderby ou a p#rra toda
        ->get();

        // Permite a utilização da notação de objeto ou array ao invés de apenas array
        foreach($classificacao as $index => $cla) {
            echo "{$index} => {$cla->nome}, {$cla->nome_curso}, {$cla->nome_disciplina}<br>";
        }
    }

}
    