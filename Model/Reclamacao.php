<?php

    class Reclamacao {

        public function novaReclamacao($id, $titulo, $midia, $descricao) {
            global $conn;
            $msg = "";

            move_uploaded_file($midia['tmp_name'], 'assets/images/upload/'.$midia['name']);

            $sql = "INSERT INTO reclamacao
                    (
                        idUsuarioReclamacao, idMotivoCancelReclamacao, tituloReclamacao, descricaoReclamacao, midiaReclamacao
                    ) VALUES
                    (
                        :id, 0, :titulo, :descricao, :midia
                    )";
            $sql = $conn->prepare($sql);
            $sql->bindValue(':id', $id);
            $sql->bindValue(':titulo', $titulo);
            $sql->bindValue(':descricao', $descricao);
            $sql->bindValue(':midia', BASE.'assets/images/upload/'.$midia['name']);
            $sql->execute();

            $sql = "SELECT idReclamacao FROM reclamacao WHERE idUsuarioReclamacao = :id ORDER BY idReclamacao DESC";
            $sql = $conn->prepare($sql);
            $sql->bindValue(':id', $id);
            $sql->execute();

            if($sql->rowCount() > 0){
                $chamado = $sql->fetch();
                return $msg = "Reclamação aberta com sucesso. Reclamacão número: ".$chamado['idReclamacao'];
            }else{
                return $msg = "Erro no processo";
            }
        }

        public function obterReclamacaoPorUsuario($id){
            global $conn;
            $array = array();

            $sql = "SELECT * FROM reclamacao WHERE idUsuarioReclamacao = :id AND idMotivoCancelReclamacao = 0";
            $sql = $conn->prepare($sql);
            $sql->bindValue(':id', $id);
            $sql->execute();

            if($sql->rowCount() > 0){
                $sql = $sql->fetchAll();
                $array = $sql;
            }
            return $array;
        }

        public function getMotivos(){
            global $conn;
            $array = array();

            $sql = $conn->query("SELECT * FROM motivo_cancela_reclamacao");
            
            if($sql->rowCount() > 0){
                $sql = $sql->fetchAll();
                $array = $sql;
            }
            return $array;
        }

        public function cancelarReclamacao($motivo, $numero){
            global $conn;
            $msg = "";

            $sql = "UPDATE reclamacao SET IdMotivoCancelReclamacao = :motivo WHERE idReclamacao = :numero";
            $sql = $conn->prepare($sql);
            $sql->bindValue(':motivo', $motivo);
            $sql->bindValue(':numero', $numero);
            $sql->execute();

            return $msg = "Reclamação Cancelada";
        }

        public function getAllReclamacoes(){
            global $conn;
            $array = array();

            $sql = "SELECT * FROM reclamacao INNER JOIN usuarios ON reclamacao.idUsuarioReclamacao = usuarios.idUsuario WHERE idMotivoCancelReclamacao = 0 ORDER BY idReclamacao DESC";
            $sql = $conn->query($sql);

            if($sql->rowCount() > 0){
                $sql = $sql->fetchAll();
                $array = $sql;
            }
            return $array;
        }
    }

?>