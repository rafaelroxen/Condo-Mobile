<?php 

    class Chamado {

        public function abrirChamado($tipo, $arquivo, $descricao, $id){
            global $conn;
            $msg = "";

            move_uploaded_file($arquivo['tmp_name'], 'assets/images/upload/'.$arquivo['name']);

            $sql = "INSERT INTO chamados
                    (
                        idUsuarioChamado, idTipoChamado, idNivelChamado, idStatusChamado, 
                        descricaoChamado, midiaChamado, prazo, idMotivoCancelamento
                    )
                    VALUES
                    (
                        :id, :tipo, 1, 1, :descricao, :midia, NOW(), 5
                    )";
            $sql = $conn->prepare($sql);
            $sql->bindValue(':id', $id);
            $sql->bindValue(':tipo', $tipo);
            $sql->bindValue(':descricao', $descricao);
            $sql->bindValue(':midia', BASE.'assets/images/upload/'.$arquivo['name']);
            $sql->execute();

            $sql = $conn->prepare("SELECT idChamado, prazo FROM chamados WHERE idUsuarioChamado = :id ORDER BY idChamado DESC");
            $sql->bindValue(':id', $id);
            $sql->execute();

            if($sql->rowCount() > 0){
                $chamado = $sql->fetch();
                return $msg = "Chamado aberto com sucesso. Chamado número: ".$chamado['idChamado']." prazo: ".date('d-m-Y', strtotime('15 days', strtotime($chamado['prazo'])));
            }else{
                return $msg = "Erro no processo de abertura de chamado";
            }
            
        }

        public function getChamadosPorUsuario($id){
            global $conn;
            $array = array();

            $data = date('Y-m-d');
            $dataValidade = date('Y-m-d', strtotime('-30 days', strtotime($data)));

            $sql = $conn->prepare("SELECT * FROM chamados WHERE idUsuarioChamado = :id AND prazo >= :datas AND idMotivoCancelamento = 5");
            $sql->bindValue(':id', $id);
            $sql->bindValue(':datas', $dataValidade);
            $sql->execute();

            if($sql->rowCount() > 0){
                $sql = $sql->fetchAll();
                $array = $sql;
            }
            return $array;
        }

        public function obterChamadoPorId($id, $chamado){
            global $conn;
            $array = array();
            
            $sql = $conn->query("SELECT * FROM chamados WHERE idUsuarioChamado $id AND idChamado = $chamado");

            if($sql->rowCount() > 0){
                $sql = $sql->fetchAll();
                $array = $sql;
            }
            return $array;
        }

        public function getMotivos(){
            global $conn;
            $array = array();

            $sql = $conn->query("SELECT * FROM chamado_motivo_cancelamento WHERE idMotivoCancelamento != 5");
            
            if($sql->rowCount() > 0){
                $sql = $sql->fetchAll();
                $array = $sql;
            }
            return $array;
        }

        public function cancelarChamado($tipo, $numero) {
            global $conn;
            $msg = "";

            $sql = "UPDATE chamados SET idMotivoCancelamento = :tipo WHERE idChamado = :numero";
            $sql = $conn->prepare($sql);
            $sql->bindValue(':tipo', $tipo);
            $sql->bindValue(':numero', $numero);
            $sql->execute();

            return $msg = "Chamado cancelado";
        }

        public function getAllChamados(){
            global $conn;
            $array = array();

            $sql = "SELECT * FROM chamados INNER JOIN usuarios ON chamados.idUsuarioChamado = usuarios.idUsuario WHERE idMotivoCancelamento = 5 ORDER BY idChamado DESC";
            $sql = $conn->query($sql);

            if($sql->rowCount() > 0){
                $sql = $sql->fetchAll();
                $array = $sql;
            }
            return $array;
        }
    }

?>