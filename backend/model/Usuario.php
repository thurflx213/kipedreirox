<?php
/*
A função é um blçoco {} de codigo que pode ser realizado
e pode receber (parametros)
e ele fica esperando ser chamado

*/

/* Executa uma instrução preparada passando um array de valores */
function buscaUsuarios($db){
  $sql = 'SELECT id_usuario, nome_usuario, email_usuario FROM tbl_usuario ';
$statment = $db->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
$statment->execute();
return $resultado = $statment ->fetchAll();
}
function buscarUsuarioPorId($db, $id) {
    $sql = 'SELECT id_usuario, nome_usuario, email_usuario FROM tbl_usuario WHERE id_usuario = :id';
    $statement = $db->prepare($sql);
    $statement->bindParam(':id', $id);
    return $statement->execute();
}
function registrarUsuario($db, $nome, $email, $senha) {
    $sql = "INSERT INTO tbl_usuario (nome_usuario, email_usuario, senha_usuario)
            VALUES (:nome, :email, :senha)";
    $statement = $db->prepare($sql);
    $statement->bindParam(':nome', $nome);
    $statement->bindParam(':email', $email);
    $statement->bindParam(':senha', $senha);

    return $statement->execute();
}

// $ok = registrarUsuario($db, 'rodrigo', 'rodrigo6@xxx.com', "123456");
// echo $ok;
// $resultado = buscaUsuarios($db);

