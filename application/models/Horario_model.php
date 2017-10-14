<?php defined('BASEPATH') OR exit('No direct script access allowed');
    /**
     * Esta classe é um modelo do banco de dados que representa os horários que o turno possui
     * @author Lucas Leonel
     * @since 2017/08/19
    */
    class Horario_model extends Model{
        protected $table = 'horario';
        /**
         * Função responsável para retornar o turno em qual este horário está
         * @author Lucas Leonel
         * @since 2017/08/19
        */
        protected $fillable = ['inicio', 'fim'];

        public function turno(){
            return $this->belongsToMany(Turno_model::class, 'turno_horario', 'turno_id', 'horario_id');
        }
        public function disponibilidade(){
            return $this->belongsToMany(Fpa_model::class, 'disponibilidade', 'fpa_id', 'horario_id');
        }
    }
?>
