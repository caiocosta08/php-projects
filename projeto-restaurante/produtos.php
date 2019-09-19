<?php require 'assets/components/header.php'; ?>
    <div class="container">
        <div class="row justify-content-center">
            <h1>Produtos</h1>
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
                        $lista = $pedidos->getAll();
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

    <?php require 'assets/components/footer.php'; ?>
