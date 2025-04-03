<?php

// echo "Olá Mundo"

include 'Controller/PessoaController.php'; //Colocar isto depois de adicionar os métodos index() e form() das linhas 16 e 20

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); // é assim que funciona a navegação por rotas

// echo $url; pegar a rota que o usuário está pegando

switch ($url) {
    case '/':
        echo "página inicial";
        break;
    case '/pessoa':
        PessoaController::index();
        // echo "Listagem de pessoas";
        break;
    case '/pessoa/form':
        PessoaController::form();
        // echo "formulário para salvar pessoa"; 
        break;
    case '/pessoa/form/save':
        PessoaController::save();
        break;
    case '/pessoa/delete':
        PessoaController::delete();
        break;
    
    default:
        echo "erro 404";
        break;
        // controller é responsável por responder a estes acessos
}

?>