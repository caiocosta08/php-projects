<?php 
    require 'config.php';
    if(isset($_SESSION['blogCaioCosta']['nome']) && !empty(isset($_SESSION['blogCaioCosta']['nome']))){
        $usuario = $_SESSION['blogCaioCosta']['nome'];

    }else{
        $usuario = '';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog</title>
</head>
<body>
<!-- Como um span -->
<!-- <nav class="navbar navbar-light bg-light">
  <span class="navbar-brand mb-0 h1">Blog</span>
</nav>
-->
<div class="container">
<header class="blog-header py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
          <div class="col-4 pt-1">
            <a class="text-muted" href="<?php if(!$usuario) echo 'login.php'; ?>"><?php if($usuario) echo $usuario; else echo 'Faça seu login'; ?></a>
          </div>
          <div class="col-4 text-center">
            <a class="blog-header-logo text-dark h2" href="index.php">Blog do Caio</a>
          </div>
          <div class="col-4 d-flex justify-content-end align-items-center">
            <a class="text-muted" href="#">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mx-3"><circle cx="10.5" cy="10.5" r="7.5"></circle><line x1="21" y1="21" x2="15.8" y2="15.8"></line></svg>
            </a>
            <a class="btn btn-sm btn-outline-secondary" href="<?php if(!$usuario) echo 'cadastro.php'; else echo 'adicionar-post.php'; ?>"><?php if(!$usuario) echo 'Cadastre-se'; else echo 'Adicionar Post'; ?></a>
          </div>
        </div>
      </header>
</div>