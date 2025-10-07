<?php
namespace App\Kipedreiro\Controllers;

use App\Kipedreiro\Models\Usuario;
use App\Kipedreiro\Database\Database;
use App\Kipedreiro\Core\View;
use App\Kipedreiro\Core\Redirect;
use App\Kipedreiro\Validadores\UsuarioValidador;
use App\Kipedreiro\Core\FileManager;

class UsuarioController {
    public $usuario;
    public $db;
    public $gerenciarImagem;
    public function __construct() {
        $this->db = Database::getInstance();
        $this->usuario = new Usuario($this->db);
        $this->gerenciarImagem = new FileManager('upload');
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

    public function viewEditarUsuarios(int $id){
       $dados = $this->usuario->buscarUsuariosPorId($id);
       var_dump($dados);
       foreach($dados as $usuario){
        $dados = $usuario;
       }
       view::render("usuario/edit", ["usuario" => $dados]);
    }

    public function viewExcluirUsuarios($id){
         view::render("usuario/delete", ["id_usuario" => $id]);
    }
    public function relatorioUsuario($id, $data1, $data2){
     view::render("usuario/relatorio",
           ["id" => $id, "data1" => $data1, "data2" => $data2]
      );
    }

    public function salvarUsuario(){
        $erros = UsuarioValidador::ValidarEntradas($_POST);
        if(!empty($erros)){
            Redirect::redirecionarComMensagem("usuario/criar", "error", implode("<br>", $erros));
            
        }
        $imagem = $this->gerenciarImagem->salvarArquivo($_FILES['imagem'], 'usuario');
       if($this->usuario->inserirUsuario(
            $_POST["nome_usuario"],
            $_POST["email_usuario"],
            $_POST["senha_usuario"],
            $_POST["tipo_usuario"],
            "Ativo",
            $imagem
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