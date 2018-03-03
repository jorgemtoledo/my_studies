<? include './includes/config/connection.php'; ?>

<? 
  $conn = getConnection();

// Update

  $sql = 'UPDATE emplyees SET name = :name, email = :email, birth = :birth, position = :position, dep = :dep, salary = :salary, status = :status WHERE id = :id';

  $id = $_POST['id'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $birth = $_POST['birth'];
  $position = $_POST['position'];
  $dep = $_POST['dep'];
  $salary = $_POST['salary'];
  $status = $_POST['status'];

  $update = $conn->prepare($sql);
  $update->bindParam(':name', $name);
  $update->bindParam(':email', $email);
  $update->bindParam(':birth', $birth);
  $update->bindParam(':position', $position);
  $update->bindParam(':dep', $dep);
  $update->bindParam(':salary', $salary);
  $update->bindParam(':status', $status);
  $update->bindParam(':id', $id);

  if($update->execute())
  {
    echo 'OK alterado';
  } else {
    echo 'Erro ao alterar';
  }
  echo "<p><a href='read.php'p>Listar</a></p>";