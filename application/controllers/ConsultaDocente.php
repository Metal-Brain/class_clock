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
          elseif ($this->session->userdata()["usuario_logado"]["tipo"] == 4) {

            $preferencias = Docente_preferencia_model::withTrashed()->get();
            $this->load->template('consultaDocente/consultaDocente',compact('preferencias'),'consultaDocente/js_consultaDocente');          }

        }
        else {
          redirect('authError');
        }



      }
