<?php 

    
    
    /*
    echo 'Primeiro dia: '. $dia1.'<br>';
    echo 'Quantidade de Dias: '. $dias.'<br>';
    echo 'Linhas: '.$linhas.'<br>';
    echo 'Data início: '.$data_inicio.'<br>';
    echo 'Data fim: '.$data_fim;
    */
?>
<table border="1" width="100%">
    <tr>
        <th>Dom</th>
        <th>Seg</th>
        <th>Ter</th>
        <th>Qua</th>
        <th>Qui</th>
        <th>Sex</th>
        <th>Sáb</th>
    </tr>
    <?php 
        for($l=0;$l<$linhas;$l++){
            echo '<tr>';
                for($q=0; $q<7; $q++){
                    $t = strtotime(($q+($l*7)).' days', strtotime($data_inicio));
                    $w = date('Y-m-d', $t);
                    echo '<td>';
                    echo date('d', $t).'<br><br>';
                    $w = strtotime($w);
                    foreach($lista as $item){
                        $dr_inicio = strtotime($item['data_inicio']);
                        $dr_fim = strtotime($item['data_fim']);
                        if($w >= $dr_inicio && $w <= $dr_fim){
                            echo $item['pessoa'].' [Carro '.$item['id_carro'].']'.'<br>';
                        }
                    }
                    echo '</td>';
                }
            echo '</tr>';
        }
    ?>
</table>