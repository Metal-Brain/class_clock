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
      ['prontuario', 'prontuário', 'required|alpha_numeric|is_unique[pessoa.prontuario]|exact_length[6]'],
      ['senha', 'senha', 'required|min_length[6]'],
      ['email', 'email', 'required|valid_email|strtolower|regex_match[/^[a-zA-Z0-9._@-]+$/]'],
      ['tipos[]', 'tipos', 'required']
    ]);
    $this->form_validation->set_message('is_unique', 'Prontuário já cadastrado.');
    $this->form_validation->set_message('alpha_numeric', 'O campo {field} deve conter apenas letras e números.');

    if($has_docente) {
      $this->set_validations([
        ['nascimento', 'data de nascimento', 'required|valid_date_br'],
        ['ingresso_campus', 'data de ingresso no câmpus', 'required|valid_date_br'],
        ['ingresso_ifsp', 'data de ingresso no IFSP', 'required|valid_date_br'],
        // ['area', 'área', 'required'], FIXME: adicionar essa validação quando a area for existente
        ['regime', 'regime de contrato', 'required|in_list[0,1]'],
      ]);
    }

    if($this->run_validation()) {
      DB::transaction(function() use ($has_docente) {
        $pessoa = Pessoa_model::create($this->request_all());
        if($has_docente) {
          // FIXME: Colocar área, aqui foi feito um workaround presetando uma área
          $dados_docente = $this->request_all();
          $dados_docente['area_id'] = 1; // FIXME: Esta linha deverá ser removida quando a área for existente
          $dados_docente['pessoa_id'] = $pessoa->id;
          $docente = Docente_model::create($dados_docente);
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

    $this->load->template('pessoas/editar', compact('pessoa', 'tipos_pessoa', 'tipos'), 'pessoas/js_pessoas');
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
      ['prontuario', 'prontuário', "required|alpha_numeric|exact_length[6]|is_unique_except[pessoa.prontuario,{$pessoa->prontuario}]"],
      ['senha', 'senha', 'min_length[6]'],
      ['email', 'email', 'required|valid_email|strtolower|regex_match[/^[a-zA-Z0-9._@-]+$/]'],
      ['tipos[]', 'tipos', 'required']
    ]);
    $this->form_validation->set_message('is_unique_except', 'Prontuário já cadastrado.');
    $this->form_validation->set_message('alpha_numeric', 'O campo {field} deve conter apenas letras e números.');

    if($has_docente) {
      $this->set_validations([
        ['nascimento', 'data de nascimento', 'required|valid_date_br'],
        ['ingresso_campus', 'data de ingresso no câmpus', 'required|valid_date_br'],
        ['ingresso_ifsp', 'data de ingresso no IFSP', 'required|valid_date_br'],
        // ['area', 'área', 'required'], FIXME: adicionar essa validação quando a area for existente
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
          $dados_docente['area_id'] = 1; // FIXME: Esta linha deverá ser removida quando a área for existente
          $dados_docente['pessoa_id'] = $id;
          if(is_null($docente)){
            // FIXME: Colocar área, aqui foi feito um workaround presetando uma área
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

      $this->session->set_flashdata('success', 'Pessoa atualizada com sucesso');
      redirect('/pessoa');
    } else {
      $this->session->set_flashdata('danger', 'Não foi possível atualizar a pessoa');
      $this->editar($id);
    }
  }

  /**
  * Desativa a pessoa
  * @author Vitor "Pliavi"
  * @param $id ID da pessoa a ser desativada
  */
  function deletar($id) {
    $pessoa = Pessoa_model::findOrFail($id);
    $docente = Docente_model::where('docente.pessoa_id', $id)->get();
    $curso = Curso_model::where('curso.docente_id', $docente[0]->id)->get();
    $curso[0]->docente_id = null;
    $curso[0]->save();
    $pessoa->delete();

    $this->session->set_flashdata('success', 'Pessoa desativada com sucesso');
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
