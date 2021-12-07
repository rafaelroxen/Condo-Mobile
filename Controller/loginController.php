<?php

    class loginController extends Controller {

        public function index(){
            $dados = array();
            $usuario = new Usuarios();
            $dados['msg'] = '';

            if (isset($_POST['email']) and !empty($_POST['email'])) {
                $email = $_POST['email'];
                if (isset($_POST['senha']) and !empty($_POST['senha'])) {
                    $senha = $_POST['senha'];
                    if($usuario->verificaEmail($email)) {   
                        $valida = $usuario->validaUsuario($email, $senha);
                        if($valida){
                            header("Location: ".BASE);
                        }else {
                            $dados['msg'] = "Senha incorrenta, tente novamente.";
                        }
                    }else { 
                        $dados['msg'] = "usuário inválido e/ou senha incorreta.";
                    }
                }else {
                    $dados['msg'] = "Senha incorreta.";
                }
            }

            $this->loadView('login', $dados);
        }
    }

?>