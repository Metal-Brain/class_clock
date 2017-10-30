<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Area_model extends model{
    
    protected $table = 'area';
    protected $fillable = ['nome_area'];

    public function setNomeAreaAttribute($nome){
    	$this->attributes['nome_area'] = ucwords(mb_strtolower($nome,'UTF-8'));
    }

    public function docente(){
        return $this->hasMany(Docente_model::class, 'area_id');
    }
}


