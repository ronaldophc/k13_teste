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
    protected $primaryKey = 'id';

    public static function all()
    {
        $stmt = getDbConnection()->query("SELECT * FROM contatos");
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
        $stmt = getDbConnection()->prepare("SELECT * FROM contatos WHERE id = $id");
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
            return null;
        }
    }

    public function save()
    {
        $stmt = getDbConnection()->prepare('INSERT INTO contatos (nome_completo, cpf, email, data_nascimento) VALUES (:nome_completo, :cpf, :email, :data_nascimento)');
        $stmt->bindParam(':nome_completo', $_POST['nome_completo']);
        $stmt->bindParam(':cpf', $_POST['cpf']);
        $stmt->bindParam(':email', $_POST['email']);
        $stmt->bindParam(':data_nascimento', $_POST['data_nascimento']);
        $stmt->execute();
    }

    public static function where($column, $value)
    {
        $stmt = getDbConnection()->prepare("SELECT * FROM contatos WHERE $column = ?");
        $stmt->execute([$value]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function store()
    {
        $contato = new Contato();
        $contato->nome_completo = $_POST['nome_completo'];
        $contato->cpf = $_POST['cpf'];
        $contato->email = $_POST['email'];
        $contato->data_nascimento = $_POST['data_nascimento'];
        $contato->save();
        header('Location: /k13_teste');
    }

    public static function search()
    {
        $stmt = getDbConnection()->query("SELECT * FROM contatos WHERE nome_completo LIKE '%{$_POST['nome_contato']}%'");
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
}
