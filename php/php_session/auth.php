<?php
session_start();

  function auth_login(string $username, string $password): array
  {
    $login = 'Teste1';
    $senha = '123456';

    if($username == $login && $password == $senha)
    {
      $user = ['id' => 1, 'username'=> $username];
      $_SESSION['user'] = $user;
      // var_dump($_SESSION['user']);        
    } else {
      $user = ['error' => 'Usuario não logaodo'];
      $_SESSION['user'] = $user;
    }

    return $user;
  }

  function auth_current_user(): array
  {
    // Retorna o usuario logado
    return $_SESSION['user'];
  }