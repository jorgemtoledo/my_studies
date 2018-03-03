<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Estudo Crud PDO</title>
</head>
<body>
<? include './includes/config/connection.php'; ?>
<h1>Estudos Crud PDO</h1>
<hr>
<p><a href="index.php">Home</a> - <a href="create.php">Cadastrar</a></p>
<hr>
<h2>Lista de funcionários </h2>
<? 
  $conn = getConnection();
//   Select
  $sql = 'SELECT * FROM emplyees';
  $select = $conn->prepare($sql);
  $select->execute();
  $results = $select->fetchAll();

  foreach($results as $result) {
    $id = $result['id'];
  ?>

<p>ID: <?= $id ?> Nome: <?= $result['name']; ?> - <? echo "<a href=\"view.php?id=".$id."\">Info </a>"; ?> - <? echo "<a href=\"edit.php?id=".$id."\">Editar </a>"; ?> - <? echo "<a href=\"delete.php?id=".$id."\">Delete </a>"; ?> </p

<? } ?>

    
</body>
</html>