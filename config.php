<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'agenda_contatos');

function getDbConnection()
{
    $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8';
    try {
        $pdo = new PDO($dsn, DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        die('Connection failed: ' . $e->getMessage());
    }
}

function criarTabelas(PDO $pdo) {
    $sqlContatos = "
    CREATE TABLE IF NOT EXISTS contatos (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nome_completo VARCHAR(255) NOT NULL,
        cpf VARCHAR(11) UNIQUE NOT NULL,
        email VARCHAR(255) UNIQUE NOT NULL,
        data_nascimento DATE NOT NULL
    )";

    $sqlEnderecos = "
    CREATE TABLE IF NOT EXISTS enderecos (
        id INT AUTO_INCREMENT PRIMARY KEY,
        contato_id INT,
        cep VARCHAR(9) NOT NULL,
        rua VARCHAR(255) NOT NULL,
        numero VARCHAR(10) NOT NULL,
        bairro VARCHAR(100) NOT NULL,
        cidade VARCHAR(100) NOT NULL,
        estado VARCHAR(2) NOT NULL,
        FOREIGN KEY (contato_id) REFERENCES contatos(id)
    )";

    $sqlTelefones = "
    CREATE TABLE IF NOT EXISTS telefones (
        id INT AUTO_INCREMENT PRIMARY KEY,
        contato_id INT,
        telefone_comercial VARCHAR(15) UNIQUE,
        telefone_residencial VARCHAR(15) UNIQUE,
        telefone_celular VARCHAR(15) NOT NULL,
        FOREIGN KEY (contato_id) REFERENCES contatos(id)
    )";

    $pdo->exec($sqlContatos);
    $pdo->exec($sqlEnderecos);
    $pdo->exec($sqlTelefones);
}
