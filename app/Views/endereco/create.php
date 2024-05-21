<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <meta charset="UTF-8">
    <title>K13 > Agenda de contatos</title>
</head>

<body class="bg-dark text-light">
    <nav class="navbar d-flex justify-content-center" style="background-color: gray;">
        <button class="btn border-light bg-light m-2"><a class="text-decoration-none link-dark" href="/k13_teste/">Agenda de contatos</a></button>
        <button class="btn border-light bg-light m-2"><a class="text-decoration-none link-dark" href="/k13_teste/contato/create">Adicionar Novo Contato</a></button>
        <button class="btn border-light bg-light m-2"><a class="text-decoration-none link-dark" href="/k13_teste/endereco/create">Endereços</a></button>
    </nav>
    <div class="container mt-5">
        <h1 class="mt-4">Endereços</h1>
        <div class="d-flex m-auto">
            <form action="/k13_teste/endereco/store" method="post" class="w-50">
                <div class="mb-3">
                    <label for="contato_id" class="form-label">Contato:</label>
                    <select name="contato_id" id="contato_id" class="form-select" required>
                        <option value="" selected disabled>Selecione um contato</option>
                        <?php foreach ($contatos as $contato) : ?>
                            <option value="<?= $contato->id ?>"><?= $contato->nome_completo ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="cep" class="form-label">CEP:</label>
                    <input type="text" name="cep" id="cep" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="rua" class="form-label">Rua:</label>
                    <input type="text" name="rua" id="rua" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="numero" class="form-label">Número:</label>
                    <input type="text" name="numero" id="numero" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="bairro" class="form-label">Bairro:</label>
                    <input type="text" name="bairro" id="bairro" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="cidade" class="form-label">Cidade:</label>
                    <input type="text" name="cidade" id="cidade" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="estado" class="form-label">Estado:</label>
                    <select name="estado" id="estado" class="form-select" required>
                        <option value="" selected disabled>Selecione um estado</option>
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
                </div>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>
    </div>
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
        document.getElementById('contato_id').addEventListener('change', function() {
            var contatoId = this.value;
            if (contatoId) {
                fetch('http://localhost/k13_teste/endereco/get?contato_id=' + contatoId)
                    .then(response => response.text())
                    .then(text => {
                        // Remove tudo antes do {
                        const jsonStart = text.indexOf('{');
                        if (jsonStart !== -1) {
                            text = text.substring(jsonStart);
                        }
                        try {
                            return JSON.parse(text);
                        } catch {
                            console.error('Invalid JSON:', text);
                            throw new Error('Invalid JSON');
                        }
                        
                    })
                    .then(data => {
                        if (data) {
                            document.getElementById('cep').value = data.cep || '';
                            document.getElementById('rua').value = data.rua || '';
                            document.getElementById('numero').value = data.numero || '';
                            document.getElementById('bairro').value = data.bairro || '';
                            document.getElementById('cidade').value = data.cidade || '';
                            document.getElementById('estado').value = data.estado || '';
                        } else {
                            document.getElementById('cep').value = '';
                            document.getElementById('rua').value = '';
                            document.getElementById('numero').value = '';
                            document.getElementById('bairro').value = '';
                            document.getElementById('cidade').value = '';
                            document.getElementById('estado').value = '';
                        }
                    });
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>