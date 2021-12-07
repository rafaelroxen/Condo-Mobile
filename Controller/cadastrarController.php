<?php

class cadastrarController extends Controller {

    public function index(){
        $dados = array();
        $usuario = new Usuarios();

        if(isset($_POST['nome']) and !empty($_POST['nome'])){
            $nome = $_POST['nome'];
            $tel = $_POST['telefone'];
            $email = $_POST['email'];
            $senha = $_POST['senha'];

            $dados['retorno'] = $usuario->addUsuario($nome, $tel, $email, $senha);
        }

        $this->loadView('cadastrar', $dados);
    }
}

?>