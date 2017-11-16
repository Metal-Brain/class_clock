<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Esta classe é um modelo do banco de dados que representa os horários que o turno possui
<<<<<<< HEAD
 * @author Vitor Silvério
 * @since 2017/11/13
*/

class Docente_preferencia_model extends Model{
    protected $table = 'docente_preferencia';
    public $timestamps = false;
    protected $fillable = ['docente_id', 'nome', 'nome_disciplina', 'nome_curso', 'curso_id'];

}

