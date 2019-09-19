<?php 
    require "config.php";

    $id = 0;
    if(isset($_GET["id"]) && empty($_GET["id"]) == false){
        $id = addslashes($_GET["id"]);
    }

    if(isset($_POST["nome"]) && empty($_POST["nome"] == false)){
        $nome = addslashes($_POST["nome"]);
        $email = addslashes($_POST["email"]);
        $data_nascimento = addslashes($_POST["data_nascimento"]);
        $faixa_salarial = addslashes($_POST["faixa_salarial"]);

        $sql = "UPDATE usuarios SET nome = '$nome', email = '$email', data_nascimento = '$data_nascimento', faixa_salarial = '$faixa_salarial' WHERE id = '$id'";
        try{
            $sql = $pdo->query($sql);
            header("Location: index.php");
        }catch(Exception $e){
            echo "alert('Erro')";
        }
    }
    $sql = "SELECT * FROM usuarios WHERE id = '$id'";
    $sql = $pdo->query($sql);
    if($sql->rowCount() > 0){
        $dado = $sql->fetch();
        $nome = $dado["nome"];
        $email = $dado["email"];
        $data_nascimento = $dado["data_nascimento"];
        $faixa_salarial = $dado["faixa_salarial"];
    }else{
        header("Location: index.php");
    }
?>

<form method="POST">
    <label>Nome: </label><br/>
    <input type="text" name="nome" id="nome" value="<?php echo $nome; ?>" /><br/><br/>
    <label>E-mail: </label><br/>
    <input type="text" name="email" id="email" value="<?php echo $email; ?>" /><br/><br/>
    <label>Data de Nascimento: </label><br/>
    <input type="date" name="data_nascimento" id="data_nascimento" value="<?php echo $data_nascimento; ?>" /><br/><br/>
    <select id="faixa_salarial" name="faixa_salarial">
        <option value="1" <?php if($faixa_salarial == 1) echo "selected"; ?>>1</option>
        <option value="2" <?php if($faixa_salarial == 2) echo "selected"; ?>>2</option>
        <option value="3" <?php if($faixa_salarial == 3) echo "selected"; ?>>3</option>
    </select><br><br>
    <input type="submit" value="Atualizar" />
</form>
