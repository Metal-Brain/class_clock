<?php defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;

class Disponibilidade_model extends Eloquent{

    protected $table = 'disponibilidade';
    public $fillable = ['fpa_id', 'horario_id', 'dia_semana'];
    public $timestamps = false;

}
