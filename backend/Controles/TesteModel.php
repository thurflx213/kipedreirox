<?php

require_once __DIR__ . '/../Models/Usuario.php';
require_once __DIR__ . '/../Database/Database.php';
require_once __DIR__ . '/../Models/Endereco.php';

$usuario = new Usuario($db);
$endereco = new Endereco($db);

//$usuario = new Usuario($db);
$usuario->ativarUsuario(20);
$resultado = $usuario->buscarUsuariosPorEmail("william.reis@emailpro.com");
//$resultado = $usuario->buscarUsuariosInativos("william.reis@emailpro.com");
//$resultado = $usuario->deletarUsuario(20);
var_dump($resultado);
// $id = $usuario->inserirUsuario("Arthur felix", "Arthur.f213@emailpro.com", "654321", "cliente", "ativo");
// $resultado = $endereco->inserirEndereco(
//     $id, 
//     '12345678', 
//     'Av.são miguel', 
//     '123', 
//     'Apto 1', 
//     'São miguel',
//     'São Paulo', 
//      "SP");
// if($resultado){
//     echo 'inserido com sucesso';
// }else{
//     echo 'Erro';
// }


