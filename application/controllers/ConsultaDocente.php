<?php
    /**
    *  Regras de negócio sobre disciplinas.
    *  @since 2018/08/28
    *  @author Thalita Barbosa
    */
    class ConsultaDocente extends CI_Controller {
        function index () {

              if ($this->session->userdata()["usuario_logado"]["tipo"] == 1) {
              $preferencias = Docente_preferencia_model::withTrashed()->get();
              $this->load->template('consultaDocente/consultaDocente',compact('preferencias'),'consultaDocente/js_consultaDocente');

              }
              else  {
              $user = $this->session->userdata();
              $data = array(
                "docentes" => Pessoa_model::join('docente', 'pessoa.id', '=', 'docente.pessoa_id')
                                          ->join('curso', 'docente.id', '=', 'curso.docente_id')
                                          ->where('pessoa.id', '=', $user["usuario_logado"]["id"])
                                          ->select('pessoa.id')
                                          ->get(),
              );
              if ($data["docentes"][0]["id"]==$user["usuario_logado"]["id"]) {
                $preferencias = Docente_preferencia_model::withTrashed()->get();
                $this->load->template('consultaDocente/consultaDocente',compact('preferencias','data'),'consultaDocente/js_consultaDocente');
              }else{
                redirect('authError');

              }




              //    select pessoa.id as docente_id from pessoa
              //     join docente on pessoa.id = docente.pessoa_id
              //     join curso on docente.id = curso.docente_id;

              }



        }




      }
