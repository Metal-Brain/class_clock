<?php defined('BASEPATH') OR exit('No direct script access allowed');

  /**
   *  Esse modelo possui uma serie de funções sob a relação de login.
   *  @author Jean Brock
   *  @since 2017/04/05
   */
  class Login_model extends CI_Model {

    /**
      * Verifica se existe o login no banco
      * @author Jean Brock
      * @since 2017/04/05
      * @return Retorna um objeto login
      */
    public function validate($usuario){
      $this->db->where("matricula", $usuario['matricula']);
      $this->db->where("senha", $usuario['senha']);
      $this->db->where('status', TRUE); // Verifica o status do usuário
      $usuario = $this->db->get("Usuario")->row_array();

      return $usuario;
    }

    /**
     *  @author Caio de Freitas
     */
    public function isProfessor($usuario) {
      $this->db->where('id',$usuario['id']);
      $result = $this->db->get('Professor')->num_rows();

      return ($result == 1) ? TRUE : FALSE;
    }

    public function verificaEmail($usuario){
      $this->db->where("matricula", $usuario['matricula']);
      $this->db->where('status', TRUE); // Verifica o status do usuário
      $usuario = $this->db->get("Usuario")->row_array();
      return $usuario;
    }



    public function EnviarEmail() {
        // Carrega a library email
        $this->load->library('email');
        //Recupera os dados do formulário
        $dados = $this->input->post();

        //Inicia o processo de configuração para o envio do email
        $config['protocol'] = 'mail'; // define o protocolo utilizado
        $config['wordwrap'] = TRUE; // define se haverá quebra de palavra no texto
        $config['validate'] = TRUE; // define se haverá validação dos endereços de email

        /*
         * Se o usuário escolheu o envio com template, define o 'mailtype' para html,
         * caso contrário usa text
         */
        if(isset($dados['template']))
            $config['mailtype'] = 'html';
        else
            $config['mailtype'] = 'text';

        // Inicializa a library Email, passando os parâmetros de configuração
        $this->email->initialize($config);

        // Define remetente e destinatário
        $this->email->from('remetente@email.com', 'Remetente'); // Remetente
        $this->email->to($dados['email'],$dados['nome']); // Destinatário

        // Define o assunto do email
        $this->email->subject('Enviando emails com a library nativa do CodeIgniter');

        /*
         * Se o usuário escolheu o envio com template, passa o conteúdo do template para a mensagem
         * caso contrário passa somente o conteúdo do campo 'mensagem'
         */
        if(isset($dados['template']))
            $this->email->message($this->load->view('email-template',$dados, TRUE));
        else
            $this->email->message($dados['mensagem']);

        /*
         * Se foi selecionado o envio de um anexo, insere o arquivo no email
         * através do método 'attach' da library 'Email'
         */
        if(isset($dados['anexo']))
            $this->email->attach('./assets/img/ifsp.png');

        /*
         * Se o envio foi feito com sucesso, define a mensagem de sucesso
         * caso contrário define a mensagem de erro, e carrega a view home
         */
        if($this->email->send())
        {
            $this->session->set_flashdata('success','Email enviado com sucesso!');
            $this->load->view('login');
        }
        else
        {
            $this->session->set_flashdata('error',$this->email->print_debugger());
            $this->load->view('login');
        }
    }


  }
?>
