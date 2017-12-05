<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
*
*/
class checkUser {
    private $CI;
    private $controller;
    private $method;
    
    public function __construct(){
        $this->CI           = &get_instance();
        $this->controller   = strtolower($this->CI->router->class);
        $this->method       = $this->CI->router->method;
    }
    
    /*
    * Verificar se existe usuário logado e qual seu respectivo nível de accesso
    * @param controllers que não precisam de validação e/ou usuário logado
    */
    public function check($param) {
        
        $user = $this->CI->session->userdata('usuario_logado');
        
        if ( !in_array($this->controller, $param) ) {
            
            if (!isset($user)){
                $message = "Necessário estar logado para accessar " . $class;
                $this->CI->session->set_flashdata('danger', $message);
                redirect('/');
            }
            
            $access = [];
            
            foreach($user['tipos'] as $tipo) {
                if($tipo == 1){
                    $access = array_merge_recursive($access, $this->setAccessToAdmin());
                }
                if($tipo == 2){
                    $access = array_merge_recursive($access, $this->setAccessToCRA());
                }
                if($tipo == 3){
                    $access = array_merge_recursive($access, $this->setAccessToDAE());
                }
                if($tipo == 4){
                    $access = array_merge_recursive($access, $this->setAccessToDocente());
                }
                if($tipo == 5){
                    $access = array_merge_recursive($access, $this->setAccessToCoordenador());
                }
            }
            
            $this->hasAccess($access);   
        }
        
    }
    
    /*
    * seta os controllers e métodos que o perfil administrador pode accessar
    */
    private function setAccessToAdmin(){
        $access =
        [
            'turno'       => ['index', 'cadastrar', 'salvar', 'editar', 'atualizar', 'deletar', 'ativar'],
            'tipo_sala'   => ['index', 'cadastrar', 'salvar', 'editar', 'atualizar', 'deletar', 'ativar'],
            'modalidade'  => ['index', 'cadastrar', 'salvar', 'editar', 'atualizar', 'deletar', 'ativar'],
            'classificacao'   => ['index'],
            'curso'       => ['index', 'cadastrar', 'salvar', 'editar', 'atualizar', 'deletar', 'ativar','importCsv','download','force_download'],
            'pessoa'      => ['index', 'cadastrar', 'salvar', 'editar', 'atualizar', 'deletar', 'ativar'],
            'area'        => ['index', 'cadastrar', 'salvar', 'editar', 'atualizar', 'deletar', 'ativar','importCsv','download','force_download'],
            'disciplina'  => ['index', 'cadastrar', 'salvar', 'editar', 'atualizar', 'deletar', 'ativar','importCsv','download','force_download'],
            'consultadocente' => ['index', 'cadastrar', 'salvar', 'editar', 'atualizar', 'deletar', 'ativar'],
            'turma'       => ['index', 'cadastrar', 'salvar', 'editar', 'atualizar', 'deletar', 'ativar'],
            'periodo'     => ['index', 'cadastrar', 'salvar', 'editar', 'atualizar', 'deletar', 'ativar','importCsv','download','force_download', 'setPeriodoAtual']
        ];
        
        
        return $access;
    }
    
    /*
    * seta os controllers e métodos que o perfil CRA pode accessar
    */
    private function setAccessToCRA(){
        $access =
        [
            'turno'       => ['index', 'cadastrar', 'salvar', 'editar', 'atualizar', 'deletar', 'ativar'],
            'curso'       => ['index', 'cadastrar', 'salvar', 'editar', 'atualizar', 'deletar', 'ativar','importCsv','download','force_download'],
            'tipo_sala'   => ['index', 'cadastrar', 'salvar', 'editar', 'atualizar', 'deletar', 'ativar'],
            'periodo'     => ['index', 'cadastrar', 'salvar', 'editar', 'atualizar', 'deletar', 'ativar','importCsv','download','force_download'],
            'area'        => ['index', 'cadastrar', 'salvar', 'editar', 'atualizar', 'deletar', 'ativar','importCsv','download','force_download'],
            'turma'       => ['index', 'cadastrar', 'salvar', 'editar', 'atualizar', 'deletar', 'ativar'],
            'modalidade'  => ['index', 'cadastrar', 'salvar', 'editar', 'atualizar', 'deletar', 'ativar'],
            'disciplina'  => ['index', 'cadastrar', 'salvar', 'editar', 'atualizar', 'deletar', 'ativar','importCsv','download','force_download']
        ];
        
        return $access;
    }
    
    /*
    * seta os controllers e métodos que o perfil DAE pode accessar
    */
    private function setAccessToDAE(){
        $access =
        [
            'classificacao'   => ['index'],
            'consultadocente' => ['index', 'cadastrar', 'salvar', 'editar', 'atualizar', 'deletar', 'ativar'],
        ];
        
        return $access;
    }
    
    /*
    * seta os controllers e métodos que o perfil docente pode accessar
    */
    private function setAccessToDocente(){
        $access =
        [
            'fpa'         => [
                'index','cadastrarDisponibilidade',
                'salvarDisponibilidade', 'cadastrarPreferencias',
                'salvarPreferencias', 'editarPreferencias',
                'editarDisponibilidade'
                ]
            ];
            
            return $access;
        }
        
        private function setAccessToCoordenador(){
            $access =
            [
                'consultadocente' => ['index', 'cadastrar', 'salvar', 'editar', 'atualizar', 'deletar', 'ativar'],
                'classificacao'   => ['index'],
                'fpa'         => [
                    'index','cadastrarDisponibilidade',
                    'salvarDisponibilidade', 'cadastrarPreferencias',
                    'salvarPreferencias', 'editarPreferencias',
                    'editarDisponibilidade'
                    ]
                ];
                
                return $access;
            }
            
            /*
            * verifica se o usuário pode accessar controller e método requisitado
            */
            private function hasAccess ($access) {
                                
                if (!key_exists($this->controller, $access)) {
                    redirect('authError');
                }
                
                if(!in_array($this->method, $access[$this->controller])) {
                    redirect('authError');
                }
            }
            
        }
        