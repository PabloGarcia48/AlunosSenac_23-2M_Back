<?php
/*
Crie um array de usuários onde cada item tem nome e idade. Depois, exiba os dados formatados.
Exemplo de saída:
Usuário: Ana, Idade: 22
Usuário: Pedro, Idade: 30
Usuário: Julia, Idade: 27
*/
$usuarios = [
    ["nome" => "Ana", "idade" => 22],
    ["nome" => "Pedro", "idade" => 30],
    ["nome" => "Julia", "idade" => 27]
];

foreach ($usuarios as $usuario) {
    echo "Usuário: {$usuario['nome']}, Idade: {$usuario['idade']} <br>";
}
?>