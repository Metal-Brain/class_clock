<?php defined('BASEPATH') OR exit('No direct script access allowed');

  /**
  * Modelo responsável pelo curso
  * @author Lucas Leonel
  * @since 2017/08/26
  */

  class Curso_model extends Model {

    public $timestamps = false;
    protected $table = 'curso';
    protected $fillable = array('codigo', 'grau_id', 'codigo_curso', 'nome_curso', 'sigla_curso', 'qtd_semestre', 'fechamento');


    /**
    * Função responsável para retornar o grau do curso
    * @author Lucas Leonel
    * @since 2017/08/26
    */

    public function grau(){
      return $this->belongsTo(Grau_Model::class, 'curso_id');
    }

    /**
    * Função responsável para retornar as disciplinas do curso
    * @author Lucas Leonel
    * @since 2017/08/26
    */

    public function disciplinas(){
      return $this->hasMany(Disciplinas_Model::class, 'curso_id');
    }

  }

?>
