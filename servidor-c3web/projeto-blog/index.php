<?php 
    require 'assets/components/header.php';
    require 'usuarios.class.php';
    require 'posts.class.php';
    $usuarios = new Usuarios();
    $posts = new Posts();
    $postagens = $posts->getAll();
?> 
    <hr>
    <div class="container">
        <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
            <div class="col-md-6 px-0">
                <h1 class="display-4 font-italic">Título de um post em destaque</h1>
                <p class="lead my-3">Várias linhas formando uma introdução, informando novos leitores rápido e eficientemente sobre o que é mais interessante, neste post.</p>
                <p class="lead mb-0"><a href="#" class="text-white font-weight-bold">Continue lendo...</a></p>
            </div>
        </div>
        <div class="row">
            <div class="col-3-sm justify-content-center align-items-center">
                <h2>Últimos Artigos</h2>
                <hr>
                <?php 
                if($postagens){
                    $postagens = array_reverse($postagens);
                    foreach ($postagens as $p) {
                ?>
                    <a href="<?php echo 'post?id='.$p['id']; ?>"><?php echo $p['titulo']; ?></a><p style="font-size: 11px; color: gray"><?php echo $p['data']; ?></p><br>
                <?php
                    }
                }else{
                ?>
                    <h6>Nenhum artigo publicado.</h6>
                <?php
                }
                ?>
            </div>
            <hr>
            <div class="col-sm align-items-self">
                <?php 
                    if($postagens){
                        foreach ($postagens as $p) {
                ?>
                    <h2><?php echo $p['titulo'];?></h2>
                    <hr>         
                    <h6>Autor: <?php echo $p['autor'].' - '.$p['data'];?> </h6><br>
                    <p><?php echo $p['corpo']; ?></p>
                <?php 
                        }
                    }
                ?>
            </div>
        </div>
        
    </div>    

    


