<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Docente_model extends Model {
    protected $table = 'docente';
    protected $fillable = [
        "pessoa_id", "area_id", "ingresso_campus",
        "ingresso_ifsp", "regime", "nascimento",
    ];

    public function pessoa() {
        return $this->belongsTo(Pessoa_model::class, 'pessoa_id');
    }

    public function area() {
        return $this->belongsTo(Area_model::class, 'area_id');
    }

    public function tipo() {
        return $this->belongsToMany(Tipo_model::class, 'tipo_pessoa', 'pessoa_id', 'tipo_id');
    }
}
