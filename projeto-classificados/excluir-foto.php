<?php 
    require 'config.php';
    if(!isset($_SESSION['cLogin']) || empty($_SESSION['cLogin'])){
        header('Location: index.php');
        exit;
    }
    require 'classes/anuncios.class.php';
    $a = new Anuncios();
    $id = $_SESSION['cLogin']['id'];
    $id_anuncio = 0;
    if(isset($_GET['id']) && !empty($_GET['id']) && isset($_SESSION['cLogin'])){
        $id_foto = $_GET['id'];
        $id_anuncio = $a->excluirFoto($id_foto);
    }  
    if(isset($id_anuncio)){
        header('Location: editar-anuncio.php?id='.$id_anuncio);
    }else {
        header('Location: meus-anuncios.php');
    }
?>