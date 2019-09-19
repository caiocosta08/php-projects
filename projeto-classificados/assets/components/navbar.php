<?php require 'config.php'; ?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classificados</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/6b3ff05ce5.js"></script>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="margin-bottom: 10px;">
    <a class="navbar-brand" href="./">Classificados</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
            <?php 
                if(isset($_SESSION['cLogin']) && !empty($_SESSION['cLogin'])){
            ?>
            <li class="nav-item active">
                <a class="nav-link" href="index.php"><i class="fas fa-home"></i> Home <span class="sr-only">(current)</span></a>
            </li>
            
            <?php
                }
            ?>
        </ul>
        <span class="navbar-text">
            <ul class="navbar-nav mr-auto">
                <?php 
                    if(isset($_SESSION['cLogin']) && !empty($_SESSION['cLogin'])){
                ?>
                    <li class="nav-item">
                        <!-- <a class="nav-link" href="meu-perfil.php"><i class="fas fa-user"></i> </a> -->    
                        <a class="nav-link" href="./"><i class="fas fa-user"></i> <?php echo $_SESSION['cLogin']['nome']; ?></a>
                    </li>  
                    <li class="nav-item">
                        <a class="nav-link" href="meus-anuncios.php"><i class="fas fa-bullhorn"></i> Meus anúncios</span></a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="sair.php"><i class="fas fa-sign-out-alt"></i> Sair</a>
                    </li>
                <?php    
                    }else{
                ?>
                    <li class="nav-item">
                        <a class="nav-link" href="cadastro.php">Cadastre-se</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                <?php
                    }
                ?>
                
            </ul>
        </span>
    </div>
</nav>