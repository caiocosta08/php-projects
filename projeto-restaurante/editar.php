<?php require 'assets/components/header.php'; ?>
    <div class="container">
        <div class="row justify-content-center">
            <h1>Editar pedidos</h1>
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
    <?php require 'assets/components/footer.php'; ?>