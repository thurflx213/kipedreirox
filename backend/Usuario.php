<?php


/* Executa uma instrução preparada passando um array de valores */
function buscaUsuarios($db){
  $sql = 'SELECT id_usuario, nome_usuario, email_usuario FROM tbl_usuario ';
$statment = $db->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
$statment->execute();
$resultado = $statment->fetchAll();
return $resultado = $statment ->fetchAll();
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

