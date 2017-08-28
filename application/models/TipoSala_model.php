<?php defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model;

    /** 
     * Esta classe é um modelo do banco de dados que representa o tipo da sala
     * @author Lucas Leonel
     * @since 2017/08/19
    */

    class TipoSala_model extends Model{

        protected $table = 'tipo_sala';
        protected $fillable = ['nome_tipo_sala', 'descricao_tipo_sala'];
        public $timestamps = false;

    }

?>