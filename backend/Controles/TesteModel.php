<?php

require_once __DIR__ . '/../Models/Usuario.php';
require_once __DIR__ . '/../Database/Database.php';

$usuario = new Usuario($db);

//$usuario = new Usuario($db);
//$resultado = $usuario->buscarUsuariosPorEmail("william.reis@emailpro.com");
$usuario->deletarUsuario(1);
var_dump($usuario);

