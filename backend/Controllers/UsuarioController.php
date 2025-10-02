<?php
namespace App\Kipedreiro\Controllers;

use App\Kipedreiro\Models\Usuario;
use App\Kipedreiro\Database\Database;
use App\Kipedreiro\Core\View;
use App\Kipedreiro\Core\Redirect;
use App\Kipedreiro\Validadores\UsuarioValidador;

class UsuarioController {
    public $usuario;
    public $db;
    public function __construct() {
        $this->db = Database::getInstance();
        $this->usuario = new Usuario($this->db);
    }
    public function index(){
        $resultado = $this->usuario->buscarUsuarios();
       var_dump($resultado);
    }

    public function viewListarUsuarios(){
        $dados = $this->usuario->buscarUsuarios();
        view::render("usuario/index",["usuarios" => $dados]);
    }

    public function viewCriarUsuarios(){
        view::render("usuario/create");
    }

    public function viewEditarUsuarios(){
         view::render("usuario/edit");
    }

    public function viewExcluirUsuarios(){
         view::render("usuario/delete");
    }

    public function salvarUsuario(){
        $erros = UsuarioValidador::ValidarEntradas($_POST);
        if(!empty($erros)){
            Redirect::redirecionarComMensagem("usuario/criar", "error", implode("<br>", $erros));
            
        }
       if($this->usuario->inserirUsuario(
            $_POST["nome_usuario"],
            $_POST["email_usuario"],
            $_POST["senha_usuario"],
            $_POST["tipo_usuario"],
            "Ativo"
        )){
            Redirect::redirecionarComMensagem("usuario/listar", "success", "Usuário criado com sucesso!");
        }else{
            Redirect::redirecionarComMensagem("usuario/create", "error", "Erro ao criar usuário. Tente novamente.");
        }
    }
    public function atualizarUsuario(){
        echo "Atualizar usuario";
    }
    public function deletarUsuario(){
        echo "Deletar usuario";
    }  

}