<?php
  /**
    * Essa classe contem todos as função de Curso
    * @author Caio de Freitas
    * @since 2017/03/20
    */
class Curso extends CI_Controller {

  function index () {
      
    $cursos = Curso_model::all();

    $this->load->template('cursos/cursos',compact('cursos'));
  }
    
    /**
      * Essa função irá cadastrar o Curso desejado
      * Se os dados estiverem corretos, será enviado para modelo
      * e cadastrado no banco.
      * @author Felipe Ribeiro da Silva
      * @since 2017/03/21
    */
    public function cadastrar () {
      if (verificaSessao() && verificaNivelPagina(array(1,3))) {
        //Carregar as bibliotecas de validação
        $this->load->library('form_validation');
        $this->load->helper(array('form','dropdown'));
        $this->load->model(array(
          'Curso_model',
          'CursoTemPeriodo_model',
          'CursoTemDisciplina_model',
          'Grau_model',
          'Periodo_model',
          'disciplina_model',
          'Professor_model'
        ));
        //Define regras de validação do formulario!!!
        $this->form_validation->set_rules('nome', 'nome',array('required', 'min_length[5]','is_unique[Curso.nome]','trim','ucwords'));
        $this->form_validation->set_rules('sigla', 'sigla', array('required', 'max_length[5]','alpha', 'is_unique[Curso.sigla]', 'strtoupper'));
        $this->form_validation->set_rules('qtdSemestres','quantidade de semestres', array('required','integer','greater_than[0]','less_than[20]'));
        $this->form_validation->set_rules('periodo[]', 'período', array('required'));
        $this->form_validation->set_rules('grau','grau', array('greater_than[0]'), array('greater_than' => 'Selecione o grau.'));
        $this->form_validation->set_rules('disciplinas[]', 'disciplinas', array('required'), array('required' => 'Não é possível cadastrar um curso sem selecionar as disciplinas.'));
        $this->form_validation->set_rules('coordenadorCurso','coordenador',array('greater_than[0]'),array('greater_than'=>'Selecione um professor coordenador'));
        //delimitador
        $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');
        //condição para o formulario
        if($this->form_validation->run() == FALSE){
          $this->session->set_flashdata('formDanger','<strong>Não foi possível cadastrar o curso, pois existe(m) erro(s) no formulário:</strong>');
          $dados['graus']         = convert($this->Grau_model->getAll(), True);
          $dados['periodo']       = convert($this->Periodo_model->getAll());
          $dados['disciplinas']   = convert($this->disciplina_model->getAll(TRUE));
          $dados['cursos']        = $this->Curso_model->getAll();
          $dados['professores']   = convert($this->Professor_model->getAll(),True);
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

          $idProfessor = $this->input->post('coordenadorCurso');

          $disciplinas = $this->input->post('disciplinas[]');
          $periodo = $this->input->post('periodo[]');
          if ($this->Curso_model->insert($curso)) {
            $idCurso = $this->db->insert_id(); // Pega o ID do Curso cadastrado
            foreach ($periodo as $idPeriodo)
              $this->CursoTemPeriodo_model->insert($idCurso,$idPeriodo);
            foreach ($disciplinas as $idDisciplina)
              $this->CursoTemDisciplina_model->insert($idCurso,$idDisciplina);

            // relaciona o professor coordenador ao curso
            $this->Professor_model->setCoordenador($idProfessor,$idCurso);

            $this->session->set_flashdata('success','Curso cadastrado com sucesso');
          } else {
            $this->session->set_flashdata('danger','Não foi possível cadastrar o curso, tente novamente ou entre em contato com o administrador do sistema.');
          }
          redirect('Curso/cadastrar');
        }
      } else {
        redirect('/');
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
      if (verificaSessao() && verificaNivelPagina(array(1))) {
        $this->load->library('form_validation');
        $this->load->helper('dropdown');
        $this->load->model(array('CursoTemDisciplina_model','CursoTemPeriodo_model','Curso_model','Grau_model','Periodo_model','disciplina_model','Professor_model','CoordenadorDe_model'));
        //Define regras de validação do formulario!!!
        $this->form_validation->set_rules('nomeCurso', 'nome do curso',array('required', 'min_length[5]','ucwords'));
        $this->form_validation->set_rules('cursoSigla', 'sigla do curso', array('required', 'max_length[5]', 'strtoupper'));
        $this->form_validation->set_rules('cursoQtdSemestres','quantidade de semestres', array('required','integer','greater_than[0]','less_than[20]'));
        $this->form_validation->set_rules('cursoPeriodos[]','período',array('required'));
        $this->form_validation->set_rules('cursoGrau','grau', array('greater_than[0]'), array('greater_than' => 'Selecione o grau.'));
        $this->form_validation->set_rules('cursoDisciplinas[]', 'disciplinas', array('required'), array('required' => 'Não é possível atualizar um curso sem selecionar as disciplinas.'));
        $this->form_validation->set_rules('cursoCoordenador','coordenador',array('greater_than[0]'),array('greater_than'=>'Selecione um professor coordenador'));
        //delimitador
        $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');
        //condição para o formulario
        if($this->form_validation->run() == FALSE){
          $this->session->set_flashdata('formDanger','<strong>Não foi possível atualizar os dados do curso:</strong>');
          $dados['graus']         = convert($this->Grau_model->getAll(), True);
          $dados['periodo']       = convert($this->Periodo_model->getAll());
          $dados['disciplinas']   = convert($this->disciplina_model->getAll(TRUE));
          $dados['cursos']        = $this->Curso_model->getAll();
          $dados['professores']   = convert($this->Professor_model->getAll(),True);
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
          $coordenador = $this->input->post('cursoCoordenador');

          // echo '<pre>';
 				 //      print_r($coordenador);
 				 //  echo '</pre>';
          // exit();


          if($this->Curso_model->updateCurso($idCurso, $curso)) {
            $this->CursoTemPeriodo_model->delete($idCurso);
            foreach ($periodo as $idPeriodo)
              $this->CursoTemPeriodo_model->insert($idCurso,$idPeriodo);
            $this->CursoTemDisciplina_model->delete($idCurso);
            foreach ($disciplinas as $disciplina)
              $this->CursoTemDisciplina_model->insert($idCurso,$disciplina);

            // Retira os coordenados desse coordenador
            $professor = $this->Professor_model->getCoordenadorCurso($idCurso);
            if ($professor[0]['id'] != $coordenador)
              $this->CoordenadorDe_model->delete($professor[0]['id']);

            // Retira o coordenador atural
            $this->Professor_model->setCoordenador(null,$idCurso,FALSE);

            // Seta o novo coordenador
            $this->Professor_model->setCoordenador($coordenador,$idCurso,TRUE);

            // TODO: Terminar a alteração de coordenador do curso. Falta apenas alterar a relação de coordenadorDe

            $this->session->set_flashdata('success','Curso atualizado com sucesso');
          } else {
            $this->session->set_flashdata('danger','Não foi possível atualizar os dados do curso, tente novamente ou entre em contato com o administrador do sistema. <br/> Caso tenha alterado a <b>sigla</b> e/ou <b>nome</b>, verifique se ela já não foi utilizada.');
          }
          redirect('Curso');
        }
      }else{
        redirect('/');
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
      if (verificaSessao() && verificaNivelPagina(array(1))) {
        $this->load->model(array('Curso_model'));
        if ($this->Curso_model->deleteCurso($id))
          $this->session->set_flashdata('success','Curso desativado com sucesso');
        else
          $this->session->set_flashdata('danger','Não foi possível desativar o curso, tente novamente mais tarde ou entre em contato com o administrador do sistema.');
        redirect('Curso');
      }else{
          redirect('/');
      }
    }
	   public function ativar ($id) {
       if (verificaSessao() && verificaNivelPagina(array(1))){
         $this->load->model('Curso_model');
         if ( $this->Curso_model->able($id) )
           $this->session->set_flashdata('success','Curso ativado com sucesso');
         else
           $this->session->set_flashdata('danger','Não foi possível ativar o Curso, tente novamente ou entre em contato com o administrador do sistema.');
         redirect('Curso');
       }else{
           redirect('/');
       }
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

	public function periodos ($id) {
      $this->load->model('CursoTemPeriodo_model');
      $periodos = $this->CursoTemPeriodo_model->getAllPeriodos($id);
      echo json_encode($periodos);
    }

	public function verificaNome(){
      $validate_data = array('nome' => $this->input->get('nome'));
      $this->form_validation->set_data($validate_data);
      $this->form_validation->set_rules('nome', 'nome', 'is_unique[Curso.nome]');

      if($this->form_validation->run() == FALSE){
        echo "false";
      }else{
        echo "true";
      }
    }

    public function verificaSigla(){
      $validate_data = array('sigla' => $this->input->get('sigla'));
      $this->form_validation->set_data($validate_data);
      $this->form_validation->set_rules('sigla', 'sigla', 'is_unique[Curso.sigla]');

      if($this->form_validation->run() == FALSE){
        echo "false";
      }else{
        echo "true";
      }
    }
  }
?>
