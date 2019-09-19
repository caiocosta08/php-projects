<?php 

    require 'usuarios.php';
    $usuarios = new Usuarios();
    $usuarios->atualizar('Caioba - Caioba', 'caioba@caioba.com', '123456', 3);
    print_r($usuarios->selecionar(3));

?>