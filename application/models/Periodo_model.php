<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * periodos que a instituição possui
 * @author Denny Azevedo (moodificado)
 * @since 2017/10/25
 */
  class Periodo_model extends Model
  {

    protected $table = 'periodo';
    protected $fillable = ['nome'];
    //Função responsável por retornas as disciplinas oferecidas do semestre.
    public function disciplinaOferecida()
    {
      return $this->hasMany(DisciplinaOferecida_model::class, 'periodo_id');
    }
    //Função responsável por retornar todos as FPAS referente ao período.
    public function fpa()
    {
      return $this->hasMany(Fpa_model::class, 'periodo_id');
    }

    public static function periodoAtivo(){
      return Periodo_model::whereAtivo(true)->firstOrFail();
    }
  }
