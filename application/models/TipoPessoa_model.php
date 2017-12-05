<?php defined('BASEPATH') OR exit('No direct script access allowed');
use Illuminate\Database\Eloquent\Model as Eloquent;

class TipoPessoa_model extends Eloquent {
    protected $table = 'tipo_pessoa';
    protected $fillable = ['tipo_id', 'pessoa_id'];
    public $timestamps = false;

}
