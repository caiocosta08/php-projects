<?php 

    $dsn = 'mysql:dbname=c3webc33_usuarios;host=br548.hostgator.com.br';
    $dbuser = 'c3webc33_admin';
    $dbpass = 'caue3101';
    
    try{
        $pdo = new PDO($dsn, $dbuser, $dbpass);
    }catch(PDOException $e){
        echo 'Erro: '.$e;
    }
?>