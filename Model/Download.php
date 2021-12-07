<?php 

    class Download{

        public function getDocumentos(){
            global $conn;
            $array = array();

            $sql = $conn->query("SELECT * FROM downloads");

            if($sql->rowCount() > 0){
                $sql = $sql->fetchAll();
                $array = $sql;
            }

            return $array;
        }
    }

?>