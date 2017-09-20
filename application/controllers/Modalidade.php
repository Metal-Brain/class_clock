<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *  Regras de negócio sobre Modalidade.
 * @author Jean Brock
 * @since 2017/08/20
 */
class Modalidade extends CI_Controller {

    /**
    * Página inicial dos modalidades
    * @author Jean Brock | Vitor Silvério | Thalita Barbosa
    */
    function index () {
        $modalidades = Modalidade_model::withTrashed()->get();
        $this->load->template('modalidades/modalidades', compact('modalidades'),'modalidades/js_modalidades');
    }

    /**
    * Formulário de cadastro
    * @author Jean Brock | Vitor Silvério | Thalita Barbosa
    */
    function cadastrar() {
        $this->load->template('modalidades/modalidadesCadastrar',[],'modalidades/js_modalidades');
    }

    /**
    * Salva os dados do formulário no banco
    * @author Jean Brock | Vitor Silvério | Thalita Barbosa
    */
    function salvar () {
        $this->form_validation->set_rules('nome_modalidade',
                                          'nome',
                                          array('required','max_length[50]',
                                            'trim',
                                            'regex_match[/^\D+$/]',
                                            /*'alpha_numeric_spaces',*/
                                            'is_unique[modalidade.nome_modalidade]'),
                                          array('is_unique' => 'Nome já existente.')
                                         );
        $this->form_validation->set_rules('codigo',
                                          'codigo',
                                           array('required',
                                                 'integer',
                                                 'greater_than[0]',
                                                 'max_length[5]',
                                                 'is_unique[modalidade.codigo]'
                                                 ),
                                           array('is_unique' => 'Código já existente.')
                                         );
        $this->form_validation->set_error_delimiters('<span class="text-danger">','</span>');

        if($this->form_validation->run()){
            try {

                $modalidade = new Modalidade_model();
                $modalidade->nome_modalidade = $this->input->post('nome_modalidade');
                $modalidade->codigo = $this->input->post('codigo');
                $modalidade->save();

                $this->session->set_flashdata('success','Modalidade cadastrada com sucesso');

            } catch (Exception $ignored){
                $this->session->set_flashdata('danger','Problemas ao cadastrar a modalidade, tente novamente!');
            }
            redirect('Modalidade');
        }else{
            $this->cadastrar();
        }
    }

    /**
    * Formulário de Edição
    * @author Jean Brock | Vitor Silvério | Thalita Barbosa
    */
    function editar($id) {
        $modalidade = Modalidade_model::withTrashed()->findOrFail($id);
        $this->load->template('modalidades/modalidadesEditar',compact('modalidade', 'id'),'modalidades/js_modalidades');
    }

    /**
    * Atualiza os dados no banco de acordo com os dados do formulário
    * @author Jean Brock | Vitor Silvério | Thalita Barbosa
    */
    function atualizar ($id) {
        $this->form_validation->set_rules('nome_modalidade',
                                          'nome',
                                          array('required',
                                                'max_length[50]',
                                                'trim',
                                                'regex_match[/^\D+$/]'
                                                /*'alpha_dash'*/)
												/*'alpha_numeric_spaces')*/
                                         );
        $this->form_validation->set_rules('codigo',
                                          'codigo',
                                          array('required',
                                                'integer',
                                                'greater_than[0]',
                                                'max_length[5]',
												'is_natural_no_zero')
                                          );
        $this->form_validation->set_error_delimiters('<span class="text-danger">','</span>');

        if($this->form_validation->run()){
            try {
                Modalidade_model::where('id', $id)
                            ->update([
                                "nome_modalidade"  => $this->input->post('nome_modalidade'),
                                "codigo"     => $this->input->post('codigo')
                            ]);

                $this->session->set_flashdata('success','Modalidade atualizada com sucesso');
                redirect('Modalidade');
            } catch (Exception $ignored){}
        }

        $this->session->set_flashdata('danger','Problemas ao atualizar os dados da modalidade, tente novamente!');
        redirect('Modalidade/editar');
    }

    /**
    * Deleta um modalidade
    * @param $idModalidade Id do modalidade a ser removido
    * @author Jean Brock | Vitor Silvério | Thalita Barbosas
    */
    function deletar ($id) {
        try {
            $modalidade = Modalidade_model::findOrFail($id);
            $modalidade->delete();

            $this->session->set_flashdata('success','Modalidade deletada com sucesso');
        }catch (Exception $e) {
            $this->session->set_flashdata('danger','Erro ao deletar uma modalidade, tente novamente');
        }

        redirect('Modalidade');
    }

    /**
    * Ativa o Modalidade
    * @author Thalita Barbosa
    * @since 2017/09/12
    * @param ID do modalidade
   */
    function ativar ($id) {
        try {
            $modalidade = Modalidade_model::withTrashed()->findOrFail($id);
            $modalidade->restore();
            $this->session->set_flashdata('success','Modalidade ativada com sucesso');
        } catch (Exception $e) {
            $this->session->set_flashdata('danger','Erro ao ativar a modalidade. Tente novamente!');
    }
            redirect('Modalidade');
  }

}
