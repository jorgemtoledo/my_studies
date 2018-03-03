<? include './includes/config/connection.php'; ?>

<? 
  $conn = getConnection();

  $sql = 'INSERT INTO emplyees (name,email, birth, position, dep, salary) VALUES (:name, :email,:birth, :position, :dep, :salary)';

  $name = $_POST['name'];
  $email = $_POST['email'];
  $birth = $_POST['birth'];
  $position = $_POST['position'];
  $dep = $_POST['dep'];
  $salary = $_POST['salary'];


    $insert = $conn->prepare($sql);
    $insert->bindParam(':name', $name);
    $insert->bindParam(':email', $email);
    $insert->bindParam(':birth', $birth);
    $insert->bindParam(':position', $position);
    $insert->bindParam(':dep', $dep);
    $insert->bindParam(':salary', $salary);

    if($insert->execute())
    {
      echo 'OK cadastrado';
    } else {
      echo 'Erro ao cadastrar';
    }
    

  echo "<p><a href='read.php'>Listar</a></p>";



