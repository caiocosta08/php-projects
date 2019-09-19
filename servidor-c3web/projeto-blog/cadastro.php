<?php require 'assets/components/header.php'; ?>
<?php 
    require 'usuarios.class.php';
    $u = new Usuarios();

    if(isset($_POST['nome']) && !empty($_POST['nome'])){
        $nome = addslashes($_POST['nome']);
        $email = addslashes($_POST['email']);
        $senha = md5($_POST['senha']);
        $c = $u->adicionarUsuario($email, $nome, $senha);
        if($c){
            header('Location: index.php');
        }else{
            echo 'Erro';
        }
    }
?>

<div class='row justify-content-center align-items-center'>
<form method="POST" class="form-signin col-sm-4">
      <h1 class="h3 mb-3 font-weight-normal">Faça seu cadastro</h1>
      <div class="form-group">
      <label for="nome" class="sr-only">Nome</label>
      <input style="margin: 3px; width: 98%" type="nome" name="nome" id="nome" class="form-control" placeholder="Nome" required autofocus>
      </div>
      <div class="form-group">
      <label for="email" class="sr-only">Endereço de email</label>
      <input style="margin: 3px; width: 98%" type="email" name="email" id="email" class="form-control" placeholder="E-mail" required autofocus>
      </div>
      <div class="form-group">
      <label for="password" class="sr-only">Senha</label>
      <input style="margin: 3px; width: 98%" type="password" name="senha" id="password" class="form-control" placeholder="Senha" required>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Cadastrar</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2019</p>
    </form>
</div>
<?php require 'assets/components/footer.php'; ?>
