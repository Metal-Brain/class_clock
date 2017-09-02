<?php
    /**
    *  Essa classe é responsavel por todas regras de negócio sobre disciplinas.
    *  @since 2018/08/28
    *  @author Thalita Barbosa
    */
    class Disciplina extends CI_Controller 
    {
        function index () 
        {
            $disciplinas = Disciplina_model::all();
            $this->load->template('disciplinas/disciplinas',compact('disciplinas'),'disciplinas/js_disciplinas');
        }
        // =========================================================================
        // ==========================CRUD de disciplinas============================
        // =========================================================================
        /*
            * Valida os dados do forumulário de cadastro de disciplinas.
            * Caso o formulario esteja valido, envia os dados para o modelo realizar
            * a persistencia dos dados.
            * @author Thalita Barbosa
            * @since 2018/08/28
        */       
        function cadastrar () 
        {
            // Definir as regras de validação para cada campo do formulário.
            $this->form_validation->set_rules('nome_disciplina', 
                                              'nome da disciplina', 
                                              array('required',
                                                    'min_length[5]', 
                                                    'is_unique[Disciplina.nome_disciplina]',
                                                    'ucwords'
                                                    )
                                             );
            $this->form_validation->set_rules('sigla_disciplina', 
                                              'sigla', 
                                              array('required', 
                                                    'max_length[5]', 
                                                    'is_unique[Disciplina.sigla_disciplina]',
                                                    'strtoupper'
                                                   )
                                             );
            $this->form_validation->set_rules('modulo', 
                                              'modulo', 
                                              array('required', 
                                                    'integer', 
                                                    'greater_than[0]', 
                                                    'less_than[20]'
                                                   )
                                             );
            $this->form_validation->set_rules('qtd_professor', 
                                              'quantidade de professores', 
                                              array('required', 
                                                    'integer', 
                                                    'greater_than[0]', 
                                                    'less_than[10]'
                                                   )
                                             );
            $this->form_validation->set_rules('carga_semanal', 
                                              'carga_semanal', 
                                              array('required', 
                                                    'integer', 
                                                    'greater_than[0]', 
                                                    'less_than[10]'
                                                   )
                                             );
            
            $this->form_validation->set_error_delimiters('<span class="text-danger">','</span>');
            
            if ($this->form_validation->run()) 
            {
                $this->salvar();
            } 
            else 
            {
                $disciplinas = Disciplina_model::all();
                $this->load->template('disciplinas/disciplinas',compact('disciplinas'),'disciplinas/js_disciplinas');
            }
        }
        
        /**
            * Salva um novo usuário no banco de dados.
            * @author Denny Azevedo
            * @since 2017/08/28
        */
        private function salvar () 
        {
            try 
            {
                DB::transaction(function () 
                {
                    $disciplinas = new Disciplina_model();
                    
                    $disciplinas->nome_disciplina  = $this->input->post('nome_disciplina') ;
                    $disciplinas->sigla_disciplina = $this->input->post('sigla_disciplina');
                    $disciplinas->modulo           = $this->input->post('modulo')          ;
                    $disciplinas->qtd_professor    = $this->input->post('qtd_professor')   ;
                    $disciplinas->carga_semanal    = $this->input->post('carga_semanal')   ;
                    $disciplinas->save(); 
                });
                $this->session->set_flashdata('success','Disciplina cadastrada com sucesso');
            } catch (Exception $e) {
            $this->session->set_flashdata('danger','Problemas ao cadastrar a Disciplina, tente novamente!');
            }
            redirect("Disciplina");
        }
        
        /*
            * Formulário para alterar os dados da Disciplina
            * @author Denny Azevedo
            * @since 2017/08/28
        */
        function editar ($id) 
        {
            // Definir as regras de validação para cada campo do formulário.
            $this->form_validation->set_rules('nome_disciplina', 
                                              'nome da disciplina', 
                                              array('required',
                                                    'min_length[5]', 
                                                    'is_unique[Disciplina.nome_disciplina]',
                                                    'ucwords'
                                                    )
                                             );
            $this->form_validation->set_rules('sigla_disciplina', 
                                              'sigla', 
                                              array('required', 
                                                    'max_length[5]', 
                                                    'is_unique[Disciplina.sigla_disciplina]',
                                                    'strtoupper'
                                                   )
                                             );
            $this->form_validation->set_rules('modulo', 
                                              'modulo', 
                                              array('required', 
                                                    'integer', 
                                                    'greater_than[0]', 
                                                    'less_than[20]'
                                                   )
                                             );
            $this->form_validation->set_rules('qtd_professor', 
                                              'quantidade de professores', 
                                              array('required', 
                                                    'integer', 
                                                    'greater_than[0]', 
                                                    'less_than[10]'
                                                   )
                                             );
            $this->form_validation->set_rules('carga_semanal', 
                                              'carga_semanal', 
                                              array('required', 
                                                    'integer', 
                                                    'greater_than[0]', 
                                                    'less_than[10]'
                                                   )
                                             );
            
            $this->form_validation->set_error_delimiters('<span class="text-danger">','</span>');
            
            if ($this->form_validation->run()) 
            {
                $this->atualizar($id);
            }
            else 
            {
                $disciplinas = Disciplina_model::findOrFail($id);
                $this->load->template('disciplinas/disciplinas',compact('disciplinas'));
            }
        }
        
        /*
            * Edita os dado da disciplina.
            * @author Denny Azevedo
            * @since 2018/08/28
        */
        private function atualizar ($id) 
        {
            try 
            {
                DB::transaction(function ($id) use ($id) 
                {
                    $disciplinas = Disciplina_model::findOrFail($id);
                    $disciplinas->nome_disciplina  = $this->input->post('nome_disciplina') ;
                    $disciplinas->sigla_disciplina = $this->input->post('sigla_disciplina');
                    $disciplinas->modulo           = $this->input->post('modulo')          ;
                    $disciplinas->qtd_professor    = $this->input->post('qtd_professor')   ;
                    $disciplinas->carga_semanal    = $this->input->post('carga_semanal')   ;
                    $index = 0;
                    
                    $disciplinas->save();
                  });
                  $this->session->set_flashdata('success','Disciplina atualizada com sucesso');
            } 
            catch (Exception $e) 
            {
                $this->session->set_flashdata('danger','Problemas ao atualizar os dados da Disciplina, tente novamente!');
            }
            redirect('Disciplna');
        }
        /**
            * Deleta uma disciplina.
            * @author Denny Azevedo
            * @since  2018/08/28
            * @param $id ID da disciplina
        */
        function deletar ($id) 
        {
        // TODO: alterar o status do turno no banco de dados
            try 
            {
                DB::transaction(function ($id) use ($id) 
                {
                    $disciplinas = Disciplina_model::findOrFail($id);
                    $disciplinas->delete();
                });
                
                $this->session->set_flashdata('success','Disciplina deletada com sucesso');
            }
            catch (Exception $e) 
            {
                $this->session->set_flashdata('danger','Erro ao deletar uma Disciplina, tente novamente');
            }
        redirect("Disciplina");
        }
    }
?>
