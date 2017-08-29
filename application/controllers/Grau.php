<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *  Essa classe é responsavel por todas regras de negócio sobre Grau.
 * @author Jean Brock
 * @since 2017/08/20
 */
class Grau extends CI_Controller {
  function index () {
    $this->load->model(array(
      'Grau_model'
    ));
    // $graus = Grau_model::where('valid',TRUE)->get();
    $graus = Grau_model::all();
    $this->load->template('graus/graus',compact('graus'),'graus/js_graus');
  }
  function cadastrar() {
    $this->load->model(array(
      'Grau_model'
    ));
    // Criando regra de validação do formulário
    $this->form_validation->set_rules('nome_grau','nome',array('required','max_length[20]','trim','strtolower'));
    $this->form_validation->set_rules('codigo','codigo', array('required','integer','greater_than[0]','max_length[5]'));
    // Setando os delimitadores da mensagem de erro.
    $this->form_validation->set_error_delimiters('<span class="text-danger">','</span>');
    if ( $this->form_validation->run()) {
        $this->salvar();
    } else {
        // $graus = Grau_model::where('valid',TRUE)->get();
        $graus = Grau_model ::all();
        $this->load->template('graus/GrausCadastrar',compact('graus'),'graus/js_graus');
    }
  }

  private function salvar () {
    try {
      DB::transaction(function () {
        $grau = new Grau_model();
        $grau->codigo = $this->input->post('codigo');
        $grau->nome_grau = $this->input->post('nome_grau');
        $grau->save();
      });

      $this->session->set_flashdata('success','Grau cadastrado com sucesso');

    } catch (Exception $e) {
      $this->session->set_flashdata('danger','Problemas ao cadastrar o grau, tente novamente!');
    }
    redirect("Grau");
  }

  function editar($id){
    $this->load->model(array(
      'Grau_model'
    ));
    // Criando regra de validação do formulário
    $this->form_validation->set_rules('nome_grau','nome',array('required','max_length[20]','trim','strtolower'));
    $this->form_validation->set_rules('codigo','codigo', array('required','integer','greater_than[0]','max_length[5]'));
    // Setando os delimitadores da mensagem de erro.
    $this->form_validation->set_error_delimiters('<span class="text-danger">','</span>');
    if ( $this->form_validation->run()) {
        $this->atualizar();
    } else {
        $grau = Grau_model::findOrFail($id);
        $this->load->template('graus/GrausEditar',compact('grau'));
    }
  }

  private function atualizar ($idGrau) {
    try {
      DB::transaction(function ($id) use ($idGrau) {
        $grau = Grau_model::findOrFail($id);
        $grau->codigo = $this->input->post('codigo');
        $grau->nome_grau = $this->input->post('nome_grau');
        $grau->save();
      });
      $this->session->set_flashdata('success','Grau atualizado com sucesso');
    } catch (Exception $e) {
      $this->session->set_flashdata('danger','Problemas ao atualizar os dados do grau, tente novamente!');
    }
    redirect('Grau');
  }

  function deletar ($idGrau) {
    try {
      DB::transaction(function ($id) use ($idGrau) {
        $grau = Grau_model::findOrFail($id);
        $grau->valid = FALSE;
        $grau->save();
      });

      $this->session->set_flashdata('success','Grau deletado com sucesso');
    }catch (Exception $e) {
      $this->session->set_flashdata('danger','Erro ao deletar um grau, tente novamente');
    }
    redirect("Grau");
  }
}
?>
