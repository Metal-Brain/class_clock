<?php defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model;

/**
 * Esta classe é um modelo do banco de dados que representa as disciplinas que a instituição possui
 * @author Cleyton de Castro
 * @since 2017/08/26
*/
class Disciplina_model extends Model{

    protected $table = 'disciplina';
    public $timestamps = false;

    /**
     * Função responsável para retornar todos os horarios linkados com o turno
     * @author Cleyton de Castro
     * @since 2017/08/26
    */

    public function curso(){
        return $this->belongsTo(Curso_model::class);
    }
}

?>
