<?php 
    require 'contato.class.php';
    $contato = new Contato();
    $json = file_get_contents('php://input');
    $obj = json_decode($json, true);

    $id = $obj['id'];
    $res = $contato->excluir($id);
    echo $res;
?>