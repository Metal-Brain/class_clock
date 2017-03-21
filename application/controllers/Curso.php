<?php defined('BASEPATH') OR exit('No direct script access allowed');

  /**
    * Essa classe contem todos as função de Curso
    * @author Caio de Freitas
    * @since 2017/03/20
    */
  class Curso extends CI_Controller {

    public function cadastrar () {
      //Carregar as bibliotecas de validação
      $this->load->library('form_validation');
      $this->load->helper(array('form'));
      $this->load->model(array('Curso_model'));

      //Define regras de validação do formulario!!!
      $this->form_validation->set_rules('nomeCurso', 'nome do curso',array('required', 'min_lenth[5]','ucwords'));
      $this->form_validation->set_rules('siglaCurso', 'sigla do curso', array('required', 'exact_length[3]', 'strtoupper'));

      //Adicionar validação ao curso
      $this->form_validation->set_rules('qtdSemestres','quantidade de semestres', array('required','integer','greater_than[0]'));

      //delimitador
      $this->form_validation->set_error_delimiters('<span class="error">','</span>');

      //condição para o formulario
      if($this->form_validation->run() == FALSE){

      }else{

        $curso = array(
          'nomeCurso'     => $this->input->post('nomeCurso'),
          'siglaCurso'    => $this->input->post('siglaCurso'),
          'qtdSemestres'  => $this->input->post('qtdSemestres')
        );
      }

    }

    /**
    *@author Felipe Ribeiro da Silva
    *@since 2017/03/21
    *@param Int $idCurso - ID do Curso
    *@return Função que irá atualizar os dados do usuario!
    */
    public function atualizar () {

      $this->load->library('form_validation');
      $this->load->model(array('Curso_model'));

      //Define regras de validação do formulario!!!
      $this->form_validation->set_rules('nomeCurso', 'nome do curso',array('required', 'min_lenth[5]','ucwords'));
      $this->form_validation->set_rules('siglaCurso', 'sigla do curso', array('required', 'exact_length[3]', 'strtoupper'));

      //Adicionar validação ao curso
      $this->form_validation->set_rules('qtdSemestres','quantidade de semestres', array('required','integer','greater_than[0]'));

      //delimitador
      $this->form_validation->set_error_delimiters('<span class="error">','</span>');

      //condição para o formulario
      if($this->form_validation->run() == FALSE){

      }else{

        $curso = array(
          'nomeCurso'     => $this->input->post('nomeCurso'),
          'siglaCurso'    => $this->input->post('siglaCurso'),
          'qtdSemestres'  => $this->input->post('qtdSemestres')
        );
      }

    }

    /**
    *@author Felipe Ribeiro da Silva
    *@since 2017/03/21
    *@param Int $idCurso - ID do Curso
    *@return Função para deletar Curso através do id!
    */
    public function deletar ($id) {

      $this->load->model(array('Curso_model'));

      $this->Curso_model->deleteCurso($id);
    }

  }

?>
