<?php

namespace App\Models;

use PDO;

class Contato
{
    public $id;
    public $nome_completo;
    public $cpf;
    public $email;
    public $data_nascimento;
    protected $table = 'contatos';
    protected $primaryKey = 'id';

    public static function all()
    {
        $pdo = getDbConnection();
        $stmt = $pdo->query("SELECT * FROM contatos");
        $contatos = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $contato = new Contato();
            $contato->id = $row['id'];
            $contato->nome_completo = $row['nome_completo'];
            $contato->cpf = $row['cpf'];
            $contato->email = $row['email'];
            $contato->data_nascimento = $row['data_nascimento'];
            $contatos[] = $contato;
        }
        return $contatos;
    }
    public static function find($id)
    {
        $pdo = getDbConnection();
        $stmt = $pdo->prepare("SELECT * FROM contatos WHERE id = ?");
        $stmt->execute([$id]);
        $contatoData = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($contatoData) {
            $contato = new Contato();
            $contato->id = $contatoData['id'];
            $contato->nome_completo = $contatoData['nome_completo'];
            $contato->cpf = $contatoData['cpf'];
            $contato->email = $contatoData['email'];
            $contato->data_nascimento = $contatoData['data_nascimento'];
            return $contato;
        } else {
            return null; // Retorna null se o contato não for encontrado
        }
    }

    public function save()
    {
        $stmt = getDbConnection()->prepare('INSERT INTO contatos (nome_completo, cpf, email, data_nascimento) VALUES (:nome_completo, :cpf, :email, :data_nascimento)');

        // Atribuir os valores dos parâmetros da consulta
        $stmt->bindParam(':nome_completo', $_POST['nome_completo']);
        $stmt->bindParam(':cpf', $_POST['cpf']);
        $stmt->bindParam(':email', $_POST['email']);
        $stmt->bindParam(':data_nascimento', $_POST['data_nascimento']);

        // Executar a consulta
        $stmt->execute();
        }

    public static function where($column, $value)
    {
        $pdo = getDbConnection();
        $stmt = $pdo->prepare("SELECT * FROM contatos WHERE $column = ?");
        $stmt->execute([$value]);
        return $stmt->fetchAll();

        
    }
}
