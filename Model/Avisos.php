<?php 

    class Avisos {

        public function getAvisos(){
            global $conn;
            $array = array();

            $sql = $conn->query("SELECT * FROM avisos ORDER BY idAviso DESC");

            if($sql->rowCount() > 0){
                $sql = $sql->fetchAll();
                $array = $sql;
            }
            return $sql;
        }

        public function criarAviso($descricao, $titulo){
            global $conn;

            $sql = $conn->prepare("INSERT INTO avisos(descricaoAviso, titulo) VALUES(:descricao :titulo)");
            $sql->bindValue(':descricao', $descricao);
            $sql->bindValue(':titulo', $titulo);
            $sql->execute();
        }
    }

?>