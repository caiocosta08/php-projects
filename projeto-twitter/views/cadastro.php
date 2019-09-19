<h2>Cadastro</h2>
<form method="post">
    Nome:<br>
    <input type="text" name="nome"><br><br>
    E-mail:<br>
    <input type="text" name="email"><br><br>
    Senha:<br>
    <input type="password" name="senha"><br><br>
    <input type="submit" value="Cadastrar">
    <a href="/projetos/projeto-twitter/login">Voltar</a><br><br>
    <?php
        if(!empty($aviso)){
            echo $aviso;
        }
    ?>
</form>