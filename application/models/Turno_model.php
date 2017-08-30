<?php defined('BASEPATH') OR exit('No direct script access allowed');

    // use \Model;

    /**
     * Esta classe é um modelo do banco de dados que representa os turnos que a instituição possui
     * @author Lucas Leonel
     * @since 2017/08/19
    */
    class Turno_model extends Model{

        protected $table = 'turno';
        //public $timestamps = false;
        protected $fillable = ['nome_turno'];
        protected $dates = ['deletado_em'];


        /**
         * Função responsável para retornar todos os horarios linkados com o turno
         * @author Lucas Leonel
         * @since 2017/08/19
        */

        public function horarios(){
            return $this->hasMany(Horario_model::class, 'turno_id');
        }

        /**
         * Retorna a quantidade de horarios de um Turno
         * @author Uriel Cairê Balan Calvi
         * @since 2017-08-28
         */
        public function qtd_horarios(){
          return $this->horarios()->count();
        }
    }

?>
