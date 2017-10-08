<?php defined('BASEPATH') OR exit('No direct script access allowed');
    /**
     * Turnos que a instituição possui
     * @author Lucas Leonel
     * @since 2017/08/19
    */
    class Turno_model extends Model {
        protected $table = 'turno';
        protected $fillable = ['nome_turno'];

        /**
         * Retorna todos os horarios linkados com o turno ordenados pela hora de início
         * @author Lucas Leonel
         * @since 2017/08/19
        */
        public function horarios() {
            return $this->hasMany(Horario_model::class, 'turno_id')->orderBy('horario.inicio', 'asc');
        }

        /**
         * Retorna todos as turmas linkadas com o turno ordenadas pelo turno;
         * @author Lucas Leonel
         * @since 2017/08/19
        */
        public function turmas() {
            return $this->hasMany(Turma::class, 'turno_id')->orderBy('turno_id', 'asc');
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
