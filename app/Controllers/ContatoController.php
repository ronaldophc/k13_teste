<?php

namespace App\Controllers;

use App\Models\Contato;
use App\Models\Endereco;
use App\Models\Telefone;

class ContatoController
{
    public function index()
    {

        $contatos = Contato::all();
        require './app/Views/contato/index.php';
    }

    public function search()
    {
        $contatos = Contato::search();
        require './app/Views/contato/index.php';
    }

    public function create()
    {
        require './app/Views/contato/create.php';
    }
    
    public function save() {
        Contato::store();
    }
}
