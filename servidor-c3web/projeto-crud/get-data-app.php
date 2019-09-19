<?php 

    require 'contato.class.php';
    $contato = new Contato();

    $json = file_get_contents('php://input');
    $obj = json_decode($json, true);
    $res = $contato->getAll();
    echo json_encode($res);
?>