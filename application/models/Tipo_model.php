<?php defined('BASEPATH') OR exit('No direct script access allowed');

    class Tipo_model extends Model{

        protected $table = 'tipo';
        protected $guarded = [];

        public function docente(){
            return $this->belongsToMany(Docente_model::class);
        }
        
    }

?>