<?php 

    require 'contato.class.php';
    $contato = new Contato();

    if(isset($_POST['nome']) && !empty($_POST['nome'])){
        
        $nome = addslashes($_POST['nome']);
        $email = addslashes($_POST['email']);
        
        $res = $contato->adicionar($email, $nome);
        if($res) header('Location: index.php');
        else '<script type="text/javascript"> alert("Erro."); </script>';
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
    <title>Crud Contatos</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <h1>Adicionar contato</h1>
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
                    <input class="btn btn-primary" type="submit" value="Adicionar">
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="assets/js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>