<?php

    class Controller {

        public function loadTemplate($view, $viewData=array()){
            require 'View/template.php';
        }

        public function loadViewInTemplate($view, $viewData=array()){
            extract($viewData);
            require 'View/'.$view.'.php';
        }

        public function loadView($view, $viewData=array()){
            extract($viewData);
            require 'View/'.$view.'.php';
        }
    }

?>