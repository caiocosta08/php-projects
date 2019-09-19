<?php 
    session_start();
    if(basename($_SERVER["PHP_SELF"])=='config.php'){
        die("</script>\n<script>window.location=('index.php')</script>");
    }
    global $pdo;

    $dsn = 'mysql:dbname=projeto_restaurante;host=localhost';
    $dbuser = 'root';
    $dbpass = '';

    try {
        $pdo = new PDO($dsn, $dbuser, $dbpass);
    } catch (PDOException $e) {
        echo 'Erro: '.$e->getMessage();
    }
?>