<?php defined('BASEPATH') OR exit('No direct script access allowed');

    class Area_model extends Model{

        protected $table = 'area';
        protected $guarded = [];

        public docente(){
            return $this->hasMany(Docente_model::class);
        }
    }

?>