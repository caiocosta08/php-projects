<?php 

    require 'contato.class.php';
    $contato = new Contato();

    if(isset($_POST['nome']) && !empty($_POST['nome'])){
        
        $id = addslashes($_POST['id']);
        $nome = addslashes($_POST['nome']);
        $email = addslashes($_POST['email']);
        
        $res = $contato->editar($nome, $id);
        header('Location: index.php');
    }

    if(isset($_GET['id']) && !empty($_GET['id'])){
        $id = addslashes($_GET['id']);
        $info = $contato->getInfo($id);
        $nome = $info['nome'];
        $email = $info['email'];
    }else{
        header('Location: index.php');
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
            <h1>Editar contato</h1>
        </div>

        <div class="row justify-content-center">

            <div class="col-6">
                <form method="POST">
                    <div class="form-group">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <label style="color: #495057;">Nome:</label>
                        <input class="form-control" type="text" name="nome" value="<?php echo $nome; ?>">
                    </div>
                    <div class="form-group">
                        <label style="color: #495057;">E-mail:</label>
                        <input disabled class="form-control" type="text" name="email" value="<?php echo $email; ?>">
                    </div>
                    <input class="btn btn-primary" type="submit" value="Editar">
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="assets/js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>