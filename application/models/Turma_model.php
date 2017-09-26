<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Esta classe é um modelo do banco de dados que representa as disciplinas que a instituição possui
 * @author Cleyton de Castro
 * @since 2017/08/26
*/
class Turma_model extends Model{
    protected $table = 'turma';
    protected $fillable = ['id', 'disciplina_id', 'periodo_id', 'turno_id', 'qtd_alunos', 'dp'];
    /**
     * Função responsável para retornar todos os horarios linkados com o turno
     * @author Cleyton de Castro
     * @since 2017/08/26
    */
    //public function curso(){
      //  return $this->belongsTo(Curso_model::class, 'curso_id');
  //  }
//	public function tipo_salas(){
	//	return $this->belongsToMany(TipoSala_model::class, 'tipo_sala_id');
//	}
}
?>
