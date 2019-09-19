<?php 

    require 'config.php';
    require 'classes/carros.class.php';
    require 'classes/reservas.class.php';
    
    $reservas = new Reservas($pdo);
    $carros = new Carros($pdo);
?>
    <h1>Reservas</h1>
    <a href="reservar.php">Adicionar Reserva</a>
    <br><br>
    <form method="GET">
        <select name="ano">
            <?php for($q=date('Y');$q>=2000;$q--){
                echo '<option>';
                echo $q;
                echo '</option>';
            }  ?>
        </select>
        <select name="mes">
            <option value="01">01</option>
            <option value="02">02</option>
            <option value="03">03</option>
            <option value="04">04</option>
            <option value="05">05</option>
            <option value="06">06</option>
            <option value="07">07</option>
            <option value="08">08</option>
            <option value="09">09</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
        </select>
        <input type="submit" value="Mostrar">
    </form>
<?php

    if(empty($_GET['ano'])){
        exit;
    }

    $data = $_GET['ano'].'-'.$_GET['mes'];
    $dia1 = date('w', strtotime($data));
    $dias = date('t', strtotime($data));
    $linhas = ceil(($dia1+$dias)/7);
    $dia1 = -$dia1;
    $data_inicio = date('Y-m-d', strtotime($dia1.' days', strtotime($data)));
    $data_fim = date('Y-m-d', strtotime(($dia1 + ($linhas * 7) - 1).' days', strtotime($data)));

    $lista = $reservas->getReservas($data_inicio, $data_fim);
    foreach($lista as $dado){
        $data1 = date('d/m/Y', strtotime($dado['data_inicio']));
        $data2 = date('d/m/Y', strtotime($dado['data_fim']));
        echo '<p>'
        .'Reservado por: '.$dado['pessoa']
        .' - Produto: '.$dado['id_carro']
        .' - Entre '.$data1.' e '.$data2
        .'</p>';
    }
?>

<hr>
<?php 
    require 'calendario.php'; 
?>