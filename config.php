<?php
    require 'environment.php';

    global $conn;
    $config = array();

    if(ENVIRONMENT == 'development'){
        define('BASE', 'http://localhost/condominio/');
        $config['BD'] = 'condo_mobile';
        $config['HS'] = 'localhost';
        $config['US'] = 'root';
        $config['PS'] = '';
    }else{
        define('BASE', 'http://www.meusite.com.br');
        $config['BD'] = 'loja2';
        $config['HS'] = 'localhost';
        $config['US'] = 'root';
        $config['PS'] = '';
    }

    try{
        $conn = new PDO('mysql:dbname='.$config['BD'].';host='.$config['HS'], $config['US'], $config['PS']);
    }catch(PDOException $e){
        echo 'Erro de conexão com banco de dados<br />'.$e->getMessage();
    }

?>