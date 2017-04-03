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
		   // Carrega a biblioteca para validação dos dados.
		   $this->load->library(array('form_validation','session'));
		   $this->load->helper(array('form','url'));
           $this->load->model(array("Sala_model"));

           // Definir as regras de validação para cada campo do formulário.
           $this->form_validation->set_rules('nSala', 'número da sala', array('required', 'max_length[5]', 'is_unique[Sala.nSala]','strtoupper'));
           $this->form_validation->set_rules('capMax', 'capacidade máxima', array('required', 'integer', 'greater_than[0]'));
           $this->form_validation->set_rules('tipo', 'tipo', array('required','min_length[5]','ucwords'));
          // Definição dos delimitadores
           $this->form_validation->set_error_delimiters('<span class="text-danger">','</span>');

           // Verifica se o formulario é valido
           if ($this->form_validation->run() == FALSE) {
			
			$this->session->set_flashdata('formDanger','<strong>Não foi possível cadastrar a sala, pois existe(m) erro(s) no formulário:</strong>');
			
            $dados['salas'] = $this->Sala_model->getAll();
     	      $this->load->view('salas',$dados);

           } else {

             // Pega os dados do formulário
             $sala = array(
               'nSala'      => $this->input->post("nSala"),
               'capMax'     => $this->input->post('capMax'),
               'tipo'       => $this->input->post("tipo")
             );

             if ($this->Sala_model->insert($sala)){
               $this->session->set_flashdata('success','Sala cadastrada com sucesso');
             } else {
               $this->session->set_flashdata('danger','Não foi possível cadastrar a sala, tente novamente ou entre em contato com o administrador do sistema.');
             }
             redirect("Sala/cadastro");
           }
         }
           /**
             * Deleta uma sala.
             * @author Jean Brock
             * @since 2017/03/23
             * @param $id ID da sala
             */
           public function desativar ($id) {
             // Carrega os modelos necessarios
             $this->load->model(array('Sala_model'));

             if ( $this->Sala_model->disable($id) )
                $this->session->set_flashdata('success','Sala desativada com sucesso');
              else
                $this->session->set_flashdata('danger','Não foi possível desativar a sala, tente novamente ou entre em contato com o administrador do sistema.');
               redirect("Sala/cadastro");
           }
		   
			public function ativar ($id) {
			  $this->load->model('Sala_model');

			  if ( $this->Sala_model->able($id) )
				$this->session->set_flashdata('success','Sala ativada com sucesso!');
			  else
				$this->session->set_flashdata('danger','Não foi possível ativar a sala, tente novamente ou entre em contato com o administrador do sistema.');

			  redirect('Sala/cadastro');
			}

           /**
             * Altera os dado da disciplina.
             * @author Jean Brock
             * @since 2017/03/23
             * @param $id ID da sala
             */
           public function atualizar () {
			 $this->load->library('form_validation');
             $this->load->model(array('Sala_model'));

             // Definir as regras de validação para cada campo do formulário.
             $this->form_validation->set_rules('recipient-nSala', 'Numero Sala', array('required', 'max_length[5]','strtoupper'));
             $this->form_validation->set_rules('recipient-capMax', 'Capacidade Maxima', array('required', 'integer', 'greater_than[0]'));
             $this->form_validation->set_rules('recipient-tipo', 'Tipo', array('required','min_length[5]','ucwords'));
            // Definição dos delimitadores
             $this->form_validation->set_error_delimiters('<span class="text-danger">','</span>');

             // Verifica se o formulario é valido
             if ($this->form_validation->run() == FALSE) {

               $this->session->set_flashdata('formDanger','<strong>Não foi possível atualizar os dados da sala:</strong>');

               $dados['salas'] = $this->Sala_model->getAll();
       	       $this->load->view('salas', $dados);

             } else {

               $id = $this->input->post('recipient-id');

               // Pega os dados do formulário
              $sala = array(
                'nSala'        => $this->input->post("recipient-nSala"),
                'capMax'       => $this->input->post('recipient-capMax'),
                'tipo'         => $this->input->post("recipient-tipo")
              );
              if ( $this->Sala_model->update($id, $sala) )
                $this->session->set_flashdata('success', 'Sala atualizada com sucesso');
              else
                $this->session->set_flashdata('danger','Não foi possível atualizar os dados da sala, tente novamente ou entre em contato com o administrador do sistema. <br/> Caso tenha alterado o <b>número da sala</b>, verifique se ele já não foi utilizado!');
               redirect("Sala/cadastro");
             }
           }
         }
       ?>
