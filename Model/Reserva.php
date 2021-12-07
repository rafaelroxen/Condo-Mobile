<?php 

class Reserva {

    public function criarReserva($dia, $hora, $qt, $pessoa, $id, $tipo){
        global $conn;
        $jaExiste = false;
        $msg = "";
        
        $reservas = $this->getAllReservas();

        foreach($reservas as $item){
            if($dia == $item['diaReserva']){
                $jaExiste = true;
            }
        }

        $qtPeassoas = explode(' ', $pessoa);
        print_r($qtPeassoas);

        if($jaExiste == false){
            if(!empty($hora)){
                if(!empty($qt)){
                    if(count($qtPeassoas) > 0){
                        $protocolo = 'reserva?'.rand(10000, 522199);
                        $sql = "INSERT INTO 
                                reservas
                                (
                                    idUsuarioReserva, idTipoReserva, diaReserva, horaReserva, 
                                    qtConvidadosReserva, listaConvidadosReserva, protocoloReserva
                                ) 
                                VALUES
                                (
                                    :id, :tipo, :dia, :hora, :qt, :pessoa, :protocolo
                                )";
                        $sql = $conn->prepare($sql);
                        $sql->bindValue(':id', $id);
                        $sql->bindValue(':tipo', $tipo);
                        $sql->bindValue(':dia', $dia);
                        $sql->bindValue(':hora', $hora);
                        $sql->bindValue(':qt', $qt);
                        $sql->bindValue(':pessoa', $pessoa);
                        $sql->bindValue(':protocolo', $protocolo);
                        $sql->execute();

                        $msg = "Reserva incluída, número de protocolo: ".$protocolo;
                    }else {
                        $msg = "A quantidade de pessoas na lista não corresponde a quantidade de pessoas informada";
                    }
                }else{
                    $msg = "Atenção, Quantidade de pessoas convidadas invalida";
                }
            }else{
                $msg = "Atenção, Hora Invalida!";
            }
        }else {
            $msg = "Já existe uma reserva para este dia: ".$dia."<br>Escolha um outro dia!";
        }
        return $msg;
    }

    public function getAllReservas(){
        global $conn;
        $array = array();

        $sql = $conn->query("SELECT * FROM reservas");

        if($sql->rowCount() > 0){
            $sql = $sql->fetchAll();
            $array = $sql;
        }
        return $array;
    }

    public function getReservasPorUsuario($idUsuario){
        global $conn;
        $array = array();

        $sql = $conn->prepare("SELECT * FROM reservas WHERE idUsuarioReserva = :id ORDER BY idReserva DESC");
        $sql->bindValue(':id', $idUsuario);
        $sql->execute();

        if($sql->rowCount() > 0){
            $sql = $sql->fetchAll();
            $array = $sql;
        }
        return $array;
    }

    public function deleteReserva($idReserva) {
        global $conn;
        $hora = "";
        
        $sql = $conn->prepare("DELETE FROM reservas WHERE idReserva = :id");
        $sql->bindValue(':id', $idReserva);
        $sql->execute();

        header("Location: ".BASE."verreserva");
    }
}

?>