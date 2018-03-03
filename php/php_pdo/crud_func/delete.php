<? include './includes/config/connection.php'; ?>

<? 
  $conn = getConnection();

//   Delete
  $sql = 'DELETE from emplyees WHERE id = :id';

  // $id = 20;
  $id = $_GET['id'];
  $delete = $conn->prepare($sql);
  $delete->bindParam(':id', $id);

  if($delete->execute())
  {
    echo 'Deletado com sucesso!';
  } else {
    echo 'Erro ao deletar';
  }
?>
<p><a href="read.php">Voltar</a></p>