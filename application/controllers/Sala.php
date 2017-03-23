<?php defined('BASEPATH') OR exit('No direct script access allowed');

  /**
   *  Essa classe é responsavel por todas regras de negócio sobre sala.
   *  @since 2017/03/23
   *  @author Jean Brock
   */

   Class Sala extends CI_Controller{
     public function index(){
       $this->cadastro();
     }


         // =========================================================================
         // ==========================CRUD de disciplinas============================
         // =========================================================================

         /**
           * Valida os dados do forumulário de cadastro de salas.
           * Caso o formulario esteja valido, envia os dados para o modelo realizar
           * a persistencia dos dados.
           * @author Jean Brock
           * @since 2017/03/23
           */
         public function cadastro () {

           $this->load->model(array("Sala_model"));

           // Definir as regras de validação para cada campo do formulário.
           $this->form_validation->set_rules('nSala', 'Numero Sala', array('required', 'max_length[5]','strtoupper'));
           $this->form_validation->set_rules('capMax', 'Capacidade Maxima', array('required', 'integer', 'greater_than[0]'));
           $this->form_validation->set_rules('tipo', 'Tipo', array('required','min_length[5]','ucwords'));
          // Definição dos delimitadores
           $this->form_validation->set_error_delimiters('<span class="text-danger">','</span>');

           // Verifica se o formulario é valido
           if ($this->form_validation->run() == FALSE) {

            $dados['salas'] = $this->Sala_model->getSalas();
     	      $this->load->view('salas', $dados);

           } else {

             // Pega os dados do formulário
             $sala = array(
               'nSala'      => $this->input->post("nSala"),
               'capMax'     => $this->input->post('capMax'),
               'tipo'       => $this->input->post("tipo")
             );

             if ($this->Sala_model->insertSala($sala)){
               $this->session->set_flashdata('success','Sala cadastrada com sucesso');
             } else {
               $this->session->set_flashdata('danger','Não foi possivel cadastrar a sala, tente novamente ou entre em contato com o administrador do sistema');
             }
             redirect("http://localhost/class_clock/");
           }
         }
           /**
             * Deleta uma sala.
             * @author Jean Brock
             * @since 2017/03/23
             * @param $id ID da sala
             */
           public function deletar ($id) {
             // Carrega os modelos necessarios
             $this->load->model(array('Sala_model'));

             if ( $this->Sala_model->deleteSala($id) )
                $this->session->set_flashdata('success','Sala deletada com sucesso');
              else
                $this->session->set_flashdata('danger','Não foi possivel deletar a sala, tente novamente ou entre em contato com o administrador do sistema');
               redirect("http://localhost/class_clock/");
           }

           /**
             * Altera os dado da disciplina.
             * @author Jean Brock
             * @since 2017/03/23
             * @param $id ID da sala
             */
           public function atualizar () {

             $this->load->model(array('Sala_model'));

             // Definir as regras de validação para cada campo do formulário.
             $this->form_validation->set_rules('recipient-nSala', 'Numero Sala', array('required', 'max_length[5]','strtoupper'));
             $this->form_validation->set_rules('recipient-capMax', 'Capacidade Maxima', array('required', 'integer', 'greater_than[0]'));
             $this->form_validation->set_rules('recipient-tipo', 'Tipo', array('required','min_length[5]','ucwords'));
            // Definição dos delimitadores
             $this->form_validation->set_error_delimiters('<span class="text-danger">','</span>');

             // Verifica se o formulario é valido
             if ($this->form_validation->run() == FALSE) {

              $dados['salas'] = $this->Sala_model->getSalas();
       	      $this->load->view('salas', $dados);

             } else {

               $id = $this->input->post('recipient-id');
               // Pega os dados do formulário
              $sala = array(
                'nSala'        => $this->input->post("recipient-nSala"),
                'capMax'       => $this->input->post('recipient-capMax'),
                'tipo'         => $this->input->post("recipient-tipo")
              );
              if ( $this->Sala_model->updateSala($id, $sala) )
                $this->session->set_flashdata('success', 'Sala atualizada com sucesso');
              else
                $this->session->set_flashdata('danger','Não foi possivel atualizar os dados da sala, tente novamente ou entre em contato com o administrador do sistema');
               redirect("http://localhost/class_clock/");
             }
           }
         }
       ?>
