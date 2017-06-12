<?php

defined('BASEPATH') OR exit('No direct script access allowed');

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
      if (verificaSessao() && verificaNivelPagina(array(1,2,3))){
        // Carrega a biblioteca para validação dos dados.
        $this->load->library(array('form_validation','My_PHPMailer'));
        $this->load->helper(array('form','dropdown','date','password'));
        $this->load->model(array(
		  'Curso_model',
          'Professor_model',
          'Disciplina_model',
          'Competencia_model',
          'Nivel_model',
          'Contrato_model',
          'Usuario_model'
        ));

				// $disponibilidades = $this->Professor_model->getDisponibilidadeHorario(1,'07:00');
				//
				// echo '<pre>';
				// print_r($disponibilidades);
				// echo '</pre>';

        // Definir as regras de validação para cada campo do formulário.
        $this->form_validation->set_rules('nome', 'nome do professor', array('required','min_length[5]','max_length[255]','ucwords'));
        $this->form_validation->set_rules('matricula', 'matrícula', array('required','exact_length[8]','is_unique[Usuario.matricula]','strtoupper'));
				$this->form_validation->set_rules('email','e-mail',array('required','valid_email','is_unique[Usuario.email]'));
        $this->form_validation->set_rules('nascimento', 'data de nascimento', array('callback_date_check'));
        $this->form_validation->set_rules('nivel', 'nivel', array('greater_than[0]'),array('greater_than'=>'Selecione o nível acadêmico.'));
        $this->form_validation->set_rules('contrato','contrato',array('greater_than[0]'),array('greater_than'=>'Selecione um contrato.'));
				$this->form_validation->set_rules('coordena','curso',array(array('coordenadorCurso',array($this->Professor_model,'verificaCoordenadorCurso'))));

				$this->form_validation->set_message('coordenadorCurso','Curso selecionado já possui um coordenador');

        // Definição dos delimitadores
        $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');
        // Verifica se o formulario é valido
        if ($this->form_validation->run() == FALSE) {
          $this->session->set_flashdata('formDanger','<strong>Não foi possível cadastrar o professor, pois existe(m) erro(s) no formulário:</strong>');
          $dados['contrato']        = convert($this->Contrato_model->getAll(), TRUE);
          $dados['nivel']           = convert($this->Nivel_model->getAll(), TRUE);
          $dados['disciplinas']     = convert($this->Disciplina_model->getAll(TRUE));
		  		$dados['cursos']			= convert($this->Curso_model->getAll(), TRUE);
					if ($this->session->nivel == 2) {
						$dados['professores']     = $this->Professor_model->getAllCoordenador($this->session->id);
					}else{
						$dados['professores']     = $this->Professor_model->getAll();
					}
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
						'idCurso'					=> $this->input->post('coordena'),
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
            $this->session->set_flashdata('danger','Não foi possível cadastrar o professor, tente novamente ou entre em contato com o administrador do sistema.');
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
          $this->session->set_flashdata('success','Professor ativado com sucesso');
        else
          $this->session->set_flashdata('danger','Não foi possível ativar o professor, tente novamente ou entre em contato com o administrador do sistema.');
        redirect('Professor');
      }else{
        redirect('/');
      }
    }
    /**
      * Altera os dados do professor.
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
					'Curso_model',
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
		$this->form_validation->set_rules('recipient-email','e-mail',array('required','valid_email'));
        $this->form_validation->set_rules('recipient-nascimento', 'data de nascimento', array('callback_date_check'));
        $this->form_validation->set_rules('recipient-nivelAcademico', 'nivel', array('greater_than[0]'),array('greater_than'=>'Selecione o nível acadêmico.'));
        $this->form_validation->set_rules('recipient-contrato','contrato',array('greater_than[0]'),array('greater_than'=>'Selecione um contrato.'));
		$this->form_validation->set_rules('recipient-coordena','curso',array(array('coordenadorCurso',array($this->Professor_model,'verificaCoordenadorCurso'))));

		$this->form_validation->set_message('coordenadorCurso','Curso selecionado já possui um coordenador');

		// Definição dos delimitadores
        $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
        // Verifica se o formulario é valido
        if ($this->form_validation->run() == FALSE) {
          $this->session->set_flashdata('formDanger','<strong>Não foi possível cadastrar o professor, pois existe(m) erro(s) no formulário:</strong>');
          $dados['contrato']        = convert($this->Contrato_model->getAll(), TRUE);
          $dados['nivel']           = convert($this->Nivel_model->getAll(), TRUE);
          $dados['disciplinas']     = convert($this->Disciplina_model->getAll(TRUE));
		  $dados['cursos']					= convert($this->Curso_model->getAll(), TRUE);

			if ($this->session->nivel == 2) {
				$dados['professores']     = $this->Professor_model->getAllCoordenador($this->session->id);
			}else{
				$dados['professores']     = $this->Professor_model->getAll();
			}
          $this->load->view('includes/header', $dados);
          $this->load->view('includes/sidebar');
          $this->load->view('professores/professores');
					$this->load->view('includes/footer');
					$this->load->view('professores/js_professores');

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
            $this->session->set_flashdata('danger','Não foi possível atualizar os dados do professor, tente novamente ou entre em contato com o administrador do sistema. Caso tenha alterado a <strong>matrícula</strong>, verifique se a mesma já existe.');
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
    public function disciplinas($id, $json=TRUE) {
        $this->load->model(array('Competencia_model'));
        $disciplinas = $this->Competencia_model->getAllDisciplinas($id);
        if ($json)
					echo json_encode($disciplinas);
				else
					return $disciplinas;
    }

		/**
		 * busca todas as preferências de disciplinas selecionadas pelo professor
		 * @author Caio de Freitas
		 * @since 2017/04/21
		 * @param INT $idProfessor - ID do professor
		 */
		public function getPreferencia($idProfessor) {
			$this->load->model('Competencia_model');
			$preferencias = $this->Competencia_model->getPreferencia($idProfessor);

			echo json_encode($preferencias);
		}

		/**
			*	Busca todas as disciplinas vinculadas ao professor e enviar para view de preferencias
			*	@author Felipe Ribeiro
			*/
		public function preferencia(){
			if (verificaSessao() && verificaNivelPagina(array(2))){

				$this->load->model(array('Competencia_model'));
				$this->load->helper('dropdown');

				// Regra de validação do formulário
				$this->form_validation->set_rules('disciplinas[]','disciplinas',array('required'));
				// delimitadores
				$this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

				if($this->form_validation->run() == FALSE){
					$dados['disciplinas'] = convert($this->disciplinas($this->session->id, FALSE));
					$this->load->view('includes/header', $dados);
					$this->load->view('includes/sidebar');
					$this->load->view('preferencias/preferencias');
					$this->load->view('includes/footer');
					$this->load->view('preferencias/js_preferencias');
				} else {

					$disciplinas = $this->input->post('disciplinas[]');
					$this->Competencia_model->clearPreferencia($this->session->id);

					foreach ($disciplinas as $disciplina)
						$this->Competencia_model->insertPreferencia($this->session->id, $disciplina, TRUE);

					$this->session->set_flashdata('success','Disciplinas selecionadas com sucesso');
					redirect('Professor/preferencia');
				}

			}else{
					redirect('/');
			}
		}

		/**
		 * busca todas as disponibilidades selecionadas pelo professor
		 * @author Jean Brock
		 * @since 2017/04/27
		 * @param INT $idProfessor - ID do professor
		 */
		public function getDisponibilidade($idProfessor) {
			$this->load->model('Disponibilidade_model');
			$disponibilidades = $this->Disponibilidade_model->getAllDisponibilidades($idProfessor);

			echo json_encode($disponibilidades);
		}

		public function getDia(){
			$dia = array(
				0					=> 'Selecione',
				'segunda'	=> 'Segunda',
				'terça'		=> 'Terça',
				'quarta'	=> 'Quarta',
				'quinta'	=> 'Quinta',
				'sexta'		=> 'Sexta',
				'sábado'	=> 'Sábado'
			);
			return $dia;
		}

		/**
			*	Busca todas as disponibilidades vinculadas ao professor e enviar para view de preferencias
			* @author Jean Brock
 		 	* @since 2017/04/27
			*/
		public function disponibilidade(){
			if (verificaSessao() && verificaNivelPagina(array(2))){

				$this->load->library(array('form_validation'));
				$this->load->helper(array('form','dropdown','date'));
				$this->load->model(array(
					'Professor_model',
					'Disponibilidade_model',
					'Periodo_model'
				));
				// Definir as regras de validação para cada campo do formulário.

				$this->form_validation->set_rules('periodo', 'periodo', array('greater_than[0]'),array('greater_than'=>'Selecione um {field}'));
				$this->form_validation->set_rules('dia', 'dia da semana', array('in_list[segunda,terça,quarta,quinta,sexta,sábado]'));
				$this->form_validation->set_rules('inicio', 'horario de inicio', array('greater_than[0]'),array('greater_than'=>'Selecione um {field}'));
				// Definição dos delimitadores
				$this->form_validation->set_error_delimiters('<span class="text-danger">','</span>');
				// Verifica se o formulario é valido
				if ($this->form_validation->run() == FALSE) {
					$this->session->set_flashdata('formDanger','<strong>Não foi possível cadastrar a disponibilidade, pois existe(m) erro(s) no formulário:</strong>');

					$disponibilidade['segunda'] = $this->Disponibilidade_model->getProfDisponibilidade($this->session->id,'segunda');
					$disponibilidade['terça'] = $this->Disponibilidade_model->getProfDisponibilidade($this->session->id,'terça');
					$disponibilidade['quarta'] = $this->Disponibilidade_model->getProfDisponibilidade($this->session->id,'quarta');
					$disponibilidade['quinta'] = $this->Disponibilidade_model->getProfDisponibilidade($this->session->id,'quinta');
					$disponibilidade['sexta'] = $this->Disponibilidade_model->getProfDisponibilidade($this->session->id,'sexta');
					$disponibilidade['sábado'] = $this->Disponibilidade_model->getProfDisponibilidade($this->session->id,'sábado');

					$dados['periodo']         = convert($this->Periodo_model->getTurno(), TRUE);
					$dados['professores']     = convert($this->Professor_model->getAll(TRUE));
					$dados['disponibilidade'] = $disponibilidade;
					$dados['horas'] = array(
						'0'	=> 'Selecione',
						'7'=>'07:00',
						'8'=>'08:00',
						'9'=>'09:00',
						'10'=>'10:00',
						'11'=>'11:00',
						'12'=>'12:00',
						'13'=>'13:00',
						'14'=>'14:00',
						'15'=>'15:00',
						'16'=>'16:00',
						'17'=>'17:00',
						'18'=>'18:00',
						'19'=>'19:00',
						'20'=>'20:00',
						'21'=>'21:00',
						'22'=>'22:00',
					);
					$dados['dia'] = $this->getDia();



					$this->load->view('includes/header',$dados);
					$this->load->view('includes/sidebar');
					$this->load->view('disponibilidade/disponibilidades');
					$this->load->view('includes/footer');
					$this->load->view('disponibilidade/js_disponibilidades');
				} else {

					$disponibilidade = array(
						'idPeriodo' 	=> $this->input->post('periodo'),
						'idProfessor' => $this->session->id,
						'dia' 				=> $this->input->post('dia'),
						'inicio' 			=> $this->input->post('inicio').':00',
						'fim' 				=> $this->input->post('fim')
					);
					if ($this->Disponibilidade_model->verificaHora($disponibilidade['dia'], $disponibilidade['inicio'], $disponibilidade['idProfessor'])) {
						if ($this->Disponibilidade_model->insertDisponibilidade ($disponibilidade)) {
							$this->session->set_flashdata('success','Disponibilidade cadastrada com sucesso');
						} else {
							$this->session->set_flashdata('danger','Não foi possível cadastrar a disponibilidade, tente novamente ou entre em contato com o administrador do sistema.');
						}
						redirect('Professor/disponibilidade');
					}else {
						$this->session->set_flashdata('danger','Não foi possível cadastrar a disponibilidade esse horario já existe.');
						redirect('Professor/disponibilidade');
					}

				}

			}else{
					redirect('/');
			}
		}



		/**
		 * Recebe o dia da semana e verifica se o professor logado tem disponibilidade
		 * de horario para o dia selecionado.
		 * Ao final a função gera um JSON com um boolean TRUE caso professor tenha
		 * disponibilidade para o dia.
		 * @author Caio de Freitas
		 * @since 2017/05/08
		 * @param STRING $dia - Dia de semana em texto
		 */
		public function verificaDisponibilidade($dia) {
			$dia = urldecode($dia);
			$idProfessor = $this->session->id;
			$response = array();

			$this->load->model('Disponibilidade_model');

			$disponibilidade = $this->Disponibilidade_model->getProfDisponibilidade($idProfessor, $dia);

			$temp = 0;
			$consecutivas = 1;
			foreach ($disponibilidade as $d) {
				$horaInicio = date_create($d['inicio']);
				$horaInicio = date_format($horaInicio,'H');

				if (($temp + 1) == $horaInicio) {
					$consecutivas++;
				}

				$temp = $horaInicio;

			}
			$response['result'] = ($consecutivas >= 4) ? FALSE : TRUE;

			echo json_encode($response);
		}

		public function removeHorario($id){
			$this->load->model('Disponibilidade_model');
			$this->Disponibilidade_model->disable($id);
			redirect('Professor/disponibilidade');
		}

		public function coordenadorde(){
			if (verificaSessao() && verificaNivelPagina(array(2))){

				$this->load->model(array('Professor_model','CoordenadorDe_model'));
				$this->load->helper('dropdown');

				// Regra de validação do formulário
				$this->form_validation->set_rules('professores[]','professores',array('required'));
				// delimitadores
				$this->form_validation->set_error_delimiters('<span class="text-danger">','</span>');

				if($this->form_validation->run() == FALSE){
					$dados['professores'] = convert($this->Professor_model->getAll());
					$this->load->view('includes/header', $dados);
					$this->load->view('includes/sidebar');
					$this->load->view('coordenadorde/coordenadordes');
					$this->load->view('includes/footer');
					$this->load->view('coordenadorde/js_coordenadordes');
				} else {

					$professores = $this->input->post('professores[]');
					$this->CoordenadorDe_model->clearProfessor($this->session->id);

					foreach ($professores as $professor)
						$this->CoordenadorDe_model->insertCoordenadorDe($professor, $this->session->id);

					$this->session->set_flashdata('success','Professor selecionado com sucesso');
					redirect('Professor/coordenadorde');
				}

			}else{
					redirect('/');
			}
		}

		public function getCoordenadorDe ($idCoordenador,$json=TRUE) {
			if (verificaSessao()) {
				$this->load->model('CoordenadorDe_model');
				$professores = $this->CoordenadorDe_model->getAllProfessor($idCoordenador);
				if ($json)
					echo json_encode($professores);
				else
					return $professores;
			}
		}

		public function grade(){
			if (verificaSessao() && verificaNivelPagina(array(2))){
				if($this->form_validation->run() == FALSE){


					$dados = array();

					$this->load->view('includes/header',$dados);
					$this->load->view('includes/sidebar');
					$this->load->view('grade/grades');
					$this->load->view('includes/footer');
					$this->load->view('grade/js_grades');
				} else {


				}

			}else{
					redirect('/');
			}
		}

		/**
		 * Essa função vai gerar a grade de horario para um curso
		 * @author Caio de Freitas
		 * @since 2017/02/06
		 * @param INT $idCoordenador - ID do Professor coordenador
		 */
		public function gerarGrade ($idCoordenador) {
			if (verificaSessao()) {

				$this->load->helper(array('date'));
				$this->load->model(array('Disponibilidade_model','CursoTemPeriodo_model','CursoTemDisciplina_model','Curso_model'));

				$idCurso = $this->Curso_model->getCursoCoordenador($idCoordenador);
				$curso = $this->Curso_model->getCursoById($idCurso);

				$semestreInicial = primeiroSemestre();
				$curso['periodo'] = $this->CursoTemPeriodo_model->getPeriodoByCurso($curso[0]['id']);

				for ($i=$semestreInicial; $i <= $curso[0]['qtdSemestres']; $i += 2) {
					$disciplinas = $this->CursoTemDisciplina_model->getDisciplinasByCurso($idCurso,$i);
					for ($dia = 0; $dia < 5; $dia ++) {
						$disciplinaIndex = 0;
						$hora = inicioPeriodo($curso['periodo']);
						$aulasAtribuidas = 0;
						// TODO: continuar construção da grade - verificar disponibilidade do professor.
						while ( ($disciplinas[$disciplinaIndex]['qtdAulas'] > 0 && $aulasAtribuidas < maxAula($curso['periodo']) && $disciplinaIndex < count($disciplinas)-1)) {
							$disponibilidade = $this->Disponibilidade_model->getDisponibilidade($disciplinas[$disciplinaIndex]['idDisciplina'], numberToDay($dia), numeroParaHora($hora));
							if ($disponibilidade) {
								echo '<pre>';
								print_r($disciplinas);
								echo '</pre>';
								$disciplinas[$disciplinaIndex]['qtdAulas'] -= 1;
								$hora++;
								$aulasAtribuidas++;
								// TODO: Fazer atribuição da aula.
							} else {
								$disciplinaIndex++;
							}
						}
					}
				}
			}
		}

		public function verificaMatricula(){
		  $validate_data = array('matricula' => $this->input->get('matricula'));
		  $this->form_validation->set_data($validate_data);
		  $this->form_validation->set_rules('matricula', 'matrícula', 'is_unique[Usuario.matricula]');

		  if($this->form_validation->run() == FALSE){
			echo "false";
		  }else{
			echo "true";
		  }
		}

		public function verificaDia($idDisciplina, $periodo){

			$this->load->helper(array('date_helper'));
			$this->load->model(array(
				'Professor_model',
				'Disciplina_model',
				'Competencia_model',
				'Usuario_model',
				'Disponibilidade_model'
			));

			$horas = getHorasPeriodo($periodo);


			$grade = array();
			switch ($periodo) {
				case 3:
					for ($i=0; $i < 5 ; $i++) {//Dias Semanas
						for ($j=0; $j < sizeof($horas) ; $j++) { //Horas Aulas Dia
							if ($this->Professor_model->getDisponibilidadeHorario($idDisciplina, $horas[$j])) {
								$disponibilidades = $this->Professor_model->getDisponibilidadeHorario($idDisciplina, $horas[$j]);
								$disponibilidadeHora = array(
									$i => array(
										'dia' => $disponibilidades[$i]['dia'],
										'horario' => $disponibilidades[$i]['inicio'],
										'disciplina' => $disponibilidades[$i]['sigla'],
										'professor'=> $disponibilidades[$i]['nome']
									)
								);
								if ($disponibilidadeHora != null) {
									$grade[$j] = $disponibilidadeHora;
								}
							}
						}
						if (sizeof($grade) == sizeof($horas)) {
							return $grade;
						}else{
							return FALSE;
						}
					}


					break;

				case 2:
					# code...
					break;

				case 1:
					# code...
					break;


				default:
					# code...
					break;
			}
			return $grade;
		}


			// 			$disponibilidades = $this->Disponibilidade_model($periodo);
			// 			$grade = array();
			// 			for ($i=1; $i < 6 ; $i++) {//Dias Semanas
			// 				for ($j=0; $j < 5 ; $j++) { //Horas Aulas Dia
			// 					foreach ($disciplinas as $disciplina) {//Disciplinas
			// 						if ($disciplina['qtdAulas'] <= 4 && $disciplina['qtdAulas'] > 0) {
			// 							foreach ($disponibilidades as $disponibilidade) {//Disponibilidade por Professor
			// 								if ($disponibilidade['dia'] == $diasSemana[$i] && $disponibilidade['inicio'] == $horas[$j]) {
			// 									$grade =
			// 								}
			// 								}else{
			// 									$disciplina['qtdAulas']-=4;
			// 									$grade =
			// 							}
			// 						}
			// 					}
			// 				}
			// 			}
			//

		public function verificaEmail(){
		  $validate_data = array('email' => $this->input->get('email'));
		  $this->form_validation->set_data($validate_data);
		  $this->form_validation->set_rules('email', 'email', 'is_unique[Usuario.email]');

		  if($this->form_validation->run() == FALSE){
			echo "false";
		  }else{
			echo "true";
		  }
		}

		/**
		 * Gera um JSON com os dados do professor coordenador do curso informado.
		 * @author Caio de Freitas
		 * @since 2017/06/07
		 * @param INT $idCurso - ID do curso
		 */
		public function getCoordenador($idCurso) {
			$this->load->model('Professor_model');
			$professor = $this->Professor_model->getCoordenadorByCurso($idCurso);
			echo json_encode($professor);
		}

		public function verCadastro(){
			if (verificaSessao() && verificaNivelPagina(array(2))){
		        $this->load->helper(array('form','dropdown','date','password'));
				$this->load->model(array(
					'Curso_model',
					'Professor_model',
					'Disciplina_model',
					'Competencia_model',
					'Nivel_model',
					'Contrato_model',
					'Usuario_model'));

				if($this->form_validation->run() == FALSE){
					$dados['contrato']        = convert($this->Contrato_model->getAll(), TRUE);
					$dados['nivel']           = convert($this->Nivel_model->getAll(), TRUE);
				    $dados['disciplinas']     = convert($this->Disciplina_model->getAll(TRUE));
				    $dados['cursos']	    	= convert($this->Curso_model->getAll(), TRUE);


					$dados['professores'] = ($this->Professor_model->getById($this->session->id));
					$this->load->view('includes/header', $dados);
					$this->load->view('includes/sidebar');
					$this->load->view('cadastroProf/cadastroProf');
					$this->load->view('includes/footer');
					$this->load->view('cadastroProf/js_cadastroProf');
				}

			}else{
					redirect('/');
			}
		}

 }

?>
