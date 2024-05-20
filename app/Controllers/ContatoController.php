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

    public function create()
    {
        require './app/Views/contato/create.php';
    }

    public function store()
    {
        $contato = new Contato();
        $contato->nome_completo = $_POST['nome_completo'];
        $contato->cpf = $_POST['cpf'];
        $contato->email = $_POST['email'];
        $contato->data_nascimento = $_POST['data_nascimento'];
        $contato->save();
        header('Location: /k13_teste');
    }

    public function edit()
    {
        $id = $_GET['id'];
        $contato = Contato::find($id);
        require './app/Views/contato/edit.php';
    }

    public function update()
    {
        $id = $_POST['id'];
        $contato = Contato::find($id);
        $contato->nome_completo = $_POST['nome_completo'];
        $contato->cpf = $_POST['cpf'];
        $contato->email = $_POST['email'];
        $contato->data_nascimento = $_POST['data_nascimento'];
        $contato->save();

        header('Location: /');
    }

    public function createEndereco()
    {
        $contatos = Contato::all();
        require './app/Views/endereco/create.php';
    }

    public function storeEndereco()
    {
        $endereco = new Endereco();
        $endereco->contato_id = $_POST['contato_id'];
        $endereco->cep = $_POST['cep'];
        $endereco->rua = $_POST['rua'];
        $endereco->numero = $_POST['numero'];
        $endereco->bairro = $_POST['bairro'];
        $endereco->cidade = $_POST['cidade'];
        $endereco->estado = $_POST['estado'];
        $endereco->save();

        header('Location: /');
    }

    public function editEndereco()
    {
        $id = $_GET['id'];
        $endereco = Endereco::where('contato_id', $id)[0];
        $contatos = Contato::all();
        require '../app/Views/endereco/edit.php';
    }

    public function updateEndereco()
    {
        $contato_id = $_POST['contato_id'];
        $endereco = Endereco::where('contato_id', $contato_id)[0];
        $endereco->cep = $_POST['cep'];
        $endereco->rua = $_POST['rua'];
        $endereco->numero = $_POST['numero'];
        $endereco->bairro = $_POST['bairro'];
        $endereco->cidade = $_POST['cidade'];
        $endereco->estado = $_POST['estado'];
        $endereco->save();

        header('Location: /');
    }

    public function createTelefone()
    {
        $contatos = Contato::all();
        require '../app/Views/telefone/create.php';
    }

    public function storeTelefone()
    {
        $telefone = new Telefone();
        $telefone->contato_id = $_POST['contato_id'];
        $telefone->telefone_comercial = $_POST['telefone_comercial'];
        $telefone->telefone_residencial = $_POST['telefone_residencial'];
        $telefone->telefone_celular = $_POST['telefone_celular'];
        $telefone->save();

        header('Location: /');
    }

    public function editTelefone()
    {
        $id = $_GET['id'];
        $telefone = Telefone::where('contato_id', $id)[0];
        $contatos = Contato::all();
        require '../app/Views/telefone/edit.php';
    }

    public function updateTelefone()
    {
        $contato_id = $_POST['contato_id'];
        $telefone = Telefone::where('contato_id', $contato_id)[0];
        $telefone->telefone_comercial = $_POST['telefone_comercial'];
        $telefone->telefone_residencial = $_POST['telefone_residencial'];
        $telefone->telefone_celular = $_POST['telefone_celular'];
        $telefone->save();

        header('Location: /');
    }
}
