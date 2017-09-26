<?php defined('BASEPATH') OR exit('No direct script access allowed');

    class Pessoa_model extends Model{

        protected $table = 'pessoa';
        protected $fillable = [ "nome", "prontuario", "senha", "email" ];

        /**
        * Pega a senha do usuário e passa pelo blowfish assim que seu valor é dado.
        * @author Vitor "Pliavi"
        * @param $senha senha a ser "hasheada"
        */
        public function setSenhaAttribute($senha) {
            $this->attributes['senha'] = password_hash($senha, PASSWORD_BCRYPT);
        }

        public function docente() {
            return $this->hasOne(Docente_model::class, 'pessoa_id');
        }

        public function tipos() {
            return $this->belongsToMany(Tipo_model::class, 'tipo_pessoa', 'pessoa_id', 'tipo_id');
        }

    }
