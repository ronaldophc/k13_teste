<?php

require './config.php';
require './vendor/autoload.php';

use App\Controllers\ContatoController;

$controller = new ContatoController();

$uri = str_replace('/k13_teste', '', $_SERVER['REQUEST_URI']);
print_r($uri);
print_r('<br>');
// Realiza o roteamento com base na URI
if ($uri === '/') {
    $controller->index();
} elseif ($uri === '/contato/create') {
    $controller->create();
} elseif ($uri === '/contato/store') {
    $controller->store();
} elseif ($uri === '/contato/edit') {
    $controller->edit();
} elseif ($uri === '/contato/update') {
    $controller->update();
} elseif ($uri === '/endereco/create') {
    $controller->createEndereco();
} elseif ($uri === '/endereco/store') {
    $controller->storeEndereco();
} elseif ($uri === '/endereco/edit') {
    $controller->editEndereco();
} elseif ($uri === '/endereco/update') {
    $controller->updateEndereco();
} elseif ($uri === '/telefone/create') {
    $controller->createTelefone();
} elseif ($uri === '/telefone/store') {
    $controller->storeTelefone();
} elseif ($uri === '/telefone/edit') {
    $controller->editTelefone();
} elseif ($uri === '/telefone/update') {
    $controller->updateTelefone();
} else {
    header("HTTP/1.0 404 Not Found");
    echo '404 Not Found';
}
