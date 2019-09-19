<?php 
    require 'contato.class.php';
    $contato = new Contato();

    if(isset($_GET['id']) && !empty($_GET['id'])){
        $res = $contato->excluir($_GET['id']);
    }
    header('Location: index.php');
?>