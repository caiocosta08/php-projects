<?php 
    if(isset($_POST['num1']) && !empty($_POST['num1'])){
        $num1 = addslashes(floatval($_POST['num1']));
        $num2 = addslashes(floatval($_POST['num2']));

        $op = addslashes($_POST['op']);
        if($op == '-') $res = $num1 - $num2;
        if($op == '+') $res = $num1 + $num2;
        if($op == '*') $res = $num1 * $num2;
        if($op == '/') $res = $num1 / $num2;
        echo '<h3>'.$num1.' '.$op.' '.$num2.' = '.$res.'</h3>';
    }else{
        echo 'Digite uma operação';
    }
?>

<form method="POST">
    <input type="text" name="num1" />
    <select name="op">
        <option value="-">-</option>
        <option value="+">+</option>
        <option value="*">*</option>
        <option value="/">/</option>
    </select>
    <input type="text" name="num2" />
    <input type="submit" value="Calcular">
</form>