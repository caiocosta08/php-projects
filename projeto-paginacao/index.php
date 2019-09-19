<?php 

    $dsn = 'mysql:dbname=projeto_paginacao;host=localhost';
    $dbuser = 'root';
    $dbpass = '';
    $pdo = new PDO($dsn, $dbuser, $dbpass);
    $total = 0;
    $sql = "SELECT COUNT(*) as c FROM posts";
    $sql = $pdo->prepare($sql);
    $sql->execute();
    $sql = $sql->fetch();
    $total = $sql['c'];
    $paginas = $total / 10;
    
    /*
        1-Calcular total de páginas
        2-Definir $p
        3-Fazer a query com LIMIT
    */ 

    $pg = 1;
    if(isset($_GET['p']) && !empty($_GET['p'])){
        $pg = addslashes($_GET['p']);
    }
    $p = ($pg - 1) * 10;
    $qt_por_pagina = 10;
    $sql = "SELECT * FROM posts LIMIT $p, $qt_por_pagina";
    $sql = $pdo->prepare($sql);
    $sql->execute();
    
    if($sql->rowCount() > 0){
        foreach ($sql->fetchAll() as $item) {
            echo $item['id'].' - '.$item['titulo'].'<br>';
        }
    }
    echo '<hr>';

    for($q=0; $q<$paginas; $q++){
        echo '<a href="./?p='.($q+1).'">['.($q+1).']</a>';
    }

?>