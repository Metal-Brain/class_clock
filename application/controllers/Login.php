<?php defined('BASEPATH') OR exit('No direct script access allowed');

  /**
   *  Essa classe é responsavel por todas regras de negócio sobre logins.
   * @author Jean Brock
   * @since 2017/04/05
   */
  class Login extends CI_Controller {

    /**
     * Função para o usuário fazer o login
     * @author Caio de Freitas
     * @since 2017/09/23
     */
    public function index(){

      $this->form_validation->set_rules('prontuario','prontuario',array('required','exact_length[6]'));
      $this->form_validation->set_rules('senha','Senha',array('required','trim'));

      if ($this->form_validation->run() == false) {
        $this->load->view('login');
      } else {
        print("formulario validado");

        try {
          $prontuario = $this->input->post('prontuario');
          $senha = hash('sha256',$this->input->post('senha'));

          $usuario = Pessoa_model::where('prontuario',$prontuario)->where('senha',$senha)->firstOrFail();

          $dados =  [
            'id' => $usuario->id,
            'nome'  => $usuario->nome,
            'email' => $usuario->email,
            'tipo'  => $usuario->tipos()->first()->id,
          ];

          // Joga os dados do usuário na sessão
          $this->session->set_userdata('usuario_logado',$dados);

          // Verifica o tipo de usuário que esta entrando para ser redirecionado
          // para sua página.
          switch ($usuario->tipos()->first()) {
            case 1:
              redirect("Turno");
              break;
            // TODO: Adicionar os redirecionamentos
          }
        } catch (Exception $e) {
          $this->session->set_flashdata('danger','Prontuário ou senha incorretos, tente novamente');
          redirect("/");
        }
		  }
    }

    function verificaLogin(){
        $this->load->model(array('Login_model'));
        $username =($this->input->post("username"));
        $password= $this->input->post("password");

        $usuario = $this->Login_model->validate($username,$password);
        if($usuario){
          $this->session->set_userdata("usuario_logado", $usuario);
          $this->session->set_flashdata("success", "Logado com Sucesso!");
          redirect('Disciplina');
        } else {
          $this->session->set_flashdata("danger", "Usuário ou senha inválida!");
          $this->load->view('login');
        }
      }

    function logout(){

      $this->session->unset_userdata("usuario_logado");
      $this->session->set_flashdata("success", "Deslogado com Sucesso!");
      $this->session->sess_destroy();

      redirect('/');
    }

    /**
      * Verifica se existe o login no banco
      * @author Jean Brock
      * @since 2017/04/15
      * @return Retorna um objeto login
      */

    function enviaEmail(){
      $this->load->library('My_PHPMailer');//Carrega a library My_PHPMailer
      $this->load->helper('password');//Carrega o helper password
      $this->load->model(array('Login_model'));// Carrega o model Login_model

      //Define regras de validação do formulario!!!
      $this->form_validation->set_rules('matricula','matrícula',array('required','exact_length[8]'));
      //delimitador
      $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

      //condição para o formulario
      if ($this->form_validation->run() == FALSE) {
        $this->load->view('login');
      } else {
        //Pega os dados da matricula na view
        $usuario = array(
          'matricula' => $this->input->post('matricula'),
        );

        //chama o metodo verificaEmail passando como parametro um array contendo a matricula
        $usuario = $this->Login_model->verificaEmail($usuario);

        if ($usuario == NULL) {//verifica se o usuario retornado é NULL
          $this->session->set_flashdata('danger','Matrícula incorreta ou usuário não cadastrado');
          redirect('/');//Carrega a view login
        } else {
          $email = ($usuario['email']);// Pega o email na array referente ao usuário
          $senha = gerate(10);//gera uma nova senha para o usuario
          $usuario['senha'] = $senha;//aplica nova senha
          $content = $this->load->view('email/recuperar',array('usuario'=>$usuario),TRUE);
          $usuario['senha'] = hash('sha256',$senha);//aplica hash na nova senha
          if ($this->Login_model->updateSenha($usuario['id'], $usuario)){


            $mail = new PHPMailer();
            $mail->CharSet = 'UTF-8';
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 587;
            $mail->SMTPSecure = 'tls';
            $mail->SMTPAuth = true;
            $mail->Username = "metalcodeifsp@gmail.com";
            $mail->Password = "#metalcode2017#";
            $mail->setFrom('metalcodeifsp@gmail.com', 'Suporte Metal Code');//Cria a origem do email
            $mail->addAddress($usuario['email'], $usuario['nome']);//add o email e nome
            $mail->Subject = 'Recuperação de senha';//Seta o titulo do email
            $mail->msgHTML($content);//Seta a mensagem do email no caso passando a senha
            $mail->AltBody = 'This is a plain-text message body';

            if ($mail->send()){//Verifica se obteve sucesso no envio do email
                $this->session->set_flashdata('success','Email enviado com sucesso!');//Apresenta mensagem de sucesso
                redirect('/');//Carrega a view login
            }else{
                $this->session->set_flashdata('error',$this->email->print_debugger());//Debuga caso tenha algum erro no envio do email
                redirect('/');//Carrega a view login
            }
          }else{
            $this->session->set_flashdata('danger','Erro ao gerar nova senha');//Apresenta mensagem de erro
            redirect('/');//Carrega a view login
          }
        }
    }
   }


 }
?>
