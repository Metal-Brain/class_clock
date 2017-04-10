<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *  Essa classe é responsavel por todas regras de negócio sobre professores.
 *  @since 2017/04/03
 *  @author Yasmin Sayad
 */
class Professor extends CI_Controller {

    public function index() {
        $this->cadastrar();
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
        // Carrega a biblioteca para validação dos dados.
        $this->load->library(array('form_validation'));
        $this->load->helper(array('form', 'dropdown', 'date'));
        $this->load->model(array(
            'Professor_model',
            'Disciplina_model',
            'Competencia_model',
            'Nivel_model',
            'Contrato_model'
        ));

        // Definir as regras de validação para cada campo do formulário.
        $this->form_validation->set_rules('nome', 'nome do professor', array('required', 'min_length[5]', 'max_length[255]', 'ucwords'));
        $this->form_validation->set_rules('matricula', 'matrícula', array('required', 'exact_length[7]', 'numeric', 'is_unique[Professor.matricula]', 'strtoupper'));
        $this->form_validation->set_rules('nascimento', 'data de nascimento', array('callback_date_check'));
        $this->form_validation->set_rules('disciplinas[]', 'disciplinas', array('required'));
        $this->form_validation->set_rules('nivel', 'nivel', array('greater_than[0]'), array('greater_than' => 'Selecione o nivel acadêmico'));
        $this->form_validation->set_rules('contrato', 'contrato', array('greater_than[0]'), array('greater_than' => 'Selecione um contrato.'));

        // Definição dos delimitadores
        $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

        // Verifica se o formulario é valido
        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('formDanger', '<strong>Não foi possível cadastrar o professor, pois existe(m) erro(s) no formulário:</strong>');

            $dados['contrato'] = convert($this->Contrato_model->getAll(), TRUE);
            $dados['nivel'] = convert($this->Nivel_model->getAll(), TRUE);
            $dados['disciplinas'] = convert($this->Disciplina_model->getAll(TRUE));
            $dados['professores'] = $this->Professor_model->getAll();

            $this->load->view('includes/header', $dados);
            $this->load->view('includes/sidebar');
            $this->load->view('professores/professores');
            $this->load->view('includes/footer');
            $this->load->view('professores/js_professores');
        } else {

            // Pega os dados do formulário
            $professor = array(
                'nome' => $this->input->post("nome"),
                'matricula' => $this->input->post('matricula'),
                'nascimento' => brToSql($this->input->post("nascimento")),
                'coordenador' => ($this->input->post("coordenador") == null) ? 0 : 1,
                'idContrato' => $this->input->post("contrato"),
                'idNivel' => $this->input->post("nivel")
            );

            $disciplinas = $this->input->post('disciplinas[]');

            if ($this->Professor_model->insert($professor)) {
                $idProfessor = $this->db->insert_id(); // Pega o ID do Professor cadastrado

                foreach ($disciplinas as $idDisciplina)
                    $this->Competencia_model->insert($idProfessor, $idDisciplina);

                $this->session->set_flashdata('success', 'Professor cadastrado com sucesso');
            } else {
                $this->session->set_flashdata('danger', 'Não foi possivel cadastrar o professor, tente novamente ou entre em contato com o administrador do sistema');
            }

            redirect('Professor/cadastrar');
        }
    }

    /**
     * Valida a data no padrão BR
     * @author Caio de Freitas
     * @since 2017/04/05
     * @param Data
     * @return Retorna um boolean true caso a data sejá valida.
     */
    public function date_check($date) {

        if ($date == null) {
            $this->form_validation->set_message('date_check', 'Informe uma data');
            return FALSE;
        }

        $d = explode('/', $date);
        if (!checkdate($d[1], $d[0], $d[2])) {
            $this->form_validation->set_message('date_check', 'Informe uma data válida.');
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
    public function desativar($id) {
        // Carrega os modelos necessarios
        $this->load->model(array('Professor_model'));

        if ($this->Professor_model->disable($id))
            $this->session->set_flashdata('success', 'Professor desativado com sucesso');
        else
            $this->session->set_flashdata('danger', 'Não foi possível desativar o professor, tente novamente ou entre em contato com o administrador do sistema.');

        redirect('Professor');
    }

    public function ativar($id) {
        $this->load->model('Professor_model');

        if ($this->Professor_model->able($id))
            $this->session->set_flashdata('success', 'Professor ativado com sucesso!');
        else
            $this->session->set_flashdata('danger', 'Não foi possível ativar o professor, tente novamente ou entre em contato com o administrador do sistema.');

        redirect('Professor');
    }

    /**
     * Altera os dado do professor.
     * @author Yasmin Sayad
     * @since 2017/04/03
     * @param $id ID do professor
     */
    public function atualizar() {

        // Carrega a biblioteca para validação dos dados.
        $this->load->library(array('form_validation'));
        $this->load->helper(array('form', 'dropdown', 'date'));
        $this->load->model(array(
            'Professor_model',
            'Disciplina_model',
            'Competencia_model',
            'Nivel_model',
            'Contrato_model'
        ));

        // Definir as regras de validação para cada campo do formulário.
        $this->form_validation->set_rules('recipient-nome', 'nome do professor', array('required', 'min_length[5]', 'max_length[255]', 'ucwords'));
        $this->form_validation->set_rules('recipient-matricula', 'matrícula', array('required', 'exact_length[7]', 'numeric', 'strtoupper'));
        $this->form_validation->set_rules('recipient-nascimento', 'data de nascimento', array('callback_date_check'));
        $this->form_validation->set_rules('professorDisciplinas[]', 'disciplinas', array('required'));
        $this->form_validation->set_rules('recipient-nivelAcademico', 'nivel', array('greater_than[0]'), array('greater_than' => 'Selecione o nivel acadêmico'));
        $this->form_validation->set_rules('recipient-contrato', 'contrato', array('greater_than[0]'), array('greater_than' => 'Selecione um contrato'));
        // Definição dos delimitadores
        $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

        // Verifica se o formulario é valido
        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('formDanger', '<strong>Não foi possível cadastrar o professor, pois existe(m) erro(s) no formulário:</strong>');

            $dados['contrato'] = convert($this->Contrato_model->getAll(), TRUE);
            $dados['nivel'] = convert($this->Nivel_model->getAll(), TRUE);
            $dados['disciplinas'] = convert($this->Disciplina_model->getAll(TRUE));
            $dados['professores'] = $this->Professor_model->getAll();
            $this->load->view('professores/professores',$dados);
        } else {

            $id = $this->input->post('recipient-id');

            // Pega os dados do formulário
            $professor = array(
                'nome' => $this->input->post("recipient-nome"),
                'matricula' => $this->input->post('recipient-matricula'),
                'nascimento' => brToSql($this->input->post("recipient-nascimento")),
                'coordenador' => ($this->input->post("recipient-coordenador") == null) ? 0 : 1,
                'idContrato' => $this->input->post("recipient-contrato"),
                'idNivel' => $this->input->post("recipient-nivelAcademico"),
            );

            $disciplinas = $this->input->post('professorDisciplinas[]');

            if ($this->Professor_model->update($id, $professor)) {
                $this->Competencia_model->delete($id);
                foreach ($disciplinas as $idDisciplina)
                    $this->Competencia_model->insert($id, $idDisciplina);

                $this->session->set_flashdata('success', 'Dados atualizados com sucesso');
            } else {
                $this->session->set_flashdata('danger', 'Não foi possivel atualizar os dados do professor, tente novamente ou entre em contato com o administrador do sistema. Caso tenha <strong>alterado a matrícula</strong> verifique se já não esteja em uso.');
            }

            redirect('Professor/atualizar');
        }
    }

<?php defined('BASEPATH') OR exit('No direct script access allowed');
  /**
   *  Essa classe é responsavel por todas regras de negócio sobre professores.
   *  @since 2017/04/03
   *  @author Yasmin Sayad
   */
  class Professor extends CI_Controller {
    public function index () {
      $this->cadastrar();
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
      // Carrega a biblioteca para validação dos dados.
      $this->load->library(array('form_validation'));
      $this->load->helper(array('form','dropdown','date'));
      $this->load->model(array(
        'Professor_model',
        'Disciplina_model',
        'Competencia_model',
        'Nivel_model',
        'Contrato_model'
      ));
      // Definir as regras de validação para cada campo do formulário.
      $this->form_validation->set_rules('nome', 'nome do professor', array('required','min_length[5]','max_length[255]','ucwords'));
      $this->form_validation->set_rules('matricula', 'matrícula', array('required','exact_length[7]', 'numeric','is_unique[Professor.matricula]','strtoupper'));
      $this->form_validation->set_rules('nascimento', 'data de nascimento', array('callback_date_check'));
      $this->form_validation->set_rules('disciplinas[]', 'disciplinas', array('required'));
      $this->form_validation->set_rules('nivel', 'nivel', array('greater_than[0]'),array('greater_than'=>'Selecione o nivel acadêmico'));
      $this->form_validation->set_rules('contrato','contrato',array('greater_than[0]'),array('greater_than'=>'Selecione um contrato'));
      // Definição dos delimitadores
      $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');
      // Verifica se o formulario é valido
      if ($this->form_validation->run() == FALSE) {
        $this->session->set_flashdata('formDanger','<strong>Não foi possível cadastrar o professor, pois existe(m) erro(s) no formulário:</strong>');
        $dados['contrato']        = convert($this->Contrato_model->getAll(), TRUE);
        $dados['nivel']           = convert($this->Nivel_model->getAll(), TRUE);
        $dados['disciplinas']     = convert($this->Disciplina_model->getAll());
        $dados['professores']     = $this->Professor_model->getAll();
	      $this->load->view('professores', $dados);
      } else {
        // Pega os dados do formulário
        $professor = array(
          'nome'            => $this->input->post("nome"),
          'matricula'       => $this->input->post('matricula'),
          'nascimento'      => brToSql($this->input->post("nascimento")),
          'coordenador'     => ($this->input->post("coordenador") == null) ? 0 : 1,
          'idContrato'      => $this->input->post("contrato"),
          'idNivel'         => $this->input->post("nivel")
        );
        $disciplinas = $this->input->post('disciplinas[]');
        if ($this->Professor_model->insert($professor)) {
          $idProfessor = $this->db->insert_id(); // Pega o ID do Professor cadastrado
          foreach ($disciplinas as $idDisciplina)
            $this->Competencia_model->insert($idProfessor,$idDisciplina);
          $this->session->set_flashdata('success','Professor cadastrado com sucesso');
        } else {
          $this->session->set_flashdata('danger','Não foi possivel cadastrar o professor, tente novamente ou entre em contato com o administrador do sistema');
        }
        redirect('Professor/cadastrar');
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
        $this->form_validation->set_message('date_check','Informe uma data');
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
      // Carrega os modelos necessarios
      $this->load->model(array('Professor_model'));
      if ( $this->Professor_model->disable($id) )
        $this->session->set_flashdata('success','Professor desativado com sucesso');
      else
        $this->session->set_flashdata('danger','Não foi possível desativar o professor, tente novamente ou entre em contato com o administrador do sistema.');
      redirect('Professor');
    }
    public function ativar ($id) {
      $this->load->model('Professor_model');
      if ( $this->Professor_model->able($id) )
        $this->session->set_flashdata('success','Professor ativado com sucesso!');
      else
        $this->session->set_flashdata('danger','Não foi possível ativar o professor, tente novamente ou entre em contato com o administrador do sistema.');
      redirect('Professor');
    }
    /**
      * Altera os dado do professor.
      * @author Yasmin Sayad
      * @since 2017/04/03
      * @param $id ID do professor
      */
    public function atualizar () {
        // Carrega a biblioteca para validação dos dados.
        $this->load->library(array('form_validation'));
        $this->load->helper(array('form','dropdown','date'));
        $this->load->model(array(
          'Professor_model',
          'Disciplina_model',
          'Competencia_model',
          'Nivel_model',
          'Contrato_model'
        ));
        // Definir as regras de validação para cada campo do formulário.
        $this->form_validation->set_rules('recipient-nome', 'nome do professor', array('required','min_length[5]','max_length[255]','ucwords'));
        $this->form_validation->set_rules('recipient-matricula', 'matrícula', array('required','exact_length[7]', 'numeric','strtoupper'));
        $this->form_validation->set_rules('recipient-nascimento', 'data de nascimento', array('callback_date_check'));
        $this->form_validation->set_rules('professorDisciplinas[]', 'disciplinas', array('required'));
        $this->form_validation->set_rules('recipient-nivelAcademico', 'nivel', array('greater_than[0]'),array('greater_than'=>'Selecione o nivel acadêmico'));
        $this->form_validation->set_rules('recipient-contrato','contrato',array('greater_than[0]'),array('greater_than'=>'Selecione um contrato'));
        // Definição dos delimitadores
        $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');
        // Verifica se o formulario é valido
        if ($this->form_validation->run() == FALSE) {
          $this->session->set_flashdata('formDanger','<strong>Não foi possível cadastrar o professor, pois existe(m) erro(s) no formulário:</strong>');
          $dados['contrato']        = convert($this->Contrato_model->getAll(), TRUE);
          $dados['nivel']           = convert($this->Nivel_model->getAll(), TRUE);
          $dados['disciplinas']     = convert($this->Disciplina_model->getAll());
          $dados['professores']     = $this->Professor_model->getAll();
  	      $this->load->view('professores', $dados);
        } else {
          $id = $this->input->post('recipient-id');
          // Pega os dados do formulário
          $professor = array(
            'nome'            => $this->input->post("recipient-nome"),
            'matricula'       => $this->input->post('recipient-matricula'),
            'nascimento'      => brToSql($this->input->post("recipient-nascimento")),
            'coordenador'     => ($this->input->post("recipient-coordenador") == null) ? 0 : 1,
            'idContrato'      => $this->input->post("recipient-contrato"),
            'idNivel'         => $this->input->post("recipient-nivelAcademico"),
          );
          $disciplinas = $this->input->post('professorDisciplinas[]');
          if ($this->Professor_model->update($id, $professor)) {
            $this->Competencia_model->delete($id);
            foreach ($disciplinas as $idDisciplina)
              $this->Competencia_model->insert($id,$idDisciplina);
            $this->session->set_flashdata('success','Dados atualizados com sucesso');
          } else {
            $this->session->set_flashdata('danger','Não foi possivel atualizar os dados do professor, tente novamente ou entre em contato com o administrador do sistema. Caso tenha <strong>alterado a matrícula</strong> verifique se já não esteja em uso.');
          }
          redirect('Professor/atualizar');
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
