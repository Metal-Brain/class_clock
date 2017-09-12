<?php defined('BASEPATH') OR exit('No direct script access allowed');

    class Pessoa_model extends Model{

        protected $table = 'pessoa';
        protected $guarded = [];

        /**
        * Pega a senha do usuário e passa pelo blowfish assim que seu valor é dado.
        * @author Vitor "Pliavi"
        * @param $senha senha a ser "hasheada"
        */
        public function setSenhaAttribute($senha) {
            $this->attributes['senha'] = password_hash($senha, PASSWORD_BCRYPT);
        }

        public function docente(){
            return $this->hasOne(Docente_model::class);
        }

    }
