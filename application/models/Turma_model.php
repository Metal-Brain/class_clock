<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Esta classe é um modelo do banco de dados que representa as disciplinas que a instituição possui
 * @author Cleyton de Castro
 * @since 2017/08/26
*/

use Illuminate\Database\Eloquent\Model as Eloquent;

class Turma_model extends Eloquent {
    protected $table = 'disciplina_oferecida';
    protected $fillable = ['id', 'disciplina_id', 'periodo_id', 'turno_id', 'qtd_alunos', 'dp'];
    public $timestamps = false;
}
