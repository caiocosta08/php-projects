<?php 
    
    $dsn = 'mysql:dbname=projeto_online;host=localhost';
    $dbuser = 'root';
    $dbpass = '';
    try{
        $pdo = new PDO($dsn, $dbuser, $dbpass);
    }catch(PDOException $e){
        echo 'Erro: '.$e->getMessage();
    }
    
    date_default_timezone_set('America/Sao_Paulo');
    $ip = $_SERVER['REMOTE_ADDR']; 
    $hora = date('H:i:s');
    $sql = "INSERT INTO acessos SET ip=?, hora=?";
    $sql = $pdo->prepare($sql);
    $sql->execute(array($ip, $hora));

    $sql = "DELETE FROM acessos WHERE hora < ?";
    $sql = $pdo->prepare($sql);
    $sql->execute(array(date('H:i:s', strtotime("-5 minutes"))));

    $sql = "SELECT * FROM acessos WHERE hora > ? GROUP BY ip";
    $sql = $pdo->prepare($sql);
    $sql->execute(array(date('H:i:s', strtotime("-5 minutes"))));
    echo 'Usuários online: '.$sql->rowCount();    
?>