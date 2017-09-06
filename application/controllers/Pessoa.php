<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pessoa extends MY_Controller {

    function index() {
        $pessoas = Pessoa_model::all();
        $this->load->template('pessoas', compact('pessoas'));
    }

    function cadastrar() {
        $this->load->template('pessoas/cadastrar';
    }

    function salvar() {
        $pessoa = new Pessoa_model;
        $pessoa->save();
    }

    function editar($id) {
        $pessoa = Pessoa_model::findOrFail($id);
        $this->load->template('pessoas/editar', compact('pessoa'));
    }

    function atualizar($id) {
        $pessoa = Pessoa_model::findOrFail($id);
        $pessoa->save();
    }

    function deletar($id) {
        Pessoa_model::findOrFail($id)->delete();
    }

}
