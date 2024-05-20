<?php if ($contato) : ?>
    <!DOCTYPE html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>

    <body class="container bg-dark text-light m-5">
        <form action="/k13_teste/contato/update" method="post">
            <input type="hidden" name="id" value="<?= $contato->id ?>">
            <input type="text" name="nome_completo" value="<?= $contato->nome_completo ?>" placeholder="Nome Completo" required>
            <input type="text" name="cpf" value="<?= $contato->cpf ?>" placeholder="CPF" required>
            <input type="email" name="email" value="<?= $contato->email ?>" placeholder="Email" required>
            <input type="date" name="data_nascimento" value="<?= $contato->data_nascimento ?>" placeholder="Data de Nascimento" required>
            <button type="submit">Atualizar</button>
        </form>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <?php else : ?>
        <p>Contato não encontrado.</p>
    <?php endif; ?>
    </body>