<?php

namespace App\Models;

use PDO;

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
        $stmt = getDbConnection()->query("SELECT * FROM enderecos");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function find($id)
    {
        $stmt = getDbConnection()->query("SELECT * FROM enderecos WHERE contato_id = $id;");
        $contatoData = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($contatoData) {
            return $contatoData[0];
        } else {
            return false;
        }
    }
    public static function existAddress($contact_id)
    {
        $stmt = getDbConnection()->query("SELECT * FROM enderecos WHERE contato_id = $contact_id;");
        $contatoData = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($contatoData) {
            return true;
        } else {
            return false;
        }
    }

    public function save()
    {
        $stmt = getDbConnection()->prepare("INSERT INTO enderecos (contato_id, cep, rua, numero, bairro, cidade, estado) VALUES (:contato_id, :cep, :rua, :numero, :bairro, :cidade, :estado)");
        $stmt->execute([
            'contato_id' => $this->contato_id,
            'cep' => $this->cep,
            'rua' => $this->rua,
            'numero' => $this->numero,
            'bairro' => $this->bairro,
            'cidade' => $this->cidade,
            'estado' => $this->estado,
        ]);
    }

    public function update($contato_id)
    {
        $stmt = getDbConnection()->prepare("UPDATE enderecos SET cep = :cep, rua = :rua, numero = :numero, bairro = :bairro, cidade = :cidade, estado = :estado WHERE contato_id = $contato_id");
        $stmt->execute([
            'cep' => $this->cep,
            'rua' => $this->rua,
            'numero' => $this->numero,
            'bairro' => $this->bairro,
            'cidade' => $this->cidade,
            'estado' => $this->estado,
        ]);
    }

    public static function getAddress($contact_id)
    {
        $query = getDbConnection()->prepare("SELECT * FROM enderecos WHERE contato_id = {$contact_id}");
    }

    public static function store()
    {
        $contato_id = $_POST['contato_id'];
        $enderecoExist = self::existAddress($contato_id);

        $endereco = new Endereco();
        if (!$enderecoExist) {

            $endereco->contato_id = $contato_id;
        }
        $endereco->cep = $_POST['cep'];
        $endereco->rua = $_POST['rua'];
        $endereco->numero = $_POST['numero'];
        $endereco->bairro = $_POST['bairro'];
        $endereco->cidade = $_POST['cidade'];
        $endereco->estado = $_POST['estado'];
        if (!$enderecoExist) {
            $endereco->save();
        } else {
            $endereco->update($contato_id);
        }
    }
}
