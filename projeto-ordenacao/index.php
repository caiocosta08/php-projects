<?php 

    $dsn = "mysql:dbname=projeto_ordenacao;host=localhost";
    $dbuser = "root";
    $dbpass = "";

    try{    
        $pdo = new PDO($dsn, $dbuser, $dbpass);

    }catch(PDOException $e){
        echo "Erro: " . $e->getMessage();
    }
    print_r($_GET);
    if(isset($_GET["ordem"]) && empty($_GET["ordem"]) == false){
        $ordem = addslashes($_GET["ordem"]);
        $sql = "SELECT * FROM usuarios ORDER BY $ordem";      
    }else{
        $ordem = '';
        $sql = "SELECT * FROM usuarios";
    }

?>
<form method="GET">
    <select name="ordem" onchange="this.form.submit()">
        <option value=''>Ordenar por</option>
        <option value="nome" <?php if($ordem == 'nome') echo 'selected'; ?>>Ordenar por nome</option>
        <option value="idade" <?php if($ordem == 'idade') echo 'selected'; ?>>Ordenar por idade</option>
    </select>
</form>
<table border="0" width="400">
    <tr>
        <td>NOME</td>
        <td>IDADE</td>
    </tr>
    <?php 

        $sql = $pdo->query($sql);
        print_r($sql);
        if($sql->rowCount() > 0){
            foreach($sql->fetchAll() as $usuario){
                echo "<tr>";
                echo "<td>" . $usuario["nome"] . "</td>";
                echo "<td>" . $usuario["idade"] . "</td>";
                echo "</tr>";
            }
        }
    ?>
</table>