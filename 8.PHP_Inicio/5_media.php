<?php

/* Crie uma função que receba 2 números e retorne um array
associativo contendo a média e também um indicador booleano de
aprovado/reprovado. Considere aprovado com média >= 6.
*/

/*
function media($nota1, $nota2)
{
    $media = ($nota1 + $nota2) / 2;
    return [
        'media' => $media,
        'aprovado' => $media >= 6
    ];
}

$desempenhoAluno = media(8, 3);

var_dump($desempenhoAluno);

echo "<pre>";
print_r($desempenhoAluno);
echo "</pre>";

*/
?>


<?php
function calculaMedia($nota1, $nota2) {
    $media = ($nota1 + $nota2) / 2;
    return [
        'media' => $media,
        'aprovado' => $media >= 6
    ];
}

$resultado = calculaMedia(8, 6);
echo "Média: {$resultado['media']} <br>";
echo "Status: " . ($resultado['aprovado'] ? "Aprovado" : "Reprovado");
?>