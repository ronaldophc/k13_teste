<?php

require './config.php';
require './vendor/autoload.php';

use App\Controllers\ContatoController;
use App\Controllers\EnderecoController;
use App\Utils\Util;

$Contactcontroller = new ContatoController();
$Addresscontroller = new EnderecoController();


$uri = str_replace('/k13_teste', '', $_SERVER['REQUEST_URI']);
if ($uri === '/') {
    $Contactcontroller->index();
} elseif ($uri === '/search') {
    $Contactcontroller->search();
} elseif ($uri === '/contato/create') {
    $Contactcontroller->create();
} elseif ($uri === '/contato/store' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $Contactcontroller->save();
} elseif ($uri === '/endereco/create') {
    $Addresscontroller->createEndereco();
} elseif ($uri === '/endereco/store' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $Addresscontroller->save();
} elseif (Util::startsWith($uri, '/endereco/get')) {
    $contatoId = $_GET['contato_id'];
    $Addresscontroller->getAddressByContact($contatoId);
} else {
    header("HTTP/1.0 404 Not Found");
    echo '404 Not Found';
}
