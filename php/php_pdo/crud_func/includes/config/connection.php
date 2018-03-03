<?php
  function getConnection()
  {
    // Variaveis para conexão com o banco de dados
    $driver = 'mysql';
    $host = 'localhost';
    $db = 'crud_func';
    $user = 'root';
    $pass = 'root';

  // Conexão usando PDO
    $dsn = "$driver:host=$host;dbname=$db";
    // echo "OK";
    try{
      $pdo = new PDO($dsn, $user, $pass);
      return $pdo;
    } catch(PDOException $ex){
      echo 'Errooo '.$ex->getMessage();
    }
  }

?>