<?php

/**
 *
 */
class Area extends CI_Controller {

  /**
   * Exibe todos os turnos cadastrados no banco de dados.
   * @author Thalita
   * @since 2017/09/25
   */
  function index () {
    
    $areas = Area_model::withTrashed()->get();
    $this->load->template('areas/areas',compact('areas'),'areas/js_areas');
  }

  function cadastrar () {
    $this->load->template('areas/areasCadastrar',[],'areas/js_areas');
  }

  /**
   * Salva uma nova area.
   * @author Thalita
   * @since 2017/09/26
   */
  public function salvar () {

    $this->form_validation->set_rules('codigo',
                                      'codigo',
                                      array('required',
                                            'max_length[2]',
                                            'is_unique[area.codigo]')                                            
                                     );
    $this->form_validation->set_rules('nome_area',
                                      'nome',
                                      array('required',
                                            'max_length[25]',
                                            'is_unique[area.nome_area]')
                                     );

    $this->form_validation->set_message('is_unique','O nome da área informada já está cadastrada');
    //$this->form_validation->set_error_delimiters('<span class="text-danger">','</span>');

         if($this->form_validation->run()){
            try {
                $area = new Area_model();
                $area->nome_area = $this->input->post('nome_area');
                $area->codigo = $this->input->post('codigo');
                $area->save();
                $this->session->set_flashdata('success','Área cadastrada com sucesso');
            } catch (Exception $ignored){
                $this->session->set_flashdata('danger','Problemas ao cadastrar a área, tente novamente!');
            }
            redirect('Area');
        }else{
            $this->cadastrar();
        }
    }
  

  /**
   * Formulário para alterar os dados da area
   * @author Thalita
   * @since 2017/09/25
   */
  function editar ($id) {
      $area = Area_model::withTrashed()->findOrFail($id);
      $this->load->template('areas/areasEditar',compact('area','id'),'areas/js_areas');
  }

  /**
   * Edita os dados da area no banco de dados.
   * @author Thalita
   * @since 2017/09/25
   */
  function atualizar ($id) {
     $this->form_validation->set_rules('codigo',
                                      'codigo',
                                      array('required',
                                            'max_length[2]',
                                             "is_unique_except[area.codigo,{$area->codigo}]")                                            
                                     );
    $this->form_validation->set_rules('nome_area',
                                      'nome',
                                      array('required',
                                            'max_length[25]',
                                             "is_unique_except[area.nome_area,{$area->nome_area}]")
                                     );


      if($this->form_validation->run()){
            try {
               Area_model::where('id', $id)
                            ->update([                                
                                "codigo"     => $this->input->post('codigo'),
                                "nome_area"  => $this->input->post('nome_area')
                            ]);
                $this->session->set_flashdata('success','Área atualizada com sucesso');
                redirect('Area');
            } catch (Exception $ignored){}
        }
        $this->session->set_flashdata('danger','Problemas ao atualizar os dados da área, tente novamente!');
        $this->editar($id);
    }
  }

  /**
   * Desativa uma area cadastrada no banco de dados.
   * @author Thalita
   * @param ID da area
   */
  function deletar ($id) {
    try {
      $area = Area_model::findOrFail($id);
      $area->delete();

      $this->session->set_flashdata('success','Área desativada com sucesso');
    } catch (Exception $e) {
      $this->session->set_flashdata('danger','Erro ao desativar uma área, tente novamente');
    }

    redirect("Area");

  }

  /**
   * Ativa a area
   * @author Thalita
   * @since 2017/09/25
   * @param ID da area
   */
  function ativar ($id) {
    try {
      $area = Area_model::withTrashed()->findOrFail($id);
      $area->restore();
      $this->session->set_flashdata('success','Área ativada com sucesso');
    } catch (Exception $e) {
      $this->session->set_flashdata('danger','Erro ao ativar a área. Tente novamente!');
    }

    redirect("area");

  }
}
?>

