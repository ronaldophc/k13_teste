<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <meta charset="UTF-8">
    <title>Editar Telefone</title>
</head>
<body class="container bg-dark text-light m-5">
    <h1>Editar Telefone</h1>
    <form action="/k13_teste/telefone/update" method="post">
        <input type="hidden" name="contato_id" value="<?= $telefone->contato_id ?>">
        <label>Contato:</label>
        <select name="contato_id" required disabled>
            <?php foreach ($contatos as $contato): ?>
                <option value="<?= $contato->id ?>" <?= $contato->id == $telefone->contato_id ? 'selected' : '' ?>>
                    <?= $contato->nome_completo ?>
                </option>
            <?php endforeach; ?>
        </select>
        <label>Telefone Comercial:</label>
        <input type="text" name="telefone_comercial" value="<?= $telefone->telefone_comercial ?>" placeholder="(XX) XXXX-XXXX">
        <label>Telefone Residencial:</label>
        <input type="text" name="telefone_residencial" value="<?= $telefone->telefone_residencial ?>" placeholder="(XX) XXXX-XXXX">
        <label>Telefone Celular:</label>
        <input type="text" name="telefone_celular" value="<?= $telefone->telefone_celular ?>" placeholder="(XX) XXXXX-XXXX" required>
        <button type="submit">Atualizar</button>
    </form>
    <script>
    // Adicionar máscara de telefone
    document.querySelectorAll('input[type="text"]').forEach(function(input) {
        input.addEventListener('blur', function() {
            let value = this.value.replace(/\D/g, '');
            if (value.length === 10) {
                this.value = value.replace(/(\d{2})(\d{4})(\d{4})/, '($1) $2-$3');
            } else if (value.length === 11) {
                this.value = value.replace(/(\d{2})(\d{5})(\d{4})/, '($1) $2-$3');
            }
        });
    });
    </script>
</body>
</html>
