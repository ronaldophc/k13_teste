<?php

namespace App\Models;

use Database;

class Telefone
{
    public $id;
    public $contato_id;
    public $telefone_comercial;
    public $telefone_residencial;
    public $telefone_celular;
    protected $table = 'telefones';
    protected $primaryKey = 'id';

    public static function all()
    {

        $stmt = Database::getInstance()->query("SELECT * FROM telefones");
        return $stmt->fetchAll();
    }

    public static function find($id)
    {
        $stmt = Database::getInstance()->prepare("SELECT * FROM telefones WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function save()
    {
        $fields = get_object_vars($this);
        unset($fields['table'], $fields['primaryKey']);
        
        if (isset($this->{$this->primaryKey})) {
            // Update
            $updates = array_map(function($field) { return "$field = :$field"; }, array_keys($fields));
            $stmt = Database::getInstance()->prepare("UPDATE telefones SET " . implode(', ', $updates) . " WHERE id = :id");
        } else {
            // Insert
            $columns = implode(', ', array_keys($fields));
            $placeholders = implode(', ', array_map(function($field) { return ":$field"; }, array_keys($fields)));
            $stmt = Database::getInstance()->prepare("INSERT INTO telefones ($columns) VALUES ($placeholders)");
        }

        $stmt->execute($fields);
        if (!isset($this->{$this->primaryKey})) {
            $this->{$this->primaryKey} = Database::getInstance()->lastInsertId();
        }
    }

    public static function where($column, $value)
    {
        $stmt = Database::getInstance()->prepare("SELECT * FROM telefones WHERE $column = ?");
        $stmt->execute([$value]);
        return $stmt->fetchAll();
    }
}
