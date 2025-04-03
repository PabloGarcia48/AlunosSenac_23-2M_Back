<?php
// echo "Listagem de Pessoas";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Pessoas</title>
</head>

<body>
    <table>
        <tr>
            <th></th> <!-- fazer somente para o excluir -->
            <th>ID</th>
            <th>Nome</th>
            <th>CPF</th>
            <th>Data Nascimento</th>
        </tr>

        <?php foreach ($model->rows as $item): ?> <!-- mostrar isso depois de fazer os métodos na Model, Controller e DAO -->
            <tr>
                <td><a href="/pessoa/delete?id=<?= $item->id ?>">X</a></td> <!-- fazer isto para excluir -->
                <td><?= $item->id ?></td>
                <td><a href="/pessoa/form?id=<?= $item->id ?>"><?= $item->nome ?></a></td> <!-- fazer isto para gerar um link no nome para o update -->
                <td><?= $item->cpf ?></td>
                <td><?= $item->data_nascimento ?></td>
            </tr>
        <?php endforeach ?>

        <?php if (count($model->rows) == 0): ?>
            <tr>
                <td colspan="5">Nenhum registro encontrado</td>
            </tr>
        <?php endif ?>
    </table>

</body>

</html>