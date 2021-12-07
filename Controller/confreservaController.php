<?php 

    class confreservaController extends Controller {
        
        public function index($tipo){
            $dados = array();
            $reserva = new Reserva();

            $dados['rsv'] = $reserva->getAllReservas();

            /*Gerar Calendario*/
            $dados['ano'] = '';
            $dados['mes'] = '';
            $data = date('Y-d');
            if(isset($_POST['ano']) and !empty($_POST['ano'])){
                $ano = $_POST['ano'];
                $mes = $_POST['mes'];
                $data = $ano.'-'.$mes;
                $dados['ano'] = $ano;
                $dados['mes'] = $mes;
            }
            $dia1 = date('w', strtotime($data)); //obtem o indice do primento dia do mês.
            $dias = date('t', strtotime($data)); //obtem a quantidade de dias no mês.
            $linhas = ceil(($dia1 + $dias) / 7); //obtem a quantidade de linhas do mês
            $dia1 = -$dia1; //transforma o primeito dia do mês em negativo.
            //obtem a primeira data do caledário
            $data_ini = date('Y-m-d', strtotime($dia1 . ' days', strtotime($data)));
            //obtem a segunda data do calendário.
            $data_fim = date('Y-m-d', strtotime((($dia1 + ($linhas * 7) - 1)) . ' days', strtotime($data)));
            $dados['linhas'] = $linhas;
            $dados['data_ini'] = $data_ini;

            //Trata o dados de reserva
            if(isset($_POST['dia']) and !empty($_POST['dia'])){
                $dia = $_POST['dia'];
                $hora = $_POST['hora'];
                $qt = $_POST['qtConvidados'];
                $pessoa = $_POST['nomes'];
                $id = $_SESSION['usuario']['id'];
                

                $dados['retornoReserva'] = $reserva->criarReserva($dia, $hora, $qt, $pessoa, $id, $tipo);
            }

            $this->loadTemplate('confreserva', $dados);
        }
    }

?>