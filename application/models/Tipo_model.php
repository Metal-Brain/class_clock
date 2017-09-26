<?php defined('BASEPATH') OR exit('No direct script access allowed');
use Illuminate\Database\Eloquent\Model as Eloquent;

class Tipo_model extends Eloquent {
    protected $table = 'tipo';
    protected $fillable = ['nome'];
    public $timestamps = false;

    public function docente(){
        return $this->belongsToMany(Docente_model:class, 'tipo_pessoa', 'tipo_id', 'pessoa_id');
    }
}
