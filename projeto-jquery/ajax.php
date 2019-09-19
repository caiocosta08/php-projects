<?php 
    $dsn ='mysql:dbname=projeto-login;host=localhost';
    $dbuser = 'root';
    $dbpass = '';
    
    $usuario = addslashes($_POST['usuario']);
    $senha = md5($_POST['senha']);

    try{
        $pdo = new PDO($dsn, $dbuser, $dbpass);
        $sql = "SELECT * FROM usuarios WHERE email='$usuario' AND senha='$senha'";
        $sql = $pdo->query($sql);
        if($sql->rowCount() > 0){
            //echo json_encode("Usuário logado");
            echo true;
        }else{
            //echo json_encode('Nenhum usuário conectado');
            echo false;
        }
    }catch(PDOException $e){
        echo 'Erro: '. $e->getMessage();
        exit;
    }
    //echo json_encode($_POST);
?>