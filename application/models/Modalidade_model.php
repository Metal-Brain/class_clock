<?php defined('BASEPATH') OR exit('No direct script access allowed');



  /**
   *  Essa classe é um modelo que representa a relação Modalidade no banco de dados
   *  @author Caio de Freitas e Lucas Leonel
   *  @since 2017/03/24
   */
  class Modalidade_model extends Model {

    protected $table = 'modalidade';
    public $timestamps = false;
    protected $fillable = ['nome_modalidade', 'codigo'];

    public function curso(){
      return $this->hasMany(Curso_model::class, 'modalidade_id');
    }

    public function setNomeModalidadeAttribute($nome_modalidade) {
      $this->attributes['nome_modalidade'] = ucwords(mb_strtolower($nome_modalidade, "utf-8"));
    }

  }


?>
