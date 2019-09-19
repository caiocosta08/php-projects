<?php 

    require 'contato.class.php';
    $contato = new Contato();

    $json = file_get_contents('php://input');
    $obj = json_decode($json, true);
    $nome = $obj['nome'];
    $email = $obj['email'];
    $res = $contato->adicionarContato($email, $nome);
    echo $res;

?>