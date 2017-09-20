<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pessoa extends MY_Controller {
    private $id_docente = 4;

    /**
    * Página inicial de pessoa
    * @author Vitor "Pliavi"
    */
    function index() {
        $pessoas = Pessoa_model::withTrashed()->get();
        $this->load->template('pessoas/pessoas', compact('pessoas'),'pessoas/js_pessoas');
    }

    /**
    * Formulário de cadastro
    * @author Vitor "Pliavi"
    */
    function cadastrar() {
        $tipos = Tipo_model::all();
        $this->load->template('pessoas/cadastrar', compact('tipos'),'pessoas/js_pessoas');
    }

    /**
    * Salva uma pessoa no banco
    * @author Vitor "Pliavi"
    */
    function salvar() {
        $has_docente = in_array($this->id_docente, $this->request('tipos')?:[]);

        $this->set_validations([
            ['nome', 'nome', 'required|min_length[5]'],
            ['prontuario', 'prontuário', 'required|is_unique[pessoa.prontuario]|exact_length[6]|numeric'],
            ['senha', 'senha', 'required|min_length[6]'],
            ['email', 'email', 'required|valid_email|strtolower'],
            ['tipos[]', 'tipos', 'required']
        ]);

        if($has_docente) {
            $this->set_validations([
                ['nascimento', 'data de nascimento', 'required|valid_date'],
                ['ingresso_campus', 'data de ingresso no câmpus', 'required|valid_date'],
                ['ingresso_ifsp', 'data de ingresso no IFSP', 'required|valid_date'],
                ['area', 'área', 'required'],
                ['regime_contrato', 'regime de contrato', 'required|in_list[20, 40]'],
            ]);
        }

        if($this->run_validation()) {
            DB::transaction(function() {
                $pessoa = Pessoa_model::create($this->request_all());
                if($has_docente) {
                    $docente = Docente_model::create($this->request_all());
                }

                // Monta as relações de tipo
                $pessoa->tipos()->sync($this->request('tipos'));
            });
            $this->session->set_flashdata('success', 'Pessoa cadastrada com sucesso');
            redirect('/pessoa');
        } else {
            $this->session->set_flashdata('danger', 'Não foi possível cadastrar a pessoa');
            $this->cadastrar();
        }
    }

    /**
    * Formulário de edição
    * @author Vitor "Pliavi"
    * @param $id ID da pessoa a ser desativada
    */
    function editar($id) {
        $pessoa = Pessoa_model::findOrFail($id);
        $tipos = Tipo_model::all();
		$tipos_pessoa = [];

		foreach($pessoa->tipos as $t){
			$tipos_pessoa[] = $t->id;
		}

        $this->load->template('pessoas/editar', compact('pessoa', 'tipos_pessoa', 'tipos'));
    }

    /**
    * Atualiza os dados da pessoa
    * @author Vitor "Pliavi"
    * @param $id ID da pessoa a ser atualizada
    */
    function atualizar($id) {
        $pessoa = Pessoa_model::findOrFail($id);
        $has_docente = in_array($this->id_docente, $this->request('tipos')?:[]); // Se o docente estiver na lista de tipos

        $this->set_validations([
            ['nome', 'nome', 'required|min_length[5]'],
            ['prontuario', 'prontuário', 'required|exact_length[6]'],
            ['senha', 'senha', 'min_length[6]'],
            ['email', 'email', 'required|valid_email|strtolower'],
            ['tipos[]', 'tipos', 'required']
        ]);

        if($has_docente) {
            $this->set_validations([
                ['nascimento', 'data de nascimento', 'required|valid_date'],
                ['ingresso_campus', 'data de ingresso no câmpus', 'required|valid_date'],
                ['ingresso_ifsp', 'data de ingresso no IFSP', 'required|valid_date'],
                ['area', 'área', 'required'],
                ['regime_contrato', 'regime de contrato', 'required|in_list[20, 40]'],
            ]);
        }

        if ($this->run_validation()) {
            $pessoa_data = $this->request_all();
            if(empty(trim($pessoa_data['senha']))){
                unset($pessoa_data['senha']);
            }

            DB::transaction(function() use ($id, $pessoa, $pessoa_data, $has_docente) {
                $pessoa->update($pessoa_data);
                if($has_docente) {
                    $docente = $pessoa->docente;
                    $docente->update($this->request_all());
                } else if(!is_null($pessoa->docente)){
                    $pessoa->docente->delete();
                }

                // Realinha os tipos
                $pessoa->tipos()->sync($this->request('tipos'));
            });

            $this->session->set_flashdata('success', 'Pessoa atualizada com sucesso');
            redirect('/pessoa');
        } else {
            $this->session->set_flashdata('danger', 'Não foi possível atualizar a pessoa');
            $this->editar();
        }
    }

    /**
    * Desativa a pessoa
    * @author Vitor "Pliavi"
    * @param $id ID da pessoa a ser desativada
    */
    function deletar($id) {
        Pessoa_model::findOrFail($id)->delete();
        $this->session->set_flashdata('success', 'Pessoa deletada com sucesso');
		redirect('/pessoa');
    }

    /**
     * Ativa a Pessoa
     * @author Denny Azevedo
     * @since 2017/09/11
     * @param ID da Pessoa
    */
    function ativar ($id) {
        Pessoa_model::withTrashed()->findOrFail($id)->restore();
        $this->session->set_flashdata('success','Pessoa ativada com sucesso');
		redirect('/pessoa');
    }

    /**
     * Verifica se o prontuário é único
     * @author Yasmin Sayad
     * @since 2017/09/17
     * @param Prontuario
    */
    public function verificaProntuario() {
        $validate_data = array('prontuario' => $this->request('prontuario'));
        $this->form_validation->set_data($validate_data);
        $this->form_validation->set_rules('prontuario', 'prontuario', 'is_unique[pessoa.prontuario]');

        if($this->form_validation->run()) {
            echo "true";
        } else {
            echo "false";
        }
    }

}
