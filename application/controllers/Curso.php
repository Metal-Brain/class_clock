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
      $this->form_validation->set_rules('nome', 'nome',array('required', 'min_length[5]','trim','ucwords'));
      $this->form_validation->set_rules('sigla', 'sigla', array('required', 'max_length[5]','alpha', 'is_unique[Curso.sigla]', 'strtoupper'));
      $this->form_validation->set_rules('qtdSemestres','quantidade de semestres', array('required','integer','greater_than[0]','less_than[20]'));
      $this->form_validation->set_rules('periodo[]', 'período', array('required'));
      $this->form_validation->set_rules('grau','grau',array('greater_than[0]'), array('greater_than' => 'Selecione o grau.'));

      //delimitador
      $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

      //condição para o formulario
      if($this->form_validation->run() == FALSE){

        $this->session->set_flashdata('formDanger', '<strong>Não foi possível cadastrar o curso, pois foram encontrados erros no formulário:</strong>');

        $dados['graus']         = convert($this->Grau_model->getAll(), True);
        $dados['periodo']       = convert($this->Periodo_model->getAll());
        $dados['disciplinas']   = convert($this->disciplina_model->getAll(TRUE));
        $dados['cursos']        = $this->Curso_model->getAll();

        $this->load->view('includes/header',$dados);
        $this->load->view('includes/sidebar');
        $this->load->view('cursos/cursos');
        $this->load->view('includes/footer');
        $this->load->view('cursos/js_cursos');

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
          $this->session->set_flashdata('danger','Não foi possível cadastrar o curso, tente novamente ou entre em contato com o administrador do sistema.');
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
      $this->load->helper('dropdown');
      $this->load->model(array('CursoTemDisciplina_model','CursoTemPeriodo_model','Curso_model','Grau_model','Periodo_model','disciplina_model'));

      //Define regras de validação do formulario!!!
      $this->form_validation->set_rules('nomeCurso', 'nome do curso',array('required', 'min_length[5]','ucwords'));
      $this->form_validation->set_rules('cursoSigla', 'sigla do curso', array('required', 'max_length[5]', 'strtoupper'));
      $this->form_validation->set_rules('cursoQtdSemestres','quantidade de semestres', array('required','integer','greater_than[0]','less_than[10]'));
      $this->form_validation->set_rules('cursoPeriodos[]','período',array('required'));
      $this->form_validation->set_rules('cursoGrau','grau',array('greater_than[0]'), array('greater_than' => 'Selecione o grau.'));

      //delimitador
      $this->form_validation->set_error_delimiters('<span class="text-danger">','</span>');

      //condição para o formulario
      if($this->form_validation->run() == FALSE){

        $this->session->set_flashdata('formDanger','<strong>Não foi possível atualizar os dados do curso, pois foram encontrados erros no formulário:</strong>');

        $dados['graus']         = convert($this->Grau_model->getAll(), True);
        $dados['periodo']       = convert($this->Periodo_model->getAll());
        $dados['disciplinas']   = convert($this->disciplina_model->getAll(TRUE));
        $dados['cursos']        = $this->Curso_model->getAll();
        
        $this->load->view('includes/header',$dados);
        $this->load->view('includes/sidebar');
        $this->load->view('cursos/cursos');
        $this->load->view('includes/footer');
        $this->load->view('cursos/js_cursos');
      }else{

        $idCurso = $this->input->post('cursoId');

        $curso = array(
          'nome'          => $this->input->post('nomeCurso'),
          'sigla'         => $this->input->post('cursoSigla'),
          'qtdSemestres'  => $this->input->post('cursoQtdSemestres'),
          'grau'          => $this->input->post('cursoGrau')
        );

        $periodo = $this->input->post('cursoPeriodos[]');
        $disciplinas = $this->input->post('cursoDisciplinas[]');

        if($this->Curso_model->updateCurso($idCurso, $curso)) {
          $this->CursoTemPeriodo_model->delete($idCurso);
          foreach ($periodo as $idPeriodo)
            $this->CursoTemPeriodo_model->insert($idCurso,$idPeriodo);

          $this->CursoTemDisciplina_model->delete($idCurso);
          foreach ($disciplinas as $disciplina)
            $this->CursoTemDisciplina_model->insert($idCurso,$disciplina);

          $this->session->set_flashdata('success','Curso atualizado com sucesso');
        } else {
          $this->session->set_flashdata('danger','Não foi possível atualizar os dados do curso, tente novamente ou entre em contato com o administrador do sistema. <br/> Caso tenha alterado a <b>SIGLA</b>, verifique se ela já não foi utilizada!');
        }

        redirect('Curso');

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

      if ($this->Curso_model->deleteCurso($id))
        $this->session->set_flashdata('success','Curso desativado com sucesso');
      else
        $this->session->set_flashdata('danger','Não foi possível desativar o curso, tente novamente mais tarde ou entre em contato com o administrador do sistema.');

      redirect('Curso');
    }

	   public function ativar ($id) {
      $this->load->model('Curso_model');

      if ( $this->Curso_model->able($id) )
        $this->session->set_flashdata('success','Curso ativado com sucesso');
      else
        $this->session->set_flashdata('danger','Não foi possível ativar o Curso, tente novamente ou entre em contato com o administrador do sistema.');

      redirect('Curso');
    }

    /**
      * Busca todas as disciplinas relacionadas ao curso informado
      * @author Caio de Freitas
      * @since 2017/03/31
      * @param INT $id - ID do curso
      */
    public function disciplinas ($id) {
      $this->load->model('CursoTemDisciplina_model');
      $disciplinas = $this->CursoTemDisciplina_model->getAllDisciplinas($id);

      echo json_encode($disciplinas);
    }

  }

?>
