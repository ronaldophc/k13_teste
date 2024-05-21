<?php

namespace App\Controllers;

use App\Models\Contato;
use App\Models\Endereco;

class EnderecoController
{
    public function createEndereco()
    {
        $contatos = Contato::all();
        require './app/Views/endereco/create.php';
    }
    public function save()
    {
        Endereco::store();
        header('Location: /k13_teste');
    }

    public static function getAddressByContact($contatoId)
    {
        $endereco = Endereco::find($contatoId);
        echo json_encode($endereco);
    }
}
