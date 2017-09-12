<?php defined('BASEPATH') OR exit('No direct script access allowed');

    class Docente_model extends Model {

        protected $table = 'docente';
        protected $guarded = [];

        public function pessoa() {
            return $this->belongsTo(Pessoa_model::class);
        }

        public function area() {
            return $this->belongsTo(Area_model::class);
        }

        public function tipo() {
            return $this->belongsToMany(Tipo_model::class);
        }

    }
