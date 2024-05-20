<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <meta charset="UTF-8">
    <title>Lista de Contatos</title>
</head>
<body class="container bg-dark text-light m-5">
    <h1>Lista de Contatos</h1>
    <Button class="btn m-2"><a href="/k13_teste/contato/create">Adicionar Novo Contato</a></Button>
    <table border="2">
        <tr>
            <th class="p-1">ID</th>
            <th class="p-1">Nome Completo</th>
            <th class="p-1">CPF</th>
            <th class="p-1">Email</th>
            <th class="p-1">Data de Nascimento</th>
            <th class="p-1">Ações</th>
        </tr>
        <?php foreach ($contatos as $contato): ?>
        <tr>
            <td class="p-1"><?= $contato->id ?></td>
            <td class="p-1"><?= $contato->nome_completo ?></td>
            <td class="p-1"><?= $contato->cpf ?></td>
            <td class="p-1"><?= $contato->email ?></td>
            <td class="p-1"><?= date('d/m/Y', strtotime($contato->data_nascimento)) ?></td>
            <td class="p-1">
                <a href="/k13_teste/contato/edit?id=<?= $contato->id ?>">Editar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
