<?php

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