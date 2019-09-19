<?php 
    require 'contato.class.php';
    $contato = new Contato();
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
            <h1>Contatos</h1>
        </div>
        <a class="btn btn-primary" href="adicionar.php">Adicionar</a>
        <div class="row justify-content-center">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $lista = $contato->getAll();
                        foreach($lista as $item){
                            echo '<tr>';
                            echo '<td>' .$item['id'].'</td>';
                            echo '<td>' .$item['nome'].'</td>';
                            echo '<td>' .$item['email'].'</td>';
                            echo '<td><a href="editar.php?id='.$item['id'].'">Editar </a><a href="excluir.php?id='.$item['id'].'">Excluir</a></td>';
                            echo '</tr>';
                        }
                    ?>
                </tbody>
            </table>
        </div>

    </div>    

    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery-3.4.1.min.js"></script>
</body>
</html>
