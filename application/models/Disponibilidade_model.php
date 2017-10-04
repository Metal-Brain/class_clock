<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Disponibilidade_model extends Model{
    protected $table = 'disponibilidade';
    public $fillable = ['fpa_id', 'horario_id', 'dia_semana'];

    
}
