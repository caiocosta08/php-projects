<?php 
    require 'config.php';
    require 'pedidos.class.php';
    $pedidos = new Pedidos();

    $json = file_get_contents('php://input');
    $obj = json_decode($json, true);
    $id_pedido = $obj['id_pedido'];
    $valor = $obj['valor'];

    if($id_pedido){
        $res = $pedidos->finalizarPedido($id_pedido);
        echo 'pedido-finalizado';
    }else{
        echo 'Erro - '.$obj['id_pedido'];
    }
?>