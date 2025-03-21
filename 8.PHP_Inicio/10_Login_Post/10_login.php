<?php
$usuario_correto = "admin";
$senha_correta = "123";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];

    if ($usuario == $usuario_correto && $senha == $senha_correta) {
        echo "Login bem-sucedido!";
    } else {
        echo "Usuário ou senha incorretos!";
    }
}
?>
