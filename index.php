<link rel="stylesheet" href="css/style.css" type="text/css">
<?php 

    session_start();
    require 'config.php';
    
    spl_autoload_register(function($classe){
        
        if (file_exists('Controller/'.$classe.'.php'))
        {
            require 'Controller/'.$classe.'.php';
        }
        else if(file_exists('Core/'.$classe.'.php'))
        {
            require 'Core/'.$classe.'.php';
        }
        else if(file_exists('Model/'.$classe.'.php'))
        {
            require 'Model/'.$classe.'.php';
        }
    });

    $core = new Core();
    $core->start();

?>

