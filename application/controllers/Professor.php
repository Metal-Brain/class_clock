<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *  Essa classe é responsavel por todas regras de negócio sobre professores.
 *  @since 2017/04/03
 *  @author Yasmin Sayad
 */
class Professor extends CI_Controller {

	public function index () {
      if (verificaSessao() && verificaNivelPagina(array(1)))
        $this->cadastrar();
      else
        redirect('/');
	}

    // =========================================================================
    // ==========================CRUD de professores============================
    // =========================================================================

    /**
     * Valida os dados do forumulário de cadastro de professores.
     * Caso o formulario esteja valido, envia os dados para o modelo realizar
     * a persistencia dos dados.
     * @author Yasmin Sayad
     * @since 2017/04/03
     */
    public function cadastrar() {
      if (verificaSessao() && verificaNivelPagina(array(1))){
        // Carrega a biblioteca para validação dos dados.
        $this->load->library(array('form_validation','My_PHPMailer'));
        $this->load->helper(array('form','dropdown','date','password'));
        $this->load->model(array(
          'Professor_model',
          'Disciplina_model',
          'Competencia_model',
          'Nivel_model',
          'Contrato_model',
          'Usuario_model'
        ));

        // Definir as regras de validação para cada campo do formulário.
        $this->form_validation->set_rules('nome', 'nome do professor', array('required','min_length[5]','max_length[255]','ucwords'));
        $this->form_validation->set_rules('matricula', 'matrícula', array('required','exact_length[8]','is_unique[Usuario.matricula]','strtoupper'));
        $this->form_validation->set_rules('nascimento', 'data de nascimento', array('callback_date_check'));
        $this->form_validation->set_rules('email','email',array('required','valid_email','is_unique[Usuario.email]'));
        $this->form_validation->set_rules('nivel', 'nivel', array('greater_than[0]'),array('greater_than'=>'Selecione o nivel acadêmico'));
        $this->form_validation->set_rules('contrato','contrato',array('greater_than[0]'),array('greater_than'=>'Selecione um contrato'));

        // Definição dos delimitadores
        $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

        // Verifica se o formulario é valido
        if ($this->form_validation->run() == FALSE) {

          $this->session->set_flashdata('formDanger','<strong>Não foi possível cadastrar o professor, pois existe(m) erro(s) no formulário:</strong>');

          $dados['contrato']        = convert($this->Contrato_model->getAll(), TRUE);
          $dados['nivel']           = convert($this->Nivel_model->getAll(), TRUE);
          $dados['disciplinas']     = convert($this->Disciplina_model->getAll(TRUE));
          $dados['professores']     = $this->Professor_model->getAll();

          $this->load->view('includes/header', $dados);
          $this->load->view('includes/sidebar');
          $this->load->view('professores/professores');
		  $this->load->view('includes/footer');
		  $this->load->view('professores/js_professores');

        } else {

          // Gera uma senha para o usuário
          $senha = gerate(10);

          // Pega os dados do formulário
          $professor = array(
            'nome'            => $this->input->post("nome"),
            'matricula'       => $this->input->post('matricula'),
            'nascimento'      => brToSql($this->input->post("nascimento")),
            'email'           => $this->input->post('email'),
            'senhaLimpa'      => $senha,
            'senha'           => hash('sha256',$senha),
            'coordenador'     => ($this->input->post("coordenador") == null) ? 0 : 1,
            'idContrato'      => $this->input->post("contrato"),
            'idNivel'         => $this->input->post("nivel"),
            'disciplinas'     => $this->input->post('disciplinas[]')
          );

          $content = $this->load->view('email/novo',array('professor'=>$professor),TRUE);

          $mail = new PHPMailer();
          $mail->CharSet = 'UTF-8';
          $mail->isSMTP();
          $mail->Host = 'smtp.gmail.com';
          $mail->Port = 587;
          $mail->SMTPSecure = 'tls';
          $mail->SMTPAuth = true;
          $mail->Username = "metalcodeifsp@gmail.com";
          $mail->Password = "#metalcode2017#";
          $mail->setFrom('metalcodeifsp@gmail.com', 'Suporte Metalcode');
          $mail->addAddress($professor['email'], $professor['nome']);
          $mail->Subject = 'Novo usuário';
          $mail->msgHTML($content);

          $mail->send();

          if ($this->Usuario_model->insert($professor)) {
            $idUsuario = $this->db->insert_id(); // Pega o ID do Professor cadastrado

            $this->Professor_model->insert($idUsuario, $professor);

            foreach ($professor['disciplinas'] as $idDisciplina)
              $this->Competencia_model->insert($idUsuario,$idDisciplina);

            $this->session->set_flashdata('success','Professor cadastrado com sucesso');
          } else {
            $this->session->set_flashdata('danger','Não foi possivel cadastrar o professor, tente novamente ou entre em contato com o administrador do sistema');
          }

          redirect('Professor/cadastrar');

        }
      }else{
        redirect('/');
      }
    }

    /**
      * Valida a data no padrão BR
      * @author Caio de Freitas
      * @since 2017/04/05
      * @param Data
      * @return Retorna um boolean true caso a data sejá valida.
      */
    public function date_check ($date) {

      if ($date == null) {
        $this->form_validation->set_message('date_check','Informe a data de nascimento.');
        return FALSE;
      }

      $d = explode('/',$date);
      if (!checkdate($d[1],$d[0],$d[2])) {
        $this->form_validation->set_message('date_check','Informe uma data válida.');
        return FALSE;
      } else {
        return TRUE;
      }
    }

