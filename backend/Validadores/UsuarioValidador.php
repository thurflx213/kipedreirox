<?php
namespace App\Kipedreiro\Validadores;

class UsuarioValidador {
    public static function ValidarEntradas($dados) {
        $erros = [];

        if (empty($dados['nome_usuario']) && empty($dados['nome_usuario'])) {
            $erros[] = "O campo nome é obrigatório.";
        }

        if (empty($dados['email_usuario']) && empty($dados['email_usuario'])) {
            $erros[] = "O campo email é obrigatório e deve ser um email válido.";
        } elseif (!filter_var($dados['email_usuario'], FILTER_VALIDATE_EMAIL)) {
            $erros[] = "O campo email deve ser um email válido.";
        }

        if (empty($dados['senha_usuario']) && empty($dados['senha_usuario'])) {
            $erros[] = "O campo senha é obrigatório e deve ter pelo menos 6 caracteres.";
        } elseif (strlen($dados['senha_usuario']) < 6) {
            $erros[] = "O campo senha deve ter pelo menos 6 caracteres.";
        }
        
        return $erros;
    }
}