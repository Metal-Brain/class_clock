<?php defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;

class Classificacao_model extends Eloquent {
    protected $table = 'docente_classificacao';
    public $timestamps = false;    
}
