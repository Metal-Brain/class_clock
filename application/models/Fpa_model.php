<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Fpa_model extends Model{
    protected $table = 'fpa';
    public $fillable = ['docente_id', 'periodo_id'];

    //Função que retorna os horários disponíveis do docente em relação a FPA.
    public function disponibilidade(){
        return $this->hasMany(Disponibilidade_model::class, "fpa_id");
    }

    //Função que retorna as preferências do professor em relação as disciplinas oferecidas no semestre.
    public function preferencias(){
        return $this->hasMany(Preferencia_model::class, "fpa_id")->withPivot('ordem');
    }

    public function periodo(){
      return $this->belongsTo(Periodo_model::class, 'periodo_id');
    }

    public function horarios(){
      return $this->belongsToMany(Horario_model::class, 'disponibilidade', 'horario_id', "fpa_id");
    }

    public function turmas(){
      return $this->belongsToMany(Turma_model::class, "preferencia", 'fpa_id', 'turma_id')->withPivot('ordem');
    }


}
