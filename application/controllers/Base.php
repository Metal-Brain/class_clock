<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Base extends CI_Controller {
  /**
    * Método construtor
    *
    * @access  public
    * @return  void
    */
	function __construct() {
		parent::__construct();
		$this->load->model('Disciplina_model');
		$this->load->library('csvimport');
	}
  /**
    * Método que carrega a home
    *
    * @access  public
    * @return  void
    */
	function Index() {
    // Recuperar os registros cadastrados na tabela contatos
        $data['disciplinas']=[]; 
            //= $this->csv_model->nome();
		$this->load->view('disciplinas/disciplinas', $data);
	}
  /**
    * Faz a improtação do CSV
    *
    * @access  public
    * @return  void
    */
	function ImportCsv() {
    // Recuperar os registros cadastrados na tabela contatos
		$data['disciplinas']=[];
        //= $this->csv_model->getDisciplinas();
		//$data['error'] = '';
    // Define as configurações para o upload do CSV
		$config['upload_path'] = BASEPATH.'/uploads/';
		$config['allowed_types'] = 'csv';
		$config['max_size'] = '1000';
		$this->load->library('upload', $config);
		// Se o upload falhar, exibe mensagem de erro na view
		if (!$this->upload->do_upload('csvfile')) {
			$data['error'] = $this->upload->display_errors();
            die($data['error']);
			$this->load->view('disciplinas/disciplinas', $data);
		} else {
			$file_data = $this->upload->data();
			$file_path =  './uploads/'.$file_data['file_name'];
      // Chama o método 'get_array', da library csvimport, passando o path do
      // arquivo CSV. Esse método retornará um array.
      $csv_array = $this->csvimport->get_array($file_path);
			if ($csv_array) {
        // Faz a interação no array para poder gravar os dados na tabela 'contatos'
				foreach ($csv_array as $row) {
					$insert_data = array(
						'id' => $row['id'],
						'curso_id' => $row['curso_id'],
                        'tipo_sala_id' => $row['tipo_sala_id'],
                        'nome_disciplina' => $row['nome_disciplina'],
                        'sigla_disciplina' => $row['sigla_disciplina'],
                        'qtd_professor' => $row['qtd_professor'],
                        'qtd_aulas' => $row['qtd_aulas'],
                        'deletado_em' => $row['deletado_em']
					);

          // Insere os dados na tabela 'contatos'
					Disciplina_model::create($insert_data);
				}
        
				$this->session->set_flashdata('success', 'Dados importados com sucesso!');
				redirect();
			} else
			   $data['error'] = "Ocorreu um erro, desculpe!";
			$this->load->view('disciplinas/disciplinas', $data);
		}
	}
}