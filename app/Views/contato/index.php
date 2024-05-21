<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <meta charset="UTF-8">
    <title>K13 > Agenda de Contatos</title>
</head>

<body class="bg-dark text-light">
    <nav class="navbar d-flex justify-content-center" style="background-color: gray;">
        <button class="btn border-light bg-light m-2"><a class="text-decoration-none link-dark" href="/k13_teste/">Agenda de contatos</a></button>
        <button class="btn border-light bg-light m-2"><a class="text-decoration-none link-dark" href="/k13_teste/contato/create">Adicionar Novo Contato</a></button>
        <button class="btn border-light bg-light m-2"><a class="text-decoration-none link-dark" href="/k13_teste/endereco/create">Endereços</a></button>
    </nav>
    <div class="container mt-5">
        <h1>Agenda de Contatos</h1>
        <form action="/k13_teste/search" method="POST" class="w-50">
            <div class="mb-2">
                <label for="nome_contato" class="form-label">Pesquisar Contato:</label>
                <input type="text" name="nome_contato" id="nome_contato" class="form-control" placeholder="">
                <p class="text-light"><?php $teste?></p>
            </div>
            <button type="submit" class="btn btn-primary">Pesquisar</button>
        </form>
        <hr>
        <table border="2">
            <tr>
                <th class="p-1">ID</th>
                <th class="p-1">Nome Completo</th>
                <th class="p-1">CPF</th>
                <th class="p-1">Email</th>
                <th class="p-1">Data de Nascimento</th>
            </tr>
            <?php foreach ($contatos as $contato) : ?>
                <tr>
                    <td class="p-1"><?= $contato->id ?></td>
                    <td class="p-1"><?= $contato->nome_completo ?></td>
                    <td class="p-1"><?= $contato->cpf ?></td>
                    <td class="p-1"><?= $contato->email ?></td>
                    <td class="p-1"><?= date('d/m/Y', strtotime($contato->data_nascimento)) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>