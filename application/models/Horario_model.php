<?php defined('BASEPATH') OR exit('No direct script access allowed');

    /** 
     * Esta classe é um modelo do banco de dados que representa os horários que o turno possui
     * @author Lucas Leonel
     * @since 2017/08/19
    */

    class Horario_model extends Model{

        protected $table = 'horario';
        public $timestamps = 'false';

        /**
        * Função responsável para retornar todos os horários do Banco
        * @author Lucas Leonel
        * @since 2017/08/19
        */

        public function getAll() {
            $result = Horario_model::all();
            return $result;
        }

        /**
         * Função responsável para retornar o turno em qual este horário está
         * @author Lucas Leonel
         * @since 2017/08/19
        */
        
        public function getTurno(){
            return $this->belongsTo('Turno_model.php');
        }

    }

?>