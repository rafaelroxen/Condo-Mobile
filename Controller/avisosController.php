<?php

    class avisosController extends Controller {
        
        public function index() {
            $dados = array();
            $aviso = new Avisos();
            
            $dados['avisos'] = $aviso->getAvisos();

            $this->loadTemplate('avisos', $dados);
        }
    }

?>