<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <meta charset="UTF-8">
    <title>Criar Endereço</title>
</head>

<body>
    <h1>Criar Endereço</h1>
    <form action="/k13_teste/endereco/store" method="post">
        <label>Contato:</label>
        <select name="contato_id" required>
            <?php foreach ($contatos as $contato) : ?>
                <option value="<?= $contato->id ?>"><?= $contato->nome_completo ?></option>
            <?php endforeach; ?>
        </select>
        <label>CEP:</label>
        <input type="text" name="cep" id="cep" required>
        <label>Rua:</label>
        <input type="text" name="rua" id="rua" required>
        <label>Número:</label>
        <input type="text" name="numero" required>
        <label>Bairro:</label>
        <input type="text" name="bairro" id="bairro" required>
        <label>Cidade:</label>
        <input type="text" name="cidade" id="cidade" required>
        <label>Estado:</label>
        <select name="estado" id="estado" required>
            <!-- Lista dos estados -->
            <option value="AC">Acre</option>
            <option value="AL">Alagoas</option>
            <option value="AP">Amapá</option>
            <option value="AM">Amazonas</option>
            <option value="BA">Bahia</option>
            <option value="CE">Ceará</option>
            <option value="DF">Distrito Federal</option>
            <option value="ES">Espírito Santo</option>
            <option value="GO">Goiás</option>
            <option value="MA">Maranhão</option>
            <option value="MT">Mato Grosso</option>
            <option value="MS">Mato Grosso do Sul</option>
            <option value="MG">Minas Gerais</option>
            <option value="PA">Pará</option>
            <option value="PB">Paraíba</option>
            <option value="PR">Paraná</option>
            <option value="PE">Pernambuco</option>
            <option value="PI">Piauí</option>
            <option value="RJ">Rio de Janeiro</option>
            <option value="RN">Rio Grande do Norte</option>
            <option value="RS">Rio Grande do Sul</option>
            <option value="RO">Rondônia</option>
            <option value="RR">Roraima</option>
            <option value="SC">Santa Catarina</option>
            <option value="SP">São Paulo</option>
            <option value="SE">Sergipe</option>
            <option value="TO">Tocantins</option>
        </select>
        <button type="submit">Salvar</button>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>