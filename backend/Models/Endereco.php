<?php

namespace App\Kipedreiro\Models;
use PDO;

class Endereco{
  private $id_Endereco;
  private $cep_Endereco;
  private $logradouro_usuario ;
  private $numero_usuario;
  private $complemento_endereco;
  private $bairro_endereco;
  private $cidade_endereco;
  private $atualizado_em;
  private $excluido_em;
  private $db;

  public function __construct($db) {
    $this->db = $db;
   }
   //Metodo de buscar todos os enderecos
   function buscarEndereco(){
   $sql = "SELECT * FROM tbl_endereco where excluido_em IS NULL";
   $stmt = $this->db->prepare($sql);
   $stmt->execute();
   return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

   //Metodo de buscar todos enderecos por id
   function buscarEnderecosPorId($id){
   $sql = "SELECT * FROM tbl_endereco where id_endereco = :id and excluido_em IS NULL";
   $stmt = $this->db->prepare($sql);
   $stmt->bindParam(':id', $id);
   $stmt->execute();
   return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

   //Metodo de inserir usuario
   function inserirEndereco($id_usuario, $cep_endereco, $logradouro_endereco, $numero_endereco, $complemento_endereco, $bairro_endereco, $cidade_endereco,$uf_endereco){
    $sql = "INSERT INTO tbl_endereco (cep_endereco, logradouro_endereco, 
    numero_endereco, complemento_endereco, bairro_endereco, cidade_endereco, uf_endereco, id_usuario)
        VALUES (:cep_endereco, :logradouro_endereco, :numero_endereco, :complemento_endereco, :bairro_endereco, :cidade_endereco, :uf_endereco, :id_usuario)";
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':cep_endereco', $cep_endereco);
    $stmt->bindParam(':logradouro_endereco', $logradouro_endereco);
    $stmt->bindParam(':numero_endereco', $numero_endereco);
    $stmt->bindParam(':complemento_endereco', $complemento_endereco);
    $stmt->bindParam(':bairro_endereco', $bairro_endereco);
    $stmt->bindParam(':id_usuario', $id_usuario);
    $stmt->bindParam(':cidade_endereco', $cidade_endereco);
    $stmt->bindParam(':uf_endereco', $uf_endereco);
    if($stmt->execute()){
        return $this->db->lastInsertId();
    }else{
        return false;
    }

   }
   

   //Metodo de atualizar usuario
  function atualizarEndereco($id_usuario, $cep_endereco, $logradouro_endereco, $numero_endereco, $complemento_endereco, $bairro_endereco, $cidade_endereco, $uf_endereco){
    $dataatual = date('Y-m-d H:i:s');
    $sql = "UPDATE tbl_endereco SET cep_endereco = :cep_endereco, 
    logradouro_endereco = :logradouro_endereco,
    numero_endereco = :numero_endereco, 
    complemento_endereco = :complemento_endereco, 
    bairro_endereco = :bairro_endereco, 
    cidade_endereco = :cidade_endereco, 
    uf_endereco = :uf_endereco,
    atualizado_em = :atual
    WHERE id_endereco = :id_endereco";
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':id_usuario', $id_usuario);
    $stmt->bindParam(':cep_endereco', $cep_endereco);
    $stmt->bindParam(':logradouro_endereco', $logradouro_endereco);
    $stmt->bindParam(':numero_endereco', $numero_endereco);
    $stmt->bindParam(':complemento_endereco', $complemento_endereco);
    $stmt->bindParam(':bairro_endereco', $bairro_endereco);
    $stmt->bindParam(':cidade_endereco', $cidade_endereco);
    $stmt->bindParam(':uf_endereco', $uf_endereco);
    if($stmt->execute()){
        return $this->db->lastInsertId();
    }else{
        return false;
    }

   }

    //Metodo de deletar usuario
    function deletarUsuario($id){
    $dataatual = date('Y-m-d H:i:s');
    $sql = "UPDATE tbl_endereco SET 
    excluido_em = :atual
    WHERE id_endereco = :id";
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