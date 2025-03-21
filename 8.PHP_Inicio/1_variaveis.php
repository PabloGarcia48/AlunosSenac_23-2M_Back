<?php
/*
Declare as variáveis $nome, $idade, $altura e $casado com valores fictícios.
Exiba os valores usando echo.
Exiba o tipo de cada variável
*/

$nome = "João";
$idade = 25;
$altura = 1.75;
$casado = false;

echo "Nome: $nome <br>";
echo "Idade: $idade <br>";
echo "Altura: $altura m <br>";
echo "Casado: " . ($casado ? "Sim" : "Não") . "<br>";

var_dump($nome, $idade, $altura, $casado);
?>