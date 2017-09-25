<?php defined('BASEPATH') OR exit('No direct script access allowed');
  
  class Curso_model extends Model{
    
    protected $table = 'Periodo';
    protected $fillable = ['nome'];

    //Função responsável por retornas as disciplinas oferecidas do semestre.
    public function disciplinaOferecida(){
      return $this->hasMany(DisciplinaOferecida_model:class, 'periodo_id');
    }

    //Função responsável por retornar todos as FPAS referente ao período.
    public function fpa(){
      return $this->hasMany(Fpa_model:class, 'periodo_id');
    }

  }
}