<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
<<<<<<< HEAD
 * periodos que a instituição possui
 * @author Denny Azevedo (moodificado)
 * @since 2017/10/25
 */
  class Periodo_model extends Model
  {
    

    protected $table = 'periodo';
    protected $fillable = ['nome'];

    //Função responsável por retornas as disciplinas oferecidas do semestre.

    public function turmas() {
        return $this->hasMany(Turma_model::class, 'periodo_id')->withTrashed();
    }

    public function getTurmasPorTurnoAttribute() {
        $turmas_turno = [];
        $turmas = $this->turmas;

        foreach ($turmas as $turma) {
            $turno = $turma->turno->nome;
            $turmas_turno[$turno][] = $turma;
        }

        return $turmas_turno;
    }

    //Função responsável por retornar todos as FPAS referente ao período.
    public function fpa() {
        return $this->hasMany(Fpa_model::class, 'periodo_id');
    }

}

