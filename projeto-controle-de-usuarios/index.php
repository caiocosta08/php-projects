<?php 
    require 'config.php';
?>
<a href="form-add.php">Adicionar Novo Usuário</a>
<table border="0" width="100%">
    <tr>
        <th>ID</th>
        <th>NOME</th>
        <th>E-MAIL</th>
        <th>DATA DE NASCIMENTO</th>
        <th>FAIXA SALARIAL</th>
    </tr>

    <?php 
        $sql = "SELECT * FROM usuarios";
        $sql = $pdo->query($sql);

        if($sql->rowCount() > 0){
            foreach($sql->fetchAll() as $usuario){
                echo "<tr>";
                echo "<th>".$usuario["id"]."</th>";
                echo "<th>".$usuario["nome"]."</th>";
                echo "<th>".$usuario["email"]."</th>";
                echo "<th>".$usuario["data_nascimento"]."</th>";
                echo "<th>".$usuario["faixa_salarial"]."</th>";
                echo "<th><a href='editar.php?id=".$usuario["id"]."'>Editar</a></th>";
                echo "<th><a href='excluir.php?id=".$usuario["id"]."'>Excluir</a></th>";
                echo "</tr>";
           }
        }else{
            echo "alert('nenhum usuario encontrado')";
        }   
    ?>

</table>