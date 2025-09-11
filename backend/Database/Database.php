<?php
$username = 'root';
$password ='';
$host = 'localhost';
$dbname = 'kipedreiro';
try{
    $db = new \PDO('mysql:host=localhost;dbname='.$dbname.';charset=utf8mb4', $username, $password, array(
    \PDO::ATTR_EMULATE_PREPARES => false,
    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION

  ));
}catch(\PDOException $e){
    throw new \PDOException ($e->getMessage());
}
/* Executa uma instrução preparada passando um array de valores */

// /* Chaves de arrays podem ser prefizadas com dois-pontos ":" também (opcional) */
// $sth->execute([':calories' => 175, ':colour' => 'yellow']);
// $yellow = $statment->fetchAll();


