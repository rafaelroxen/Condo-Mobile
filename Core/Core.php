<?php

    class Core {

        public function start(){
            
            $url = '/';
            $parametros = array();

            if(isset($_GET['url'])){ 
                $url .= $_GET['url'];
            }

            if(!empty($url) and $url != '/'){
                $url = explode('/', $url);
                array_shift($url);
                $currentController = $url[0].'Controller';
                array_shift($url);

                if(!empty($url) and $url[0] != '/'){
                    $currentAction = $url[0];
                    array_shift($url);
                }else{
                    $currentAction = 'index';
                }

                if(count($url) > 0){
                    $parametros = $url;
                }
            }else{
                $currentController = 'homeController';
                $currentAction = 'index';
            }

            $controller = new $currentController();
            call_user_func_array(array($controller, $currentAction), $parametros);
        }
    }

?>