<?php

namespace App\Kipedreiro\Models;
use PDO;

function listarContatos($db){
  $sql = 'SELECT id_contato, nome_contato, telefone_contato, email_contato, mensagem_contato FROM tbl_contato ';
$statment = $db->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
$statment->execute();
return $resultado = $statment ->fetchAll();
}
function listarContatoPorId($db, $id) {
    $sql = 'SELECT id_contato, nome_contato, email_contato, telefone_contato, mensagem_contato FROM tbl_contato WHERE id_contato = :id';
    $statement = $db->prepare($sql);
    $statement->bindParam(':id', $id);
    return $statement->execute();
}
function buscarUsuariosInativos($email){
   $sql = "SELECT * FROM tbl_usuario where email_usuario = :email and excluido_em IS NOT NULL";
   $stmt = $this->db->prepare($sql);
   $stmt->bindParam(':email', $email);
   $stmt->execute();
   return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function inserirContato($db, $nome, $email, $telefone, $mensagem){
    $sql = "INSERT INTO tbl_contato (nome_contato, email_contato, telefone_contato, mensagem_contato)
            VALUES (:nome, :email, :telefone, :mensagem)";
    $statement = $db->prepare($sql);
    $statement->bindParam(':nome', $nome);
    $statement->bindParam(':email', $email);
    $statement->bindParam(':telefone', $telefone);
    $statement->bindParam(':mensagem', $mensagem);


    return $statement->execute();
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
