<?php
    /**
    *  Regras de negócio sobre disciplinas.
    *  @since 2018/08/28
    *  @author Thalita Barbosa
    */
    class ConsultaDocente extends CI_Controller {
        function index () {
            $dados_usuario = $this->session->userdata();
            $preferencias = Docente_preferencia_model::withTrashed()->get();
            $this->load->template('consultaDocente/consultaDocente',compact('preferencias','dados_usuario'),'consultaDocente/js_consultaDocente');
        }



      }
