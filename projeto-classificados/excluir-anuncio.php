<?php 
    require 'config.php';
    if(!isset($_SESSION['cLogin']) || empty($_SESSION['cLogin'])){
        header('Location: index.php');
        exit;
    }
    require 'classes/anuncios.class.php';
    $a = new Anuncios();
    $id = $_SESSION['cLogin']['id'];

    if(isset($_GET['id']) && !empty($_GET['id']) && isset($_SESSION['cLogin'])){
        $id_anuncio = $_GET['id'];
        $a->excluirAnuncio($id, $id_anuncio);
        header('Location: meus-anuncios.php');   
    }  
?>