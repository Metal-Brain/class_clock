<?php defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;

class Preferencia_model extends Eloquent{

    protected $table = 'preferencia';
    public $fillable = ['fpa_id', 'turma_id', 'ordem'];
    public $timestamps = false;

}
