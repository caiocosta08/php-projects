<?php 
    
    session_start();

    if(isset($_POST['email']) && empty($_POST['email']) == false){
        $email = addslashes($_POST["email"]);
        $senha = md5(addslashes($_POST["senha"]));

        $dsn = "mysql:dbname=projeto-login;host=localhost";
        $dbuser = "root";
        $dbpass = "";

        try{
            $pdo = new PDO($dsn, $dbuser, $dbpass);

            $sql = "SELECT * FROM usuarios WHERE email='$email' AND senha='$senha'";
            $sql = $pdo->query($sql);
            
            if($sql->rowCount() > 0){

                $usuario = $sql->fetch();
                $_SESSION["id"] = $usuario["id"];
                $_SESSION["email"] = $usuario["email"];
                header("Location: index.php");
            }else{
                print_r($sql->errorInfo());
            }

        }catch(PDOException $e){
            echo $e->getMessage();
        }

    }else{
        
    }

?>

<form method="POST">
    <label>E-mail:</label><br>
    <input type="text" name="email" id="email" /><br><br>
    <label>Senha:</label><br>
    <input type="password" name="senha" id="senha" /><br><br>
    <input type="submit" value="Login" />
</form>