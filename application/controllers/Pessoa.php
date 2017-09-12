<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pessoa extends MY_Controller {
    private $id_docente = 1;

    function index() {
        $pessoas = Pessoa_model::all();
        $this->load->template('pessoas', compact('pessoas'));
    }

    function cadastrar() {
        $tipos = Tipo_model::all();
        $this->load->template('pessoas/cadastrar', compact('tipos'));
    }

    function salvar() {
        DB::transaction(function() {
            $has_docente = in_array($this->id_docente, $this->request('tipos')); // Se o docente estiver na lista de tipos

            // testando!
            $this->set_validations([
                ['nome', 'nome', 'required|min_length[5]'],
                ['prontuario', 'prontuário', 'required|is_unique[pessoa.prontuario]|exact_length[7]'],
                ['senha', 'senha', 'required|min_length[6]'],
                ['data_nascimento', 'data de nascimento', 'required|valid_date'],
                ['email', 'email', 'required|valid_email'],
            ]);

            if($has_docente) {
                $this->set_validation('data_ingresso_campus', 'data de ingresso no câmpus',
                    'required|valid_date');
                $this->set_validation('data_ingresso_ifsp', 'data de ingresso no IFSP',
                    'required|valid_date');
                $this->set_validation('area', 'área',
                    'required');
                $this->set_validation('regime_contrato', 'regime de contrato',
                    'required|in_list[20, 40]');
            }

            $this->run_validation();

            $pessoa = Pessoa_model::create([
                'nome' => $this->request('nome'),
                'prontuario' => $this->request('prontuario'),
                'senha' => password_hash($this->request('senha'), PASSWORD_BCRYPT),
                'data_nascimento' => $this->request('data_nascimento'),
                'email' => $this->request('email'),
            ]);

            if($has_docente) {
                $docente = Docente_model::create([
                    'data_ingresso_campus' => $this->request('data_ingresso_campus'),
                    'data_ingresso_ifsp' => $this->request('data_ingresso_ifsp'),
                    'area' => $this->request('area'),
                    'regime_contrato' => $this->request('regime_contrato'),
                ]);
            }

            // Monta as relações de tipo
            $pessoa->tipos()->sync($this->request('tipos'));

            $this->session->set_flashdata('success', 'Pessoa cadastrada com sucesso');
        });
    }

    function editar($id) {
        $pessoa = Pessoa_model::findOrFail($id);
        $tipos = Tipo_model::all();
        $this->load->template('pessoas/editar', compact('pessoa', 'tipos'));
    }

    function atualizar($id) {
        DB::transaction(function() use ($id) {
            $pessoa = Pessoa_model::findOrFail($id);
            $has_docente = in_array($this->id_docente, $this->request('tipos')); // Se o docente estiver na lista de tipos

            $this->set_validation('nome', 'nome',
                'required|min_length[5]');
            $this->set_validation('prontuario', 'prontuário',
                'required|exact_length[7]');
            $this->set_validation('senha', 'senha',
                'required|min_length[6]');
            $this->set_validation('data_nascimento', 'data de nascimento',
                'required|valid_date');
            $this->set_validation('email', 'email',
                'required|valid_email');

            if($has_docente) {
                $this->set_validation('data_ingresso_campus', 'data de ingresso no câmpus',
                    'required|valid_date');
                $this->set_validation('data_ingresso_ifsp', 'data de ingresso no IFSP',
                    'required|valid_date');
                $this->set_validation('area', 'área',
                    'required');
                $this->set_validation('regime_contrato', 'regime de contrato',
                    'required|in_list[20, 40]');
            }

            $this->run_validation();

            $pessoa->update([
                'nome' => $this->request('nome'),
                'prontuario' => $this->request('prontuario'),
                'senha' => $this->request('senha'),
                'data_nascimento' => $this->request('data_nascimento'),
                'email' => $this->request('email'),
            ]);

            if($has_docente) {
                $docente = $pessoa->docente;
                $docente->update([
                    'data_ingresso_campus' => $this->request('data_ingresso_campus'),
                    'data_ingresso_ifsp' => $this->request('data_ingresso_ifsp'),
                    'area' => $this->request('area'),
                    'regime_contrato' => $this->request('regime_contrato'),
                ]);
            } else if(!is_null($pessoa->docente)){
                $pessoa->docente->delete();
            }

            // Realinha os tipos
            $pessoa->tipos()->sync($this->request('tipos'));

            $this->session->set_flashdata('success', 'Pessoa atualizada com sucesso');
        });
    }

    function deletar($id) {
        Pessoa_model::findOrFail($id)->delete();
        $this->session->set_flashdata('success', 'Pessoa deletada com sucesso');
    }

    /**
     * Ativa a Pessoa
     * @author Denny Azevedo
     * @since 2017/09/11
     * @param ID da Pessoa
     */
    function ativar ($id)
    {
        Pessoa_model::withTrashed()->findOrFail($id)->restore();
        $this->session->set_flashdata('success','Pessoa ativada com sucesso');
    }

}
