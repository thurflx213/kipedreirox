<?php

namespace App\Kipedreiro\Rotas;

class Rotas
{
    public static function get()
    {
        return [ 
            "GET" => [
        // o caminho da URL    o nome do controlle e o metodo do controle 
        "/usuarios" => "UsuarioController@index",
        "/usuario/criar" => "UsuarioController@viewCriarUsuarios",
        "/usuario/listar/{pagina}" => "UsuarioController@viewListarUsuarios",
        "/usuario/editar/{id}" => "UsuarioController@viewEditarUsuarios",
        "/usuario/excluir/{id}" => "UsuarioController@viewExcluirUsuarios",
        "/usuario/{id}/relatorio/{data1}/{data2}" => "UsuarioController@relatorioUsuario",

        '/register' => 'AuthController@register',
        '/login' => 'AuthController@login',
        '/logout' => 'AuthController@logout',
        '/admin/dashboard' => 'Admin\DashboardController@index',
    ],

    "POST" => [
       "/usuario/salvar" => "UsuarioController@salvarUsuario",
       "/usuario/atualizar/{id}" => "UsuarioController@atualizarUsuario",
       "/usuario/deletar/{id}" => "UsuarioController@deletarUsuario",

       '/register' => 'AuthController@cadastrarUsuario',
       '/login' => 'AuthController@authenticar',
            ]
        ];
    }
}
