<?php 

    require 'contato.class.php';
    $contato = new Contato();

    $json = file_get_contents('php://input');
    $obj = json_decode($json, true);
    //echo $obj . " - Nome: ".$obj['nome']." - ID: ".$obj['id'];
    //echo json_encode($obj);
    $id = $obj['id'];
    $nome = $obj['nome'];
    $email = $obj['email'];
    $res = $contato->editar($nome, $id);
    echo json_encode($res);
?>