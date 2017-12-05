<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
* Modelo responsável pelo curso
* @author Lucas Leonel
* @since 2017/08/26
*/

class Curso_model extends Model {

  public $timestamps = false;
  protected $table = 'curso';
  protected $fillable = array('codigo', 'modalidade_id', 'codigo_curso', 'nome_curso', 'sigla_curso', 'qtd_semestre', 'fechamento');


  /**
  * Função responsável para retornar o grau do curso
  * @author Lucas Leonel
  * @since 2017/08/26
  */

  public function modalidade(){
    return $this->belongsTo(Modalidade_model::class, 'modalidade_id');
  }

  /**
  * Função responsável para retornar as disciplinas do curso
  * @author Lucas Leonel
  * @since 2017/08/26
  */

  public function disciplinas(){
    return $this->hasMany(Disciplinas_model::class, 'curso_id');
  }

  public function docente(){
    return $this->belongsTo(Docente_model::class, 'docente_id');
  }
}
