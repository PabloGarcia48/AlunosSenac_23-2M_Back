<?php

/*
Crie um programa para cadastrar, listar e excluir produtos de uma
lista contendo nome e preço.
*/

$listaProdutos = array();

function adicionarProduto($nomeProduto, $precoProduto){
    global $listaProdutos;
    array_push($listaProdutos, array(
        'produto' => $nomeProduto,
        'preco' => $precoProduto,
    ));
}

function listarProdutos() {
    global $listaProdutos;
    foreach ($listaProdutos as $key => $value) {
        echo "<h4> Produto: " .$value['produto']. "</h4>";
        echo "<h4> Preço: " .$value['preco']. "</h4>";
        echo "<hr>";
    }
}

function excluirProdutos($nomeProduto) {
    global $listaProdutos;
    foreach ($listaProdutos as $key => $value) {
        if( $value['produto'] == $nomeProduto) {
            unset($listaProdutos[$key]);
        }
    }
    echo "<h3> Lista com produto excluído: </h3>";
    listarProdutos($listaProdutos);
}



adicionarProduto('Banana', 'R$3,00');
adicionarProduto('Pêra', 'R$5,00');
adicionarProduto('Jaca', 'R$7,00');
listarProdutos($listaProdutos);
excluirProdutos("Banana")

// var_dump($listaProdutos);

?>