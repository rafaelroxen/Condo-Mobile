<?php 

    class Usuarios {
        public function verificaEmail($email){
            global $conn;

            $sql = $conn->prepare("SELECT idUsuario FROM usuarios WHERE emailUsuario = :email");
            $sql->bindValue(":email", $email);
            $sql->execute();

            if($sql->rowCount() > 0){
                return true;
            }else{
                return false;
            }
        }

        public function validaUsuario($email, $senha){
            global $conn;
            $retorno = false;

            $sql = "SELECT * FROM usuarios WHERE emailUsuario = :email AND senhaUsuario = :senha";
            $sql = $conn->prepare($sql);
            $sql->bindValue(":email", $email);
            $sql->bindValue(":senha", md5($senha));
            $sql->execute();

            if($sql->rowCount() > 0){
                $sql = $sql->fetch();
                $_SESSION['usuario'] = [
                    'id' => $sql['idUsuario'],
                    'nome' => $sql['nomeUsuario'],
                    'email' => $sql['emailUsuario'],
                    'telefone' => $sql['telfoneUsuario'],
                ];
                $retorno = true;
            }
            return $retorno;
        }

        public function addUsuario($nome, $tel, $email, $senha){
            global $conn;
            $msg = "";
            if($nome != ""){
                if($tel != ""){
                    if($email != ""){
                        if($senha != ""){
                            if(!$this->verificaEmail($email)){
                                $sql = "INSERT INTO usuarios (nomeUsuario, telfoneUsuario, emailUsuario, senhaUsuario)
                                        VALUES (:nome, :tel, :email, :senha)";
                                $sql = $conn->prepare($sql);
                                $sql->bindValue(":nome", $nome);
                                $sql->bindValue(":tel", $tel);
                                $sql->bindValue(":email", $email);
                                $sql->bindValue(":senha", md5($senha));
                                $sql->execute();

                                $msg = "Cadastro realizado com sucesso!";
                            }else {
                                $msg = "E-mail informado já está cadastrado!";
                            }
                        }else {
                            $msg = "Senha não pode ser vazio";
                        }
                    }else {
                        $msg = "E-mail não pode ser vazio";
                    }
                }else {
                    $msg = "Telefone não pode ser Vazio";
                }
            }else {
                $msg = "Nome não pode ser vazio";
            }
            return $msg;
        }
    }

?>