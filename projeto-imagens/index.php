<?php 

    $arquivo = 'jp.jpg';
    
    list($largura_original, $altura_original) = getimagesize($arquivo);
    list($largura_mini, $altura_mini) = getimagesize('mini_imagem.jpeg');
    
    $image_final = imagecreatetruecolor($largura_original, $altura_original);

    $imagem_original = imagecreatefromjpeg('jp.jpg');
    $imagem_mini = imagecreatefromjpeg('mini_imagem.jpeg');

    imagecopy($image_final, $imagem_original, 0, 0, 0, 0, 
$largura_original, $altura_original);
    imagecopy($image_final, $imagem_mini, 0, 0, 0, 0, 
$largura_mini, $altura_mini);


    header('Content-Type: image/jpeg');
    imagejpeg($imagem_final, null);
?>