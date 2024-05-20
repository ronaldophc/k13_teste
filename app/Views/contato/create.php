<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="container bg-dark text-light m-5">
    <h1>Criar Contato</h1>
    <form action="/k13_teste/contato/store" method="POST">
        <div class="mb-3">
            <label for="nome_completo" class="form-label">Nome Completo</label>
            <input type="text" id="nome_completo" name="nome_completo" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="cpf" class="form-label">CPF(Somente números)</label>
            <input type="text" id="cpf" name="cpf" class="form-control" placeholder="CPF" maxlength="11" required>
            <span id="cpf-error" class="text-danger" style="display: none;">CPF inválido!</span>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" name="email" class="form-control" placeholder="Email" required>
        </div>
        <div class="mb-3">
            <label for="data_nascimento" class="form-label">Data de Nascimento</label>
            <input type="date" id="data_nascimento" name="data_nascimento" class="form-control" placeholder="Data de Nascimento" required>
        </div>
        <button type="button" class="btn btn-primary" onclick="validarCPF()">Criar Contato</button>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        function validarCPF() {
            var cpfInput = document.getElementById('cpf').value;
            var cpfValido = validarCPFFormato(cpfInput) && validarCPFChecksum(cpfInput); 
            var cpfError = document.getElementById('cpf-error');

            if (!cpfValido) {
                cpfError.style.display = 'inline';
                document.getElementById('cpf').classList.add('is-invalid');
                document.getElementById('cpf').focus();
            } else {
                cpfError.style.display = 'none';
                document.getElementById('cpf').classList.remove('is-invalid');
                document.querySelector('form').submit();
            }
        }

        function validarCPFFormato(cpf) {
            return cpf.length === 11 && !cpf.match(/(\d)\1{10}/);
        }

        function validarCPFChecksum(cpf) {
            var soma = 0;
            for (var i = 0; i < 9; i++) {
                soma += parseInt(cpf.charAt(i)) * (10 - i);
            }
            var resto = soma % 11;
            var digito1 = resto < 2 ? 0 : 11 - resto;

            soma = 0;
            for (var i = 0; i < 10; i++) {
                soma += parseInt(cpf.charAt(i)) * (11 - i);
            }
            resto = soma % 11;
            var digito2 = resto < 2 ? 0 : 11 - resto;

            return digito1 === parseInt(cpf.charAt(9)) && digito2 === parseInt(cpf.charAt(10));
        }
    </script>
</body>