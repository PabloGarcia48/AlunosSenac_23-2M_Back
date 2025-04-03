<?php
echo "Formulário";

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Pessoa</title>
    <style>
        label,
        input {
            display: block;
        }
    </style>
</head>

<body>
    <fieldset>
        <legend>Cadastro de Pessoa</legend>

        <form action="/pessoa/form/save" method="post">

            <input type="hidden" name="id" value="<?= $model->id ?>">

            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" value="<?= $model->nome ?>" >

            <label for="cpf">CPF:</label>
            <input type="number" name="cpf" id="cpf" value="<?= $model->cpf ?>" >

            <label for="data_nascimento">Data Nascimento:</label>
            <input type="date" name="data_nascimento" id="data_nascimento" value="<?= $model->data_nascimento ?>" >

            <button type="submit">Salvar</button>
        </form>

    </fieldset>
</body>

</html>