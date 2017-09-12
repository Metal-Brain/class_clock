<?php defined('BASEPATH') OR exit('No direct script access allowed');

    class Pessoa_model extends Model{

        protected $table = 'pessoa';
        protected $guarded = [];

        public docente(){
            return $this->hasOne(Docente_model::class);
        }
        
        public tipo(){
            return $this->belongsToMany(Tipo_model::class);
        }

    }

?>