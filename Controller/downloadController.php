<?php 

    class downloadController extends Controller {

        public function index(){
            $dados = array();
            $download = new Download();

            $dados['retorno'] = $download->getDocumentos();

            $this->loadTemplate('download', $dados);
        }
    }

?>