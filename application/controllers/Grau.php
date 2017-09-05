<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *  Regras de negócio sobre Grau.
 * @author Jean Brock
 * @since 2017/08/20
 */
class Grau extends CI_Controller {

    /**
    * Página inicial dos graus
    * @author Jean Brock | Vitor Silvério | Thalita Barbosa
    */
    function index () {
        $graus = Grau_model::all();
        $this->load->template('graus/graus', compact('graus'),'graus/js_graus');
    }

    /**
    * Formulário de cadastro
    * @author Jean Brock | Vitor Silvério | Thalita Barbosa
    */
    function cadastrar() {
        $this->load->template('graus/grausCadastrar',[],'graus/js_graus');
    }

    /**
    * Salva os dados do formulário no banco
    * @author Jean Brock | Vitor Silvério | Thalita Barbosa
    */
    function salvar () {
        $this->form_validation->set_rules('nome_grau','nome',array('required','max_length[50]',
                                          'trim','regex_match[/^\D+$/]','alpha_numeric_spaces','is_unique[grau.nome_grau]'));
        $this->form_validation->set_rules('codigo','codigo', array('required','integer','greater_than[0]','max_length[5]'));
        $this->form_validation->set_error_delimiters('<span class="text-danger">','</span>');

        if($this->form_validation->run()){
            try {
                $grau = new Grau_model();
                $grau->nome_grau = $this->input->post('nome_grau');
                $grau->codigo = $this->input->post('codigo');
                $grau->save();

                $this->session->set_flashdata('success','Grau cadastrado com sucesso');
                redirect("Grau");
            } catch (Exception $ignored){}
        }

        $this->session->set_flashdata('danger','Problemas ao cadastrar o grau, tente novamente!');
        redirect('Grau/cadastrar');
    }
    redirect("Grau");
  }

  function editar($id){
   	   $this->load->model(array(
      'Grau_model'
    ));
    // Criando regra de validação do formulário
    $this->form_validation->set_rules('nome_grau','nome',array('required','max_length[50]','trim','strtolower'));
    $this->form_validation->set_rules('codigo','codigo', array('required','integer','greater_than[0]','max_length[5]'));
    // Setando os delimitadores da mensagem de erro.
    $this->form_validation->set_error_delimiters('<span class="text-danger">','</span>');
    if ( $this->form_validation->run()) {
        $this->atualizar();
    } else {
        $grau = Grau_model::findOrFail($id);
        $this->load->template('graus/GrausEditar',compact('grau','id'),'graus/js_graus');
    }

  public function atualizar ($idGrau) {
	   $this->load->model(array(
      'Grau_model'
    ));
    try {
      DB::transaction(function ($id) use ($idGrau) {
	    $grau = Grau_model::withTrashed()->findOrFail($id);
        $grau->codigo = $this->input->post('codigo');
        $grau->nome_grau = $this->input->post('nome_grau');
        $grau->save();
      });
      $this->session->set_flashdata('success','Grau atualizado com sucesso');
    } catch (Exception $e) {
      $this->session->set_flashdata('danger','Problemas ao atualizar os dados do grau, tente novamente!');
    }

    /**
    * Deleta um grau
    * @param $idGrau Id do grau a ser removido
    * @author Jean Brock | Vitor Silvério | Thalita Barbosas
    */
    function deletar ($id) {
        try {
            $grau = Grau_model::findOrFail($id);
            $grau->delete();

            $this->session->set_flashdata('success','Grau deletado com sucesso');
        }catch (Exception $e) {
            $this->session->set_flashdata('danger','Erro ao deletar um grau, tente novamente');
        }

        redirect('Grau');
    }
}
