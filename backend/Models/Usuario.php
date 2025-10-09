<?php

namespace App\Kipedreiro\Models;
use PDO;

class Usuario{
  private $id_usuario;
  private $nome_usuario;
  private $email_usuario ;
  private $senha_usuario;
  private $tipo_usuario;
  private $status_usuario;
  private $criado_em;
  private $atualizado_em;
  private $excluido_em;
  private $db;

  public function __construct($db) {
    $this->db = $db;
   }
   //Metodo de buscar todos os usuarios
   function buscarUsuarios(){
   $sql = "SELECT * FROM tbl_usuario where excluido_em IS NULL";
   $stmt = $this->db->prepare($sql);
   $stmt->execute();
   return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function totalDeUsuarios() {
    $sql = "SELECT COUNT(*) AS total FROM tbl_usuario";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_COLUMN);
}

function buscarUsuariosAtivos() {
    $sql = "SELECT COUNT(*) AS total_ativos FROM tbl_usuario WHERE excluido_em IS NULL";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_COLUMN);
}

function buscarUsuariosInativos() {
    $sql = "SELECT COUNT(*) AS total_inativos FROM tbl_usuario WHERE excluido_em IS NOT NULL";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_COLUMN);
}


   //Metodo de buscar todos usuarios por email
   function buscarUsuariosPorEmail($email){
   $sql = "SELECT * FROM tbl_usuario where email_usuario = :email and excluido_em IS NULL";
   $stmt = $this->db->prepare($sql);
   $stmt->bindParam(':email', $email);
   $stmt->execute();
   return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
  function buscarUsuariosPorId($id){
   $sql = "SELECT * FROM tbl_usuario where id_usuario = :id_usuario and excluido_em IS NULL";
   $stmt = $this->db->prepare($sql);
   $stmt->bindParam(':id_usuario', $id);
   $stmt->execute();
   return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function buscarUsuariosPorEmailInativos($email){
   $sql = "SELECT * FROM tbl_usuario where email_usuario = :email and excluido_em IS NOT NULL";
   $stmt = $this->db->prepare($sql);
   $stmt->bindParam(':email', $email);
   $stmt->execute();
   return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

   //Metodo de inserir usuario
   function inserirUsuario($nome, 
   $email, 
   $senha, 
   $tipo, 
   $status,
   $imagem
   ){
    $senha = password_hash($senha, PASSWORD_DEFAULT);
    $sql = "INSERT INTO tbl_usuario (nome_usuario, email_usuario,
    senha_usuario, tipo_usuario, status_usuario, foto_usuario)
        VALUES (:nome, :email, :senha, :tipo, :status, :foto)";
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':senha', $senha);
    $stmt->bindParam(':tipo', $tipo);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':imagem', $imagem);
    if($stmt->execute()){
        return $this->db->lastInsertId();
    }else{
        return false;
    }

   }

   //Metodo de atualizar usuario
  function atualizarUsuario($id, $nome, $email, $senha, $tipo, $status){
    $senha = password_hash($senha, PASSWORD_DEFAULT);
    $dataatual = date('Y-m-d H:i:s');
    $sql = "UPDATE tbl_usuario SET nome_usuario = :nome, 
    email_usuario = :email,
    senha_usuario = :senha, 
    tipo_usuario = :tipo, 
    status_usuario = :status
    atualizado_em = :atual
    WHERE id_usuario = :id";
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':senha', $senha);
    $stmt->bindParam(':tipo', $tipo);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':atual', $dataatual);
    if($stmt->execute()){
        return $this->db->lastInsertId();
    }else{
        return false;
    }

   }

    //Metodo de excluir usuario
    function excluirUsuario($id){
    $dataatual = date('Y-m-d H:i:s');
    $sql = "UPDATE tbl_usuario SET 
    excluido_em = :atual
    WHERE id_usuario = :id";
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':atual', $dataatual);
    if($stmt->execute()){
        return true;
    }else{
        return false;
    }
}

    function ativarUsuario($id){
    $dataatual = NULL;
    $sql = "UPDATE tbl_usuario SET 
    excluido_em = :atual
    WHERE id_usuario = :id";
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':atual', $dataatual);
    if($stmt->execute()){
        return true;
    }else{
        return false;
    }

  }
}