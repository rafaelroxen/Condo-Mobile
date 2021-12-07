<?php

    class verreclamacaoController extends Controller {

        public function index(){
            $dados = array();
            $reclamacao = new Reclamacao();
            $id = $_SESSION['usuario']['id'];

            $dados['retorno'] = $reclamacao->obterReclamacaoPorUsuario($id);

            $this->loadTemplate('verreclamacao', $dados);
        }

        public function delete($idReclamacao){
            $dados = array();
            $reclamacao = new Reclamacao();

            $dados['motivo'] = $reclamacao->getMotivos();
            $dados['numero'] = $idReclamacao;

            if(isset($_POST['motivo']) and !empty($_POST['motivo'])){
                $motivo = $_POST['motivo'];
                $numero = $idReclamacao;

                $dados['retorno'] = $reclamacao->cancelarReclamacao($motivo, $numero);
            }

            $this->loadTemplate('deletereclamacao', $dados);
        }
    }

?>