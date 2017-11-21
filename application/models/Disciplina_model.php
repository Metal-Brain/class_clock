<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Esta classe é um modelo do banco de dados que representa as disciplinas que a instituição possui
 * @author Cleyton de Castro
 * @since 2017/08/26
*/
class Disciplina_model extends Model{

    protected $table = 'disciplina';
    protected $fillable = ['id', 'curso_id', 'tipo_sala_id', 'nome_disciplina', 'sigla_disciplina', 'modulo', 'qtd_professor', 'qtd_aulas'];

    /**
     * Função responsável para retornar todos os horarios linkados com o turno
     * @author Cleyton de Castro
     * @since 2017/08/26
    */

    public function curso(){
        return $this->belongsTo(Curso_model::class, 'curso_id');
    }

    public function setNomeAttribute($nome_disciplina) {
      $this->attributes['nome_disciplina'] = ucwords(mb_strtolower($nome_disciplina, "utf-8"));
    }

	public function tipo_salas(){
		return $this->belongsToMany(TipoSala_model::class, 'tipo_sala_id');
	}
}

?>
