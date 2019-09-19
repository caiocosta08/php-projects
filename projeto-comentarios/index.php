<?php 

    $dsn = "mysql:dbname=projeto_comentarios;host=localhost";
    $dbuser = 'root';
    $dbpass = '';

    try{
        $pdo = new PDO($dsn, $dbuser, $dbpass);
    }catch(PDOException $e){
        echo $e->getMessage();
    }

    if(isset($_POST['msg']) && !empty($_POST['msg'])){
        $nome = addslashes($_POST['nome']);
        $msg = addslashes($_POST['msg']);
        //$data = new DateTime('now');
        $sql = "INSERT INTO mensagens SET nome='$nome', data_msg=NOW(), msg='$msg'";
        $sql = $pdo->query($sql);
    }

?>

<fieldset>
    <form method="POST">
        Name:<br>
        <input type="text" name="nome" /><br><br>
        Mensagem:<br>
        <textarea name="msg"> </textarea><br><br>
        <input type="submit" value="Enviar mensagem" />        
</fieldset><br><br>
<?php 
    $sql = 'SELECT * FROM mensagens ORDER BY data_msg DESC';
    $sql = $pdo->query($sql);
    if($sql->rowCount() > 0){
        foreach($sql->fetchAll() as $mensagens){
            echo '<strong>' . $mensagens['nome'] . '</strong><br>';
            echo $mensagens["msg"] . '<hr><br>';
        }
    }else{
        echo "Não há mensagens.";
    }
?>