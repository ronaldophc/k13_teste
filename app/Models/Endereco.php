<?php

namespace App\Models;

use Database;

class Endereco
{
    public $id;
    public $contato_id;
    public $cep;
    public $rua;
    public $numero;
    public $bairro;
    public $cidade;
    public $estado;
    protected $table = 'enderecos';
    protected $primaryKey = 'id';

    public static function all()
    {
        $stmt = Database::getInstance()->query("SELECT * FROM enderecos");
        return $stmt->fetchAll();
    }

    public static function find($id)
    {
        $stmt = Database::getInstance()->prepare("SELECT * FROM enderecos WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function save()
    {

        $stmt = getDbConnection()->prepare('INSERT INTO enderecos (contato_id, cep, rua, numero, bairro, cidade, estado) VALUES (:contato_id, :cep, :rua, :numero, :bairro, :cidade, :estado)');

        $stmt->bindParam(':contato_id', $_POST['contato_id']);
        $stmt->bindParam(':cep', $_POST['cep']);
        $stmt->bindParam(':rua', $_POST['rua']);
        $stmt->bindParam(':numero', $_POST['numero']);
        $stmt->bindParam(':bairro', $_POST['bairro']);
        $stmt->bindParam(':cidade', $_POST['cidade']);
        $stmt->bindParam(':estado', $_POST['estado']);

        $stmt->execute();
    }

    public static function where($column, $value)
    {
        $stmt = Database::getInstance()->prepare("SELECT * FROM enderecos WHERE $column = ?");
        $stmt->execute([$value]);
        return $stmt->fetchAll();
    }
}
