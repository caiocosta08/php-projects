<?php 
    session_start();
    require 'config.php';
    if(isset($_SESSION['banco']) && !empty($_SESSION['banco'])){
        $id = $_SESSION['banco'];

        $sql = $pdo->prepare('SELECT * FROM contas WHERE id = :id');
        $sql->bindValue(':id', $id);
        $sql->execute();
        if($sql->rowCount() > 0){
            $user = $sql->fetch();
        }else{
            //header('Location: index.php');
            //exit;
        }
    }else{
        header("Location: login.php");
        exit;
    }
?>

<html>
    <head>
        <title>Caixa Eletrônico</title>

    </head>
    <body>
        <h1>Banco do Projeto</h1>
        <?php 
            echo 'Titular: ' . $user['titular'] . '<br>';
            echo 'Agência: ' . $user['agencia'] . ' - Conta: ' . $user['conta'] . '<br>';
            echo 'Saldo: R$' . $user['saldo'] . '<br><br>';
        ?>
        <hr>
        <h3>Movimentação/Extrato</h3>
        <a href="add-transacao.php">Adicionar transação</a><br><br>
        <table border="1" width="400">
            <tr>
                <td>VALOR</td>
                <td>DATA</td>
            </tr>
            <?php 
                $sql = $pdo->prepare('SELECT * FROM historico WHERE id_conta = :idconta');
                $sql->bindValue(':idconta', $id);
                $sql->execute();
                if($sql->rowCount() > 0){
                    foreach($sql->fetchAll() as $item){
                        ?>
                            <tr>
                                <td>
                                    <?php if($item['tipo'] == '0'): ?>
                                    <font color="green">R$<?php echo $item['valor']; ?> </font>
                                    <?php else: ?>
                                    <font color='red'>- R$<?php echo $item['valor']; ?> </font>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo date('d/m/Y H:i', strtotime($item['data_operacao'])); ?></td>
                            </tr>
                        <?php
                    }
                } ?>
        </table>
        <br><br>

        <a href="logout.php">Sair</a>
    </body>
</html>