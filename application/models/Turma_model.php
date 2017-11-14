<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Turma_model extends Model {
    protected $table = 'turma';
    protected $fillable = ['disciplina_id', 'periodo_id', 'turno_id', 'qtd_alunos', 'dp'];
    public function disciplina(){
        return $this->belongsTo(Disciplina_model::class, 'disciplina_id');
    }
    public function periodo(){
        return $this->belongsTo(Periodo_model::class, 'periodo_id');
    }
    public function turno(){
        return $this->belongsTo(Turno_model::class, 'turno_id');
    }
    public function preferencias(){
        return $this->belongsToMany(Preferencia_model::class, 'fpa_id', 'turma_id')->withPivot('ordem');
    }
}
