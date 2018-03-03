<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Estudo Crud PDO</title>
</head>
<body>
<h1>Estudos Crud PDO</h1>
<hr>
<p><a href="index.php">Home</a> - <a href="read.php">Listar</a></p>
<hr>
<h2>Cadastrar funcionários </h2>

<form action="insert.php" method="POST">
  Nome : <input type="text" name="name"><br>
  E-mail : <input type="text" name="email"><br>
  Data nascimento: <input type="date" name="birth"><br>
  Cargo: <input type="text" name="position"><br>
  Setor: <input type="text" name="dep"><br>
  Salario: <input type="number" name="salary"><br>
  Foto: <input type="text" name="photo"><br>
  <input type="submit" value="Enviar">
</form>
    
</body>
</html>