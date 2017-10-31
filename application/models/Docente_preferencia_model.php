<?php defined('BASEPATH') OR exit('No direct script access allowed');
    /**
     * Esta classe é um modelo do banco de dados que representa os horários que o turno possui
     * @author Lucas Leonel
     * @since 2017/08/19
    */
    class Docente_preferencia_model extends Model{
        protected $table = 'docente_preferencia';
        /**
         * Função responsável para retornar o turno em qual este horário está
         * @author Lucas Leonel
         * @since 2017/08/19
        */
        protected $fillable = ['docente_id', 'nome_disciplina', 'nome_curso', 'curso_id'];
    }
?>
