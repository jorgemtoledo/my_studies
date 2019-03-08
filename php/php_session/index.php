<?php
require_once 'auth.php';
// Valindando o input envida via post pelo form
  $username = filter_input(INPUT_POST, 'username');
  $password = filter_input(INPUT_POST, 'password');

  if(!empty($username) && !empty($password))
  {
    $user = auth_login($username, $password);
    header('location: dashboard.php');
  }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>PHP Session</title>
</head>
<body>
  <form method="post">
    <input type="text" name="username" id="username">
    <input type="password" name="password" id="password">
    <input type="submit">
  </form>  
</body>
</html>