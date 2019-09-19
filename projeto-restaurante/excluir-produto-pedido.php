<?php 
    require 'config.php';
    require 'pedidos.class.php';
    $pedidos = new Pedidos();

    if(isset($_GET['id']) && !empty($_GET['id'])){
        $id = addslashes($_GET['id']);
        $res = $pedidos->excluirProdutoPedido($id);
    }
    $var = "<script>javascript:history.back(-2)</script>";
    echo $var;
?>