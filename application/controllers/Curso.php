<?php defined('BASEPATH') OR exit('No direct script access allowed');

  /**
    * Essa classe contem todos as função de Curso
    * @author Caio de Freitas
    * @since 2017/03/20
    */
  class Curso extends CI_Controller {

    public function index () {
      $this->cadastrar();
    }

    /**
      * Essa função irá cadastrar o Curso desejado
      * Se os dados estiverem corretos, será enviado para modelo
      * e cadastrado no banco.
      * @author Felipe Ribeiro da Silva
      * @since 2017/03/21
    */
    public function cadastrar () {
      //Carregar as bibliotecas de validação
      $this->load->library('form_validation');
      $this->load->helper(array('form','dropdown'));
      $this->load->model(array(
        'Curso_model',
        'CursoTemPeriodo_model',
        'CursoTemDisciplina_model',
        'Grau_model',
        'Periodo_model',
        'disciplina_model'
      ));

      //Define regras de validação do formulario!!!
      $this->form_validation->set_rules('nome', 'nome do curso',array('required', 'min_length[5]','trim','ucwords'));
      $this->form_validation->set_rules('sigla', 'sigla do curso', array('required', 'max_length[5]','alpha', 'strtoupper'));
      $this->form_validation->set_rules('qtdSemestres','quantidade de semestres', array('required','integer','greater_than[0]','less_than[20]'));
      $this->form_validation->set_rules('periodo[]', 'periodo', array('required'));
      $this->form_validation->set_rules('grau','grau',array('greater_than[0]'));

      //delimitador
      $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

      //condição para o formulario
      if($this->form_validation->run() == FALSE){

        $dados['graus']         = convert($this->Grau_model->getAll(), True);
        $dados['periodo']       = convert($this->Periodo_model->getAll());
        $dados['disciplinas']   = convert($this->disciplina_model->getAll());
        $dados['cursos']        = $this->Curso_model->getAll();

        $this->load->view('cursos',$dados);

      }else{

        $curso = array(
          'nome'          => $this->input->post('nome'),
          'sigla'         => $this->input->post('sigla'),
          'qtdSemestres'  => $this->input->post('qtdSemestres'),
          'grau'          => $this->input->post('grau'),
        );

        $disciplinas = $this->input->post('disciplinas[]');
        $periodo = $this->input->post('periodo[]');


        if ($this->Curso_model->insert($curso)) {
          $idCurso = $this->db->insert_id(); // Pega o ID do Curso cadastrado
          foreach ($periodo as $idPeriodo)
            $this->CursoTemPeriodo_model->insert($idCurso,$idPeriodo);

          foreach ($disciplinas as $idDisciplina)
            $this->CursoTemDisciplina_model->insert($idCurso,$idDisciplina);

          $this->session->set_flashdata('success','Curso cadastrado com sucesso');
        } else {
          $this->session->set_flashdata('danger','Não foi possivel cadastrar o curso, tente novamente ou entre em contato com o administrador do sistema');
        }

        redirect('Curso/cadastrar');
      }

    }

    /**
      * Essa função irá atualizar os dados do usuario.
      * Se esses dados estiverem validos, Envia os dados para modelo.
      * e ira altera-los.
      * @author Felipe Ribeiro da Silva
      * @since 2017/03/21
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
      * Essa função irá procurar o id do Curso
      * e irá alterar a propriedade dele para True ou False,
      * assim não exclindo do banco.
      * @author Felipe Ribeiro da Silva
      * @since 2017/03/21
    */
    public function deletar ($id) {

      $this->load->model(array('Curso_model'));

      $this->Curso_model->deleteCurso($id);
    }

  }

?>
