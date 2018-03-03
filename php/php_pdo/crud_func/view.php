<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Estudo Crud PDO</title>
</head>
<body>
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
  <h1>Estudos Crud PDO</h1>

  <h2>Lista de funcionários </h2>

  <p> <strong> Id: </strong><?= $result->id; ?></p>
  <p> <strong> Nome: </strong><?= $result->name; ?></p>
  <p> <strong> Email: </strong><?= $result->email; ?></p>
  <p> <strong> Data nascimento: </strong><?= $birth;?></p>
  <p> <strong> Idade: </strong><?= $age; ?> anos</p>
  <p> <strong> Cargo: </strong><?= $result->position; ?></p>
  <p> <strong> Setor: </strong><?= $result->dep; ?></p>
  <p> <strong> Salario: </strong><?= $result->salary; ?></p>
  <p> <strong> Foto: </strong><?= $result->photo; ?></p>
  <p> <strong> Status: </strong><?= $result->status == 1 ? "ATIVO" : "DESATIVADO"; ?></p>
    
</body>
</html>