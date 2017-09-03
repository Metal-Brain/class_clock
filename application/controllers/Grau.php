<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *  Regras de negócio sobre Grau.
 * @author Jean Brock
 * @since 2017/08/20
 */
class Grau extends CI_Controller {

    /**
    * Página inicial dos graus
    * @author Jean Brock | Vitor Silvério
    */
    function index () {
        $graus = Grau_model::all();
        $this->load->template('graus/graus', compact('graus'),'graus/js_graus');
    }

    /**
    * Formulário de cadastro
    * @author Jean Brock | Vitor Silvério
    */
    function cadastrar() {
        $this->load->template('graus/GrausCadastrar',[],'graus/js_graus');
    }

    /**
    * Salva os dados do formulário no banco
    * @author Jean Brock | Vitor Silvério
    */
    function salvar () {
        if($this->validar()){
            try {
                $grau = new Grau_model();
                $grau->codigo = $this->input->post('codigo');
                $grau->nome_grau = $this->input->post('nome_grau');
                $grau->save();

                $this->session->set_flashdata('success','Grau cadastrado com sucesso');
                redirect("Grau");
            } catch (Exception $ignored){}
        }

        $this->session->set_flashdata('danger','Problemas ao cadastrar o grau, tente novamente!');
        redirect("Grau/cadastrar");
    }

    /**
    * Formulário de Edição
    * @author Jean Brock | Vitor Silvério
    */
    function editar($id) {
        $grau = Grau_model::findOrFail($id);
        $this->load->template('graus/GrausEditar',compact('grau');
    }

    /**
    * Atualiza os dados no banco de acordo com os dados do formulário
    * @author Jean Brock | Vitor Silvério
    */
    private function atualizar ($idGrau) {
        if($this->validar()){
            try {
                $grau = Grau_model::withTrashed()->findOrFail($id);
                $grau->codigo = $this->input->post('codigo');
                $grau->nome_grau = $this->input->post('nome_grau');
                $grau->save();

                $this->session->set_flashdata('success','Grau atualizado com sucesso');
                redirect('Grau');
            } catch (Exception $ignored){}
        }

        $this->session->set_flashdata('danger','Problemas ao atualizar os dados do grau, tente novamente!');
        redirect('Grau');
    }

    /**
    * Deleta um grau
    * @param $idGrau Id do grau a ser removido
    * @author Jean Brock | Vitor Silvério
    */
    function deletar ($idGrau) {
        try {
            $grau = Grau_model::findOrFail($id);
            $grau->delete();

            $this->session->set_flashdata('success','Grau deletado com sucesso');
        }catch (Exception $e) {
            $this->session->set_flashdata('danger','Erro ao deletar um grau, tente novamente');
        }

        redirect("Grau");
    }


    /**
    * Valida os dados a serem utilizados durante o salvamento e atualização do grau
    * @author Jean Brock | Vitor Silvério
    * @return boolean Retorna se os dados passaram ou não na validação
    */
    private function validar() {
        $this->form_validation->set_rules('nome_grau','nome',array('required','max_length[50]','trim','strtolower'));
        $this->form_validation->set_rules('codigo','codigo', array('required','integer','greater_than[0]','max_length[5]'));
        $this->form_validation->set_error_delimiters('<span class="text-danger">','</span>');

        return $this->form_validation->run();
    }
}
