<?php

    class verchamadosController extends Controller{
        
        public function index(){
            $dados = array();
            $chamado = new Chamado();
            $id = $_SESSION['usuario']['id'];

            $dados['retorno'] = $chamado->getChamadosPorUsuario($id);

            if(isset($_POST['numero']) and !empty($_POST['numero'])){
                $chamado = $_POST['numero'];
                echo $chamado;
                $dados['teste'] = $chamado->obterChamadoPorId($id, $chamado);
            }

            $this->loadTemplate('verchamados', $dados);
        }

        public function delete($idChamado){
            $dados = array();
            $chamado = new Chamado();

            $dados['motivo'] = $chamado->getMotivos();
            $dados['numero'] = $idChamado;

            if(isset($_POST['tipo']) and !empty($_POST['tipo'])){
                $tipo = $_POST['tipo'];
                $numero = $idChamado;

                $dados['retorno'] = $chamado->cancelarChamado($tipo, $numero);
            }

            $this->loadTemplate('deletechamado', $dados);
        }
    }

?>