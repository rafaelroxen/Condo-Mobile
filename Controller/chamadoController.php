<?php

    class chamadoController extends Controller {
        
        public function index(){
            $dados = array();
            $chamdo = new Chamado();

            if(isset($_POST['tipo']) and !empty($_POST['tipo'])){
                $tipo = $_POST['tipo'];
                //$arquivo = $_FILES['midia'];
                $descricao = $_POST['descricao'];
                $id = $_SESSION['usuario']['id'];

                $dados['chamado'] = $chamdo->abrirChamado($tipo, $_FILES['midia'], $descricao, $id);
            }

            $this->loadTemplate('chamado', $dados);
        }
    }

?>