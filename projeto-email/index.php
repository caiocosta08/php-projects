<?php 

    if(isset($_POST['nome']) && !empty($_POST['nome'])){
        
        $nome = addslashes($_POST['nome']);
        $email = addslashes($_POST['email']);
        $mensagem = addslashes($_POST['mensagem']);

        $para = 'caiocostaee@gmail.com';
        $assunto = 'Pergunta do Contato';
        $corpo = 'Nome: '.$nome.' - E-mail: '.$email.' - Mensagem: '.$mensagem;
        $cabecalho = 'From: Suporte C3WEB <contato@c3web.com.br>'."\r\n"
                    .'Reply-To: '.$email."\r\n"
                    .'X-Mailer: PHP/'.phpversion();
        mail($para, $assunto, $corpo, $cabecalho);
        echo '<h2>E-mail enviado com sucesso.</h2><a href="index.php">Voltar</a>';        
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
    <title>Envio de E-mail</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <h1>Formulário de E-mail</h1>
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
                    <div class="form-group">
                        <label style="color: #495057;">Mensagem:</label>
                        <textarea class="form-control" name="mensagem" cols="30" rows="10" placeholder="Digite sua mensagem"></textarea> 
                    </div>
                    <input class="btn btn-primary" type="submit" value="Enviar e-mail">
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="assets/js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>