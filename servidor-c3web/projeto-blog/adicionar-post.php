<?php require 'assets/components/header.php'; ?>
<?php 
    require 'posts.class.php';
    $p = new Posts();

    if(isset($_POST['titulo']) && !empty($_POST['titulo'])){
        $autor = $_SESSION['blogCaioCosta']['nome'];
        $titulo = addslashes($_POST['titulo']);
        $descricao = addslashes($_POST['descricao']);
        $corpo = addslashes($_POST['corpo']);
        $c = $p->adicionarPost($titulo, $descricao, $corpo, $autor);
        if($c){
            header('Location: index.php');
        }else{
            echo 'Erro';
        }
    }
?>

<div class='row justify-content-center align-items-center'>
<form method="POST" class="form-signin col-sm-4">
        <h1 class="h3 mb-3 font-weight-normal">Adicionar Post</h1>
        <div class="form-group">
        <label for="titulo" class="sr-only">Título</label>
        <input style="margin: 3px; width: 98%" type="text" name="titulo" id="titulo" class="form-control" placeholder="Título" required autofocus>
        </div>
        <div class="form-group">
        <label for="descricao" class="sr-only">Endereço de email</label>
        <input style="margin: 3px; width: 98%" type="text" name="descricao" id="descricao" class="form-control" placeholder="Descrição" required autofocus>
        </div>
        <div class="form-group">
        <label for="corpo" class="sr-only">Corpo</label>
        <textarea style="margin: 3px; width: 98%" name="corpo" id="corpo" cols="30" rows="10" placeholder="Corpo do Post"></textarea>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Adicionar Post</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2019</p>
    </form>
</div>
<?php require 'assets/components/footer.php'; ?>
