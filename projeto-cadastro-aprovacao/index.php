<?php 

    require 'config.php';

    if(isset($_POST['nome']) && !empty($_POST['nome'])){
        
        $nome = addslashes($_POST['nome']);
        $email = addslashes($_POST['email']);

        $sql = "INSERT INTO usuarios SET nome='$nome', email='$email', status=0";
        $pdo->query($sql);
        $id = $pdo->lastInsertId();

        $md5 = md5($id);
        $link = "http://www.c3web.com.br/projeto-cadastro-aprovacao/confirm.php?h=".$md5;

        $assunto = 'Confirme seu cadastro';
        $mensagem = "Clique no link para confirmar seu cadastro:\n\n".$link;
        $corpo = 'Nome: '.$nome.' - E-mail: '.$email.' - Mensagem: '.$mensagem;
        $cabecalho = 'From: Suporte C3WEB <contato@c3web.com.br>'."\r\n"
                    .'X-Mailer: PHP/'.phpversion();
        mail($email, $assunto, $corpo, $cabecalho);
        echo '<h2>Confirme seu cadastro.</h2>';        
        exit;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <title>Cadastro com Aprovação</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <h1>Cadastro com Aprovação</h1>
        </div>

        <div class="row justify-content-center">

            <div class="col-6">
                <form method="POST">
                    <div class="form-group">
                        <label style="color: #495057;">Nome:</label>
                        <input class="form-control" type="text" name="nome" placeholder="Nome">
                    </div>
                    <div class="form-group">
                        <label style="color: #495057;">E-mail:</label>
                        <input class="form-control" type="text" name="email" placeholder="E-mail">
                    </div>
                    <input class="btn btn-primary" type="submit" value="Cadastrar">
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="assets/js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>