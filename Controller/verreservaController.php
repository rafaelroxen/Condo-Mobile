<?php 

    class verreservaController extends Controller {

        public function index(){
            $dados = array();
            $reserva = new Reserva();
            $id = $_SESSION['usuario']['id'];
            $dados['reservas'] = $reserva->getReservasPorUsuario($id);

            $this->loadTemplate('verreservas', $dados);
        }

        public function delete($idReserva){
            $dados = array();
            $reserva = new Reserva();

            $dados['retorno'] = $reserva->deleteReserva($idReserva);

            $this->loadTemplate('verreservas', $dados);
        }
    }

?>