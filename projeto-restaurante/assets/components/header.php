<?php 
    require 'config.php';
    /*if(isset($_SESSION['blogCaioCosta']['nome']) && !empty(isset($_SESSION['blogCaioCosta']['nome']))){
        $usuario = $_SESSION['blogCaioCosta']['nome'];

    }else{
        $usuario = '';
    }*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/6b3ff05ce5.js"></script>
    <link rel="stylesheet" href="assets/css/style.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Restaurante</title>
</head>
<body style="    background-image: radial-gradient(transparent, #d7edff);">

<div class="container-fluid">
<nav class="navbar navbar-expand-lg navbar-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php"><i class="fas fa-home"></i> Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fas fa-clipboard-list"></i> Pedidos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fas fa-shopping-cart"></i> Produtos</a>
      </li>
    </ul>
  </div>
</nav>
</div>