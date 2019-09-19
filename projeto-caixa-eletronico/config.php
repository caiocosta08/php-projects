<?php 
    $dsn = 'mysql:dbname=projeto_caixaeletronico;host=localhost';
    $dbuser = 'root';
    $dbpass = '';

    try{
        $pdo = new PDO($dsn, $dbuser, $dbpass);
    }catch(PDOException $e){
        echo 'Erro: ' . $e->getMessage();
        exit;
    }
?>