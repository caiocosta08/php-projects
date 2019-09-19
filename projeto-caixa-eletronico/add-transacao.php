<?php 
    session_start();
    require 'config.php';
    if(isset($_POST['tipo'])){
        $id = $_SESSION['banco'];
        $tipo = $_POST['tipo'];
        $valor = str_replace(",", ".", $_POST['valor']);
        $valor = floatval($valor);
        
        $sql = $pdo->prepare("INSERT INTO historico SET id_conta = '$id', tipo = '$tipo', valor = '$valor', data_operacao = NOW()");
        $sql->execute();
        
        if($tipo == '0'){
            //Depósito
            $sql = $pdo->prepare("UPDATE contas SET saldo = saldo + '$valor' WHERE id = '$id'");
            $sql->execute();
        }else{
            //Saque
            $sql = $pdo->prepare("UPDATE contas SET saldo = saldo -'$valor' WHERE id = '$id'");
            $sql->execute();
        }
        
        echo 'alert("Transação efetuada com sucesso.")';
        header('Location: index.php');
        exit;
    }else{
        //echo 'alert("erro")';
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Caixa Eletrônico</title>
    </head>
    <body>
        <form method="POST">
            <label>Valor da transação:</label>
            <input type="text" name="valor" pattern="[0-9.,]{1,}"/>
            <select name="tipo">
                <option value="0">Deposito</option>
                <option value="1">Saque</option>
            </select>
            <input type="submit" value="Adicionar">
        </form>
        <a href="index.php">Voltar</a>
    </body>
</html>
