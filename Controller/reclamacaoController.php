<?php

    class reclamacaoController extends Controller {

        public function index(){
            $dados = array();
            $reclamacao = new Reclamacao();

            if(isset($_POST['titulo']) and !empty($_POST['titulo'])){
                $titulo = $_POST['titulo'];
                $midia = $_FILES['midia'];
                $descricao = $_POST['descricao'];
                $id = $_SESSION['usuario']['id'];

                $dados['retorno'] = $reclamacao->novaReclamacao($id, $titulo, $midia, $descricao);
            }

            $this->loadTemplate('reclamacao', $dados);
        }
    }

?>