<?php 
    
    require 'config.php';
    if(isset($_GET["nome"]) && empty($_GET["nome"]) == false){
        $nome = addslashes($_POST["nome"]);
        $email = addslashes($_POST["email"]);
        $senha = md5(addslashes($_POST["senha"]));
        $data_nascimento = addslashes($_POST["data_nascimento"]);
        $faixa_salarial = addslashes($_POST["faixa_salarial"]);

        $sql = "INSERT INTO usuarios SET nome = '$nome', email = '$email', senha = '$senha', data_nascimento = '$data_nascimento', faixa_salarial = '$faixa_salarial'";

        try{
            $sql = $pdo->query($sql);
            Header("location: form-add.php");
            //echo "alert('Usuário" . $sql->lastInsertId() . " inserido com sucesso.')";
            echo "alert('Usuário inserido com sucesso.')";
        }catch(Exception $e){
            echo "Erro: ".$e->getMessage();
        }
    }else{
        header("Location: index.php");
    }

?>