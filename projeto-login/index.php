<?php 

    session_start();

    if(isset($_SESSION["id"]) && empty($_SESSION["id"]) == false){
        echo "<h1>Área restrita</h1>";
    }else{
        header("Location: login.php");
    }

?>