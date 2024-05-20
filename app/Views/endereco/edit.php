<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <meta charset="UTF-8">
    <title>Editar Endereço</title>
</head>
<body class="container bg-dark text-light">
    <h1>Editar Endereço</h1>
    <form action="/k13_teste/endereco/update" method="post">
        <input type="hidden" name="contato_id" value="<?= $endereco->contato_id ?>">
        <label>Contato:</label>
        <select name="contato_id" required disabled>
            <?php foreach ($contatos as $contato): ?>
                <option value="<?= $contato->id ?>" <?= $contato->id == $endereco->contato_id ? 'selected' : '' ?>>
                    <?= $contato->nome_completo ?>
                </option>
            <?php endforeach; ?>
        </select>
        <label>CEP:</label>
        <input type="text" name="cep" id="cep" value="<?= $endereco->cep ?>" required>
        <label>Rua:</label>
        <input type="text" name="rua" id="rua" value="<?= $endereco->rua ?>" required>
        <label>Número:</label>
        <input type="text" name="numero" value="<?= $endereco->numero ?>" required>
        <label>Bairro:</label>
        <input type="text" name="bairro" id="bairro" value="<?= $endereco->bairro ?>" required>
        <label>Cidade:</label>
        <input type="text" name="cidade" id="cidade" value="<?= $endereco->cidade ?>" required>
        <label>Estado:</label>
        <select name="estado" id="estado" required>
            <!-- Lista dos estados -->
            <option value="AC" <?= $endereco->estado == 'AC' ? 'selected' : '' ?>>Acre</option>
            <option value="AL" <?= $endereco->estado == 'AL' ? 'selected' : '' ?>>Alagoas</option>
            <option value="AP" <?= $endereco->estado == 'AP' ? 'selected' : '' ?>>Amapá</option>
            <option value="AM" <?= $endereco->estado == 'AM' ? 'selected' : '' ?>>Amazonas</option>
            <option value="BA" <?= $endereco->estado == 'BA' ? 'selected' : '' ?>>Bahia</option>
            <option value="CE" <?= $endereco->estado == 'CE' ? 'selected' : '' ?>>Ceará</option>
            <option value="DF" <?= $endereco->estado == 'DF' ? 'selected' : '' ?>>Distrito Federal</option>
            <option value="ES" <?= $endereco->estado == 'ES' ? 'selected' : '' ?>>Espírito Santo</option>
            <option value="GO" <?= $endereco->estado == 'GO' ? 'selected' : '' ?>>Goiás</option>
            <option value="MA" <?= $endereco->estado == 'MA' ? 'selected' : '' ?>>Maranhão</option>
            <option value="MT" <?= $endereco->estado == 'MT' ? 'selected' : '' ?>>Mato Grosso</option>
            <option value="MS" <?= $endereco->estado == 'MS' ? 'selected' : '' ?>>Mato Grosso do Sul</option>
            <option value="MG" <?= $endereco->estado == 'MG' ? 'selected' : '' ?>>Minas Gerais</option>
            <option value="PA" <?= $endereco->estado == 'PA' ? 'selected' : '' ?>>Pará</option>
            <option value="PB" <?= $endereco->estado == 'PB' ? 'selected' : '' ?>>Paraíba</option>
            <option value="PR" <?= $endereco->estado == 'PR' ? 'selected' : '' ?>>Paraná</option>
            <option value="PE" <?= $endereco->estado == 'PE' ? 'selected' : '' ?>>Pernambuco</option>
            <option value="PI" <?= $endereco->estado == 'PI' ? 'selected' : '' ?>>Piauí</option>
            <option value="RJ" <?= $endereco->estado == 'RJ' ? 'selected' : '' ?>>Rio de Janeiro</option>
            <option value="RN" <?= $endereco->estado == 'RN' ? 'selected' : '' ?>>Rio Grande do Norte</option>
            <option value="RS" <?= $endereco->estado == 'RS' ? 'selected' : '' ?>>Rio Grande do Sul</option>
            <option value="RO" <?= $endereco->estado == 'RO' ? 'selected' : '' ?>>Rondônia</option>
            <option value="RR" <?= $endereco->estado == 'RR' ? 'selected' : '' ?>>Roraima</option>
            <option value="SC" <?= $endereco->estado == 'SC' ? 'selected' : '' ?>>Santa Catarina</option>
            <option value="SP" <?= $endereco->estado == 'SP' ? 'selected' : '' ?>>São Paulo</option>
            <option value="SE" <?= $endereco->estado == 'SE' ? 'selected' : '' ?>>Sergipe</option>
            <option value="TO" <?= $endereco->estado == 'TO' ? 'selected' : '' ?>>Tocantins</option>
        </select>
        <button type="submit">Atualizar</button>
    </form>
    <script>
    document.getElementById('cep').addEventListener('blur', function() {
        var cep = this.value.replace(/\D/g, '');
        if (cep.length == 8) {
            fetch('https://viacep.com.br/ws/' + cep + '/json/')
                .then(response => response.json())
                .then(data => {
                    document.getElementById('rua').value = data.logradouro;
                    document.getElementById('bairro').value = data.bairro;
                    document.getElementById('cidade').value = data.localidade;
                    document.getElementById('estado').value = data.uf;
                });
        }
    });
    </script>
</body>
</html>
