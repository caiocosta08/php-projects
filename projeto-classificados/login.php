<!-- Importa navbar-->
<?php require 'assets/components/navbar.php'; ?>
<div class="container">
    <h1>Login</h1>
    <?php 
        require 'classes/usuarios.class.php'; 

        $u = new Usuarios();
        if(isset($_POST['email']) && !empty($_POST['email'])){
            $email = addslashes($_POST['email']);
            $senha = addslashes($_POST['senha']);

            if(!empty($email) && !empty($senha)){
                if($u->fazerLogin($email, $senha)){
                    //Redirecionar para index.php
                    ?>
                    <script type="text/javascript">window.location.href='./index.php'</script>
                    <?php
                }else{
                    ?>
                    <div class="alert alert-danger">
                        Login ou senha incorretos. Tente novamente.
                    </div>
                    <?php
                }
            }else{
                ?>
                <div class="alert alert-warning"> Preencha todos os campos</div>
                <?php
            }
        }
    ?>
    <div class="row justify-content-center">
    <form class="col-sm" method="POST">
        <div class="col form-group">
            <label for="email">E-mail:</label>
            <input type="text" name="email" id="email" class="form-control">
        </div>
        <div class="col form-group">
            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha" class="form-control">
        </div>
        <input class="btn btn-primary" type="submit" value="Entrar">
    </form>

    </div>
</div>
<!-- Importa footer-->
<?php require 'assets/components/footer.php'; ?>