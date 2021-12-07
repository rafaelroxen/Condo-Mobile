<?php 

    class reservaController extends Controller {
        
        public function index(){
            $dados = array();

            $this->loadTemplate('reserva', $dados);
        }
    }

?>