    /**
      * Deleta um professor.
      * @author Yasmin Sayad
      * @since  2017/04/03
      * @param $id ID do professor
      */
    public function desativar ($id) {
      if (verificaSessao() && verificaNivelPagina(array(1))){
        // Carrega os modelos necessarios
        $this->load->model(array('Professor_model'));

        if ( $this->Professor_model->disable($id) )
          $this->session->set_flashdata('success','Professor desativado com sucesso');
        else
          $this->session->set_flashdata('danger','Não foi possível desativar o professor, tente novamente ou entre em contato com o administrador do sistema.');

        redirect('Professor');
      }else{
        redirect('/');
      }

        redirect('Professor');
    }

    public function ativar ($id) {
      if (verificaSessao() && verificaNivelPagina(array(1))){
        $this->load->model('Professor_model');

        if ( $this->Professor_model->able($id) )
          $this->session->set_flashdata('success','Professor ativado com sucesso!');
        else
          $this->session->set_flashdata('danger','Não foi possível ativar o professor, tente novamente ou entre em contato com o administrador do sistema.');

        redirect('Professor');
      }else{
        redirect('/');
      }
    }

    /**
      * Altera os dado do professor.
      * @author Yasmin Sayad
      * @since 2017/04/03
      * @param $id ID do professor
      */
    public function atualizar () {
      if (verificaSessao() && verificaNivelPagina(array(1))){
        // Carrega a biblioteca para validação dos dados.
        $this->load->library(array('form_validation'));
        $this->load->helper(array('form', 'dropdown', 'date'));
        $this->load->model(array(
          'Usuario_model',
          'Professor_model',
          'Disciplina_model',
          'Competencia_model',
          'Nivel_model',
          'Contrato_model'
        ));

        // Definir as regras de validação para cada campo do formulário.
        $this->form_validation->set_rules('recipient-nome', 'nome do professor', array('required','min_length[5]','max_length[255]','ucwords'));
        $this->form_validation->set_rules('recipient-matricula', 'matrícula', array('required','exact_length[8]','strtoupper'));
        $this->form_validation->set_rules('recipient-nascimento', 'data de nascimento', array('callback_date_check'));
        $this->form_validation->set_rules('recipient-email','email',array('required','valid_email'));
        $this->form_validation->set_rules('recipient-nivelAcademico', 'nivel', array('greater_than[0]'),array('greater_than'=>'Selecione o nivel acadêmico'));
        $this->form_validation->set_rules('recipient-contrato','contrato',array('greater_than[0]'),array('greater_than'=>'Selecione um contrato'));
        // Definição dos delimitadores
        $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

        // Verifica se o formulario é valido
        if ($this->form_validation->run() == FALSE) {

          $this->session->set_flashdata('formDanger','<strong>Não foi possível cadastrar o professor, pois existe(m) erro(s) no formulário:</strong>');

          $dados['contrato']        = convert($this->Contrato_model->getAll(), TRUE);
          $dados['nivel']           = convert($this->Nivel_model->getAll(), TRUE);
          $dados['disciplinas']     = convert($this->Disciplina_model->getAll(TRUE));
          $dados['professores']     = $this->Professor_model->getAll();

          $this->load->view('includes/header', $dados);
          $this->load->view('includes/sidebar');
          $this->load->view('professores/professores');
		  $this->load->view('includes/footer');
		  $this->load->view('professores/js_professores');

            $dados['contrato'] = convert($this->Contrato_model->getAll(), TRUE);
            $dados['nivel'] = convert($this->Nivel_model->getAll(), TRUE);
            $dados['disciplinas'] = convert($this->Disciplina_model->getAll(TRUE));
            $dados['professores'] = $this->Professor_model->getAll();
            $this->load->view('professores/professores',$dados);
        } else {

            $id = $this->input->post('recipient-id');

          // Pega os dados do formulário
          $professor = array(
            'nome'            => $this->input->post("recipient-nome"),
            'matricula'       => $this->input->post('recipient-matricula'),
            'nascimento'      => brToSql($this->input->post("recipient-nascimento")),
            'email'           => $this->input->post('recipient-email'),
            'coordenador'     => ($this->input->post("recipient-coordenador") == null) ? 0 : 1,
            'idContrato'      => $this->input->post("recipient-contrato"),
            'idNivel'         => $this->input->post("recipient-nivelAcademico"),
            'disciplinas'     => $this->input->post('professorDisciplinas[]')
          );

          if ($this->Usuario_model->update($id, $professor)) {

            $this->Professor_model->update($id, $professor);

            $this->Competencia_model->delete($id);
            foreach ($professor['disciplinas'] as $idDisciplina)
              $this->Competencia_model->insert($id,$idDisciplina);

            $this->session->set_flashdata('success','Dados atualizados com sucesso');
          } else {
            $this->session->set_flashdata('danger','Não foi possivel atualizar os dados do professor, tente novamente ou entre em contato com o administrador do sistema. Caso tenha <strong>alterado a matrícula</strong> verifique se a mesma já está existe.');
          }

          redirect('Professor/atualizar');
        }
      }else{
        redirect('/');
      }

    }

    /**
     * Busca as disciplinas vinculada ao professor.
     * @author Caio de Freitas
     * @since 2017/04/07
     * @param INT $id - ID do professor
     */
    public function disciplinas($id) {
        $this->load->model(array('Competencia_model'));
        $disciplinas = $this->Competencia_model->getAllDisciplinas($id);

        echo json_encode($disciplinas);
    }

}

?>
