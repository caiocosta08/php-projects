<?php 

    if(isset($_POST['res']) && !empty($_POST['res'])){
        $res = addslashes(floatval($_POST['res']));
        $num1 = addslashes(floatval($_POST['num1']));
        $num2 = addslashes(floatval($_POST['num2']));
        $val = $num1 + $num2;
        if($res == $val) echo 'Resultado correto.';
        else echo 'Resultado incorreto.';
    }
    
?>

<h3>Verificador de Humanos</h3>
<form method='POST'>
    <?php
        $num1 = rand(1,10); 
        $num2 = rand(1,10);
        echo $num1.' + '.$num2.' = '; 
    ?>
    <input type="text" name="res" />
    <input type="hidden" name="num1" value="<?php  echo $num1; ?>">
    <input type="hidden" name="num2" value="<?php  echo $num2; ?>">
    <input type="submit" value="Verificar">
</form>