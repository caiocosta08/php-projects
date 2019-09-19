<?php 
    require 'assets/components/header.php';
    require 'usuarios.class.php';
    require 'posts.class.php';
    $usuarios = new Usuarios();
    $posts = new Posts();
    if(isset($_GET['id']) && !empty($_GET['id'])){
        $id = addslashes($_GET['id']);
        $postagens = $posts->getInfo($id);
    }
?> 
    <hr>
    <div class="container">
        <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
                <?php 
                    if($postagens){
                ?>
            <div class="col-md-6 px-0">
                <h1 class="display-4 font-italic"><?php echo $postagens['titulo']; ?></h1>
                <p class="lead my-3"><?php echo $postagens['descricao']; ?></p>
            </div>
            <?php 
                    }
                ?>
        </div>
        <div class="row">
            <div class="col-sm align-items-self">
                <?php 
                    if($postagens){
                ?>
                    <h2><?php echo $postagens['titulo'];?></h2>
                    <hr>         
                    <h6>Autor: <?php echo $postagens['autor'].' - '.$postagens['data'];?> </h6><br>
                    <p><?php echo $postagens['corpo']; ?></p>
                <?php 
                    }
                ?>
            </div>
        </div>
        
    </div>    

    


