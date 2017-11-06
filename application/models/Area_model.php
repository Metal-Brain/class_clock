<?php defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;
    
class Area_model extends Eloquent{
    
    protected $table = 'area';
    protected $fillable = ['nome_area'];
    public $timestamps = false;
    const DELETED_AT = "deletado_em";

    public function setNomeAreaAttribute($nome){
    	$this->setNomeAttribute($nome);
    }

    public function setNomeAttribute($nome){
        $this->attributes['nome_area'] = ucwords(mb_strtolower($nome,'UTF-8'));
    }

    public function getNomeAttribute(){
        return $this->attributes['nome_area'];
    }

    public function docente(){
        return $this->hasMany(Docente_model::class, 'area_id');
    }
}
