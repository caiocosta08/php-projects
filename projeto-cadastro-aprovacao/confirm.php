<?php 

    require 'config.php';
    $h = $_GET['h'];
    if(!empty($h)){
        $sql = "UPDATE usuarios SET status=1 WHERE MD5(id) = '$h'";
        $sql = $pdo->query($sql);
        echo 'E-mail confirmado com sucesso.';
    }
?>