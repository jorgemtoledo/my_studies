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
<h2>Editar funcionários </h2>

<?
include './includes/config/connection.php';
$conn = getConnection();
$id = $_GET['id'];
// echo $id;
$sql = 'SELECT * FROM emplyees WHERE id = :id';
$select = $conn->prepare($sql);
$select->bindValue(":id", $id);
$select->execute();
$result = $select->fetch(PDO::FETCH_OBJ);
$date = $result->birth;
$timestamp = strtotime($date);
$birth = date('d/m/Y', $timestamp);

// Separa em dia, mês e ano
list($day, $month, $year) = explode('/', $birth);
 // Descobre que dia é hoje e retorna a unix timestamp
 $now = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
 // Descobre a unix timestamp da data de nascimento do fulano
 $nasc = mktime( 0, 0, 0, $month, $day, $year);
 // Depois apenas fazemos o cálculo já citado :)
 $age = floor((((($now - $nasc) / 60) / 60) / 24) / 365.25);
?>

<form action="update.php" method="POST">
  <input type="hidden" name="id" value="<?= $result->id; ?>">
    Nome : <input type="text" name="name" value="<?= $result->name; ?>"><br>
    E-mail : <input type="text" name="email" value="<?= $result->email; ?>"><br>
    Data nascimento: <input type="date" name="birth" value="<?= $result->birth; ?>"><br>
    Cargo: <input type="text" name="position" value="<?= $result->position; ?>"><br>
    Setor: <input type="text" name="dep" value="<?= $result->dep; ?>"><br>
    Salario: <input type="number" name="salary" value="<?= $result->salary; ?>"><br>
    Foto: <input type="text" name="photo" value="<?= $result->photo; ?>"><br>
    Status:
    <? if($result->status == 1){ ?>
    <input type="radio" name="status" value="1" checked>Ativo
    <input type="radio" name="status" value="0">Desativado<br>
    <? } else { ?>
    <input type="radio" name="status" value="1">Ativo
    <input type="radio" name="status" value="0" checked>Desativado<br>
    <? } ?>
  <input type="submit" value="Enviar">
</form> 
    
</body>
</html>