<?php

//é só para exemplificar
$imgFile = 'jovem_nerd.jpg';

$imgData = base64_encode(file_get_contents($imgFile));

//Aqui eu crio o formato igual ao q recebemos pela web com formato
//base64. 
//ex: data:image/png;base64,hafdlaksdhfklashdfkahdflasdhflksdfkasdlfas
$imgSrc = 'data:' . mime_content_type($imgFile) . ';base64,' . $imgData;
//é só para exemplificar - FIM

//Quebro essa tripa
//resultado: posicao0 (data:), posicao1 (MIME), posicao2 (Base64)
preg_match('/data:([^;]*);base64,(.*)/', $imgSrc, $arrayNewImage);

//Esse cara abaixo é q faz a magica acontecer
//O Content-Type armazena o MIME do arquivo. Ex.: image/png, image/jpeg, image/gif ...
header('Content-Type: ' . $arrayNewImage[1]);
echo base64_decode($arrayNewImage[2]);