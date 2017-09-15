<?php defined('BASEPATH') OR exit('No direct script access allowed');
use Illuminate\Database\Eloquent\Model as Eloquent;

class Tipo_model extends Eloquent {
    protected $table = 'tipo_pessoa';
    protected $fillable = ['nome'];
    public $timestamps = false;
}
