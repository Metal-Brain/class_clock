<?php defined('BASEPATH') OR exit('No direct script access allowed');

    class Area_model extends model{
        
        protected $table = 'area';
        protected $fillable = ['nome'];

        public function docente(){
            return $this->hasMany(Docente_model:class, 'area_id');
        }

    }
}