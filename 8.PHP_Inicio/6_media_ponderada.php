<?php
/*
Crie uma função que receba um array associativo contendo nota e
peso, realize a média das notas considerando o peso. Exemplos:
Lista com 2 notas: (N1*P1) + (N2*P2) / 2 = Resultado
Lista com 3 notas: (N1*P1) + (N2*P2) + (N3*P3) / 3 = Resultado
*/

function calcularMediaPonderada($notasPesos)
{
    $somaNotas = 0;
    $somaPesos = 0;

    foreach ($notasPesos as $nota => $peso) {
        $somaNotas += $nota * $peso;
        $somaPesos += $peso;
    }

    $mediaPonderada = $somaNotas / $somaPesos;

    return $mediaPonderada;
}

$notasPesos2 = array(10 => 1, 9 => 2);
$notasPesos3 = array(8 => 1, 9 => 2, 4 => 3);


print_r("Média ponderada (2 notas): " . calcularMediaPonderada($notasPesos2) . "<br>");
echo "<br>";
print_r("Média ponderada (3 notas): " . calcularMediaPonderada($notasPesos3) . "<br>");


echo $notasPesos2[1];
