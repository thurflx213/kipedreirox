<?php
require_once __DIR__ . '/../vendor/autoload.php';


use App\Kipedreiro\Controles\UsuarioController;

// var_dump($_SERVER ["REQUEST_URI"]);
// echo"\n\n\n\n";
// var_dump($_REQUEST ["REQUEST_METHOD"]);
// exit;
if($_SERVER["REQUEST_URI"] == "/backend/buscarusuario" && $_SERVER ["REQUEST_METHOD"] == "GET")
{
    $controller = new UsuarioController;
    $resultado = $controller->index();
    var_dump($resultado);
}else
{
    echo 'rota não encontrada';
}