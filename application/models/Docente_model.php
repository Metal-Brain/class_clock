<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Docente_model extends Model {
    protected $table = 'docente';

    protected $fillable = [
        "pessoa_id", "area_id", "ingresso_campus",
        "ingresso_ifsp", "regime", "nascimento",
    ];

    public function setNascimentoAttribute($value) {
        $this->attributes['nascimento'] = brToSql($value);
    }

    public function setIngressoCampusAttribute($value){
        $this->attributes['ingresso_campus'] = brToSql($value);
    }

    public function setIngressoIfspAttribute($value){
        $this->attributes['ingresso_ifsp'] = brToSql($value);
    }

    public function getNascimentoAttribute() {
        return sqlToBr($this->nascimento);
    }

    public function getIngressoCampusAttribute(){
        return sqlToBr($this->ingresso_campus);
    }

    public function getIngressoIfspAttribute(){
        return sqlToBr($this->ingresso_ifsp);
    }

    public function pessoa() {
        return $this->belongsTo(Pessoa_model::class, 'pessoa_id');
    }

    public function area() {
        return $this->belongsTo(Area_model::class, 'area_id');
    }

}
