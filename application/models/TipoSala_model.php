<?php defined('BASEPATH') OR exit('No direct script access allowed');

    /** 
     * Esta classe é um modelo do banco de dados que representa o tipo da sala
     * @author Lucas Leonel
     * @since 2017/08/19
    */

    class TipoSala_model extends Model{

        protected $table = 'tipo_sala';
        public $timestamps = 'false';

        /**
         * Função responsável para retornar todos os tipos de sala do banco
         * @author Lucas Leonel
         * @since 2017/08/19
        */

        public function getAll() {
            $result = TipoSala_model::all();
            return $result;
        }

    }

?>