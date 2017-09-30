<?php defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;

class Turma_model extends Eloquent {
    protected $table = 'disciplina_oferecida';
    protected $fillable = ['disciplina_id', 'periodo_id', 'turno_id', 'qtd_alunos', 'dp'];
    public $timestamps = false;

<<<<<<< HEAD
    public function disciplina(){
        return $this->belongsTo(Disciplina_model::class, 'disciplina_id');
    }

    public function periodo(){
        return $this->belongsTo(Periodo_model::class, 'periodo_id');
    }

    public function turno(){
        return $this->belongsTo(Turno_model::class, 'turno_id');
    }

    public function preferencias(){
        return $this->belongsToMany(Fpa_model::class, 'preferencia', 'fpa_id', 'disciplinas_oferecidas_id')->withPivot('ordem');
    }
}
=======
        public function periodo(){
            return $this->belongsTo(Periodo_model::class, 'periodo_id');
        }

        public function turno(){
            return $this->belongsTo(Turno_model::class, 'turno_id');
        }

        public function preferencias(){
            return $this->belongsToMany(Fpa_model::class, 'preferencia', 'fpa_id', 'disciplinas_oferecidas_id')->withPivot('ordem');
        }
    }
>>>>>>> 194e061c72787d2b79b09ba772c3b0cf56fa32ec
