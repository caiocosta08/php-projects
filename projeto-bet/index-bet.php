<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Projeto BET</title>
</head>
<body>

    <?php
        $token = '26886-OCzW1YALc0rB1E';
        $url = "https://api.betsapi.com/v1/bet365/inplay?token=$token";
        $json = file_get_contents($url);
        //echo $json;
        //print_r($json);
        //$jsonDecode = json_decode($json, true);
        $jsonDecode = json_decode($json);
        $variavel = 0;
        //print_r($jsonDecode['results']);
        //var_dump($jsonDecode->results);
        foreach ($jsonDecode->results[0] as $res) {
            //$res : Lista todas as informações
            //$res->type : Lista todos os types
            //if(($res->type == 'CT') && ($res->NA == $res->CT)){
            //    var_dump($res);
            //}

            //var_dump($res);
            //var_dump($res->type);
            //var_dump($res->CD);
            //var_dump($res);
            //print_r($res);
            //if($res->type == 'CL') echo $res->NA;

            if($res->type == 'CL' && $res->NA != 'Soccer'){
                //echo 'kjsdlkfjdslf <br>sdfsdfsdfsd<br>asdasdasda<br>';
                break;
            }
            if($res->type == 'EV'){
                $placar = explode('-', $res->SS);
                $times = explode(' v ', $res->NA);
                //count($placar) == 2 ; para que exista placar dos dois lados 
                //echo 'Jogo: ' . $res->NA . '<br>';
                
                if(count($placar) == 2) echo $times[0] . ' '. $placar[0] . '-' . $placar[1] . ' ' . $times[1] . '<br>';
				$variavel++;
            }

        }
	echo '<script>alert("Total de jogos carregados:'.$variavel.'")</script>';
    ?>

</body>
</html>