<?php require 'assets/components/header.php'; ?>
<?php 
    require 'pedidos.class.php';
    $produtos = new Produtos();
?>  
    <div class="container">
        <div class="row justify-content-center">
            <h1>Adicionar Produto</h1>
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

<?php require 'assets/components/footer.php'; ?>