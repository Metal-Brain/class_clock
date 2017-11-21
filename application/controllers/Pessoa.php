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
    $niveis = [
      101 => 'D101',
      102 => 'D102',
      103 => 'D103',
      104 => 'D104',
      201 => 'D201',
      202 => 'D202'
    ];
    $titulacoes = [
      4 => "Graduação",
      3 => "Especialização",
      2 => "Mestrado",
      1 => "Doutorado"
    ];
    $areas = Area_model::all();
    $this->load->template('pessoas/cadastrar', compact('tipos', 'niveis', 'titulacoes', 'areas'),'pessoas/js_pessoas');
  }
  public function prontuario_check($str)
{
   if ((preg_match('#[0-9]#', $str) && preg_match('#[a-zA-Z]#', $str))||(preg_match('#[0-9]#', $str))) {
     return TRUE;
   }
   return FALSE;
}
  
  /**
  * Salva uma pessoa no banco
  * @author Vitor "Pliavi"
  */
  function salvar() {
    $has_docente = in_array($this->id_docente, $this->request('tipos')?:[]);
    $this->set_validations([
      ['nome', 'nome', 'required|min_length[5]'],
      ['prontuario', 'prontuário', 'required|alpha_numeric|is_unique[pessoa.prontuario]|exact_length[6]|callback_prontuario_check'],
      ['senha', 'senha', 'required|min_length[6]'],
      ['email', 'email', 'required|valid_email|strtolower|regex_match[/^[a-zA-Z0-9._@-]+$/]'],
      ['tipos[]', 'tipo', 'required']
    ]);
    $this->form_validation->set_message('is_unique', 'Prontuário já cadastrado.');
    $this->form_validation->set_message('alpha_numeric', 'O campo {field} deve conter apenas letras e números.');
	$this->form_validation->set_message('prontuario_check', 'O campo Prontuario deve conter apenas letras e números ou apenas numeros.');
    if($has_docente) {
      $this->set_validations([
        ['nascimento', 'data de nascimento', 'required|valid_date_br'],
        ['ingresso_campus', 'data de ingresso no câmpus', 'required|valid_date_br'],
        ['ingresso_ifsp', 'data de ingresso no IFSP', 'required|valid_date_br'],
        ['area_id', 'área', 'required'],
        ['titulacao', 'Titulação', 'required'],
        ['nivel_carreira', 'Nível de Carreira', 'required'],
        ['regime', 'regime de contrato', 'required|in_list[0,1]'],
      ]);
    }
    if($this->run_validation()) {
      DB::transaction(function() use ($has_docente) {
        $pessoa = Pessoa_model::create($this->request_all());
        if($has_docente) {
          $dados_docente = $this->request_all();
          $dados_docente['pessoa_id'] = $pessoa->id;
          $docente = Docente_model::create($dados_docente);
        }
        // Monta as relações de tipo
        $pessoa->tipos()->sync($this->request('tipos'));
      });
      $this->session->set_flashdata('success', 'Cadastrado realizado com sucesso');
      redirect('/pessoa');
    } else {
      $this->session->set_flashdata('danger', 'Não foi possível realizar o cadastro');
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
    $niveis = [
      101 => 'D101',
      102 => 'D102',
      103 => 'D103',
      104 => 'D104',
      201 => 'D201',
      202 => 'D202'
    ];
    $titulacoes = [
      4 => "Graduação",
      3 => "Especialização",
      2 => "Mestrado",
      1 => "Doutorado"
    ];
    $areas = Area_model::all();
    foreach($pessoa->tipos as $t){
      $tipos_pessoa[] = $t->id;
    }
    $this->load->template('pessoas/editar', compact('pessoa', 'tipos_pessoa', 'tipos', 'titulacoes', 'niveis', 'areas'), 'pessoas/js_pessoas');
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
      ['prontuario', 'prontuário', "required|alpha_numeric|callback_prontuario_check|exact_length[6]|is_unique_except[pessoa.prontuario,{$pessoa->prontuario}]"],
      ['senha', 'senha', 'min_length[6]'],
      ['email', 'email', 'required|valid_email|strtolower|regex_match[/^[a-zA-Z0-9._@-]+$/]'],
      ['tipos[]', 'tipos', 'required']
    ]);
    $this->form_validation->set_message('is_unique_except', 'Prontuário já cadastrado.');
    $this->form_validation->set_message('alpha_numeric', 'O campo {field} deve conter apenas letras e números.');
	$this->form_validation->set_message('prontuario_check', 'O campo Prontuario deve conter apenas letras e números ou apenas numeros.');
    if($has_docente) {
      $this->set_validations([
        ['nascimento', 'data de nascimento', 'required|valid_date_br'],
        ['ingresso_campus', 'data de ingresso no câmpus', 'required|valid_date_br'],
        ['ingresso_ifsp', 'data de ingresso no IFSP', 'required|valid_date_br'],
        ['area_id', 'área', 'required'],
        ['titulacao', 'Titulação', 'required'],
        ['nivel_carreira', 'Nível de Carreira', 'required'],
        ['regime', 'regime de contrato', 'required|in_list[0,1]'],
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
          $dados_docente = $this->request_all();
          $dados_docente['pessoa_id'] = $id;
          if(is_null($docente)){
            $docente = Docente_model::create($dados_docente);
          } else {
            $docente->update($dados_docente);
          }
        } else if(!is_null($pessoa->docente)){
          $pessoa->docente->delete();
        }
        // Realinha os tipos
        $pessoa->tipos()->sync($this->request('tipos'));
      });
      $this->session->set_flashdata('success', 'Cadastro atualizado com sucesso');
      redirect('/pessoa');
    } else {
      $this->session->set_flashdata('danger', 'Não foi possível atualizar o cadastro');
      $this->editar($id);
    }
  }
  /**
  * Desativa a pessoa
  * @author Vitor "Pliavi"
  * @param $id ID da pessoa a ser desativada
  */
  function deletar($id) {
    Pessoa_model::findOrFail($id)->delete();
    $this->session->set_flashdata('success', 'Desativado com sucesso');
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
    $this->session->set_flashdata('success','Ativado com sucesso');
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
