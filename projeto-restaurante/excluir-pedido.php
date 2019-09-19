<?php 
    require 'config.php';
    require 'pedidos.class.php';
    $pedidos = new Pedidos();

    if(isset($_GET['id']) && !empty($_GET['id'])){
        $id = addslashes($_GET['id']);
        $res = $pedidos->excluir($id);
    }
    header('Location: index.php?statusPedido=excluído');
?>