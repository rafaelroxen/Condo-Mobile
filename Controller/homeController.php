<?php 
    class homeController extends Controller{
        
        public function index(){
            $dados = array();
            //Ao acessar a home, se o usuário não tiver com sessão iniciada carrega a tela de login.
            if(isset($_SESSION['usuario'])){
                $aviso = new Avisos();
                $chamado = new Chamado();
                $reclamacao = new Reclamacao();

                $dados['avisos'] = $aviso->getAvisos();
                $dados['chamados'] = $chamado->getAllChamados();
                $dados['reclamacao'] = $reclamacao->getAllReclamacoes();

                $this->loadTemplate('home', $dados);
            }else{
                $this->loadView('login', $dados);
            }

        }

        public function sair(){
            unset($_SESSION['usuario']);

            header("Location: ".BASE);
        }
    }
?>