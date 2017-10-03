<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Fpa_model extends Model{
    protected $table = 'fpa';
    public $fillable = ['docente_id', 'periodo_id'];

    //Função que retorna os horários disponíveis do docente em relação a FPA.
    public function disponibilidade(){
        return $this->belongsToMany(Horario_model::class, 'preferencia', 'fpa_id', 'horario_id');
    }

    //Função que retorna as preferências do professor em relação as disciplinas oferecidas no semestre.
    public function preferencia(){
        return $this->belongsToMany(Turma_model::class, 'disponibilidade', 'fpa_id', 'disciplinas_oferecidas_id')->withPivot('ordem');
    }

    public function periodo(){
      return $this->belongsTo(Periodo_model::class, 'periodo_id');
    }
}
