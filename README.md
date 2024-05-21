## Versões utilizadas
- Composer 2.7.6
- PHP 8.3.0
- Wampserver 3.3.2 
- Apache 2.4.58 - PHP 8.2.13
- MariaDB 11.2.2 Port 3306

## Manual de execução
- Clonar o repositório com `git clone`
- Abrir o projeto no editor Visual Studio Code (VS Code)
- Abrir um terminal pelo VSCode ou qualquer terminal do seu Sistema Operacional apontando para o diretório raiz do projeto 
- Iniciar o Composer
  - Comando: `composer install`
- Modificar as configurações do banco de dados no config.php

## Script Banco de dados
CREATE TABLE contatos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome_completo VARCHAR(255) NOT NULL,
    cpf VARCHAR(11) NOT NULL UNIQUE,
    email VARCHAR(255) NOT NULL UNIQUE,
    data_nascimento DATE NOT NULL
);

CREATE TABLE enderecos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    contato_id INT NOT NULL,
    cep VARCHAR(9),
    rua VARCHAR(255),
    numero VARCHAR(10),
    bairro VARCHAR(255),
    cidade VARCHAR(255),
    estado VARCHAR(2),
    FOREIGN KEY (contato_id) REFERENCES contatos(id)
);

CREATE TABLE telefones (
    id INT AUTO_INCREMENT PRIMARY KEY,
    contato_id INT NOT NULL,
    telefone_comercial VARCHAR(20) UNIQUE,
    telefone_residencial VARCHAR(20) UNIQUE,
    telefone_celular VARCHAR(20) NOT NULL UNIQUE,
    FOREIGN KEY (contato_id) REFERENCES contatos(id)
);
