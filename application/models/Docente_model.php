<?php defined('BASEPATH') OR exit('No direct script access allowed');

    class Docente_model extends Model{

        protected $table = 'docente';
        protected $guarded = [];
        
        public pessoa(){
            return $this->hasOne(Pessoa_model::class);
        }

        public area(){
            return $this->belongsTo(Area_model::class);
        }

    }

?>