<?php

include 'Controller/PessoaController.php';

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

echo $url;
echo "<br>";


switch ($url) {
    case '/':
        echo "Página inicial - 🏠";
        break;
    case '/pessoa':
        echo "Listar Pessoas - 🧔";
        break;
    case '/pessoa/form':
        PessoaController::form();
        break;
    
    case '/pessoa/form/save':
        PessoaController::save();
        break;
    
    default:
        echo "erro 404";
        break;
}

?>