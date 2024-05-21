CREATE DATABASE agenda_contatos;
use agenda_contatos;

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
