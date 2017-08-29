<?php defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model;

  /**
   *  Essa classe é um modelo que representa a relação Grau no banco de dados
   *  @author Caio de Freitas e Lucas Leonel
   *  @since 2017/03/24
   */
  class Grau_model extends Model {

    protected $table = 'grau';
    public $timestamps = false;

  }


?>
