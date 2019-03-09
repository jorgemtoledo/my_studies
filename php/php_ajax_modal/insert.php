<?php
 
    //Connection to MySQL
    $con = mysqli_connect('localhost', 'root', '');
 
    if(!$con) {
        die('Not Connected To Server');
    }
 
    //Connection to database
    if(!mysqli_select_db($con, 'tutorials')) {
        echo 'Database Not Selected';
    }
 
    //Create variables
    $name = $_POST['name'];
    $email = $_POST['email'];

    // Select
    $query = mysqli_query($con,"SELECT * FROM users WHERE name='$name' OR email='$email'");

    // Insert
    $sql = "INSERT INTO users (name, email) VALUES ('$name', '$email')";
 
    //Verifica se o nome é valido com string, com preg_match e regex (http://www.devfuria.com.br/php/o-basico-sobre-a-funcao-preg-match/)
    if(!preg_match("/^[a-zA-Z'-]+$/",$name)) { 
       die ("Nome inválido");
    }
  
    //Response
    //Checking to see if name or email already exsist
    if(mysqli_num_rows($query) > 0) {
      echo "Erro! O nome, " . $_POST['name'] . ", ou email, " . $_POST['email'] . ", ja cadastrado.";
    }
    elseif(!mysqli_query($con, $sql)) {
        echo 'Alerta. Error ao inserir os dados.';
    }
    else {
        echo "Ok! Obrigado, " . $_POST['name'] . ". Sua informação foi cdastrada.";
    }
 
    //Close connection
    mysqli_close($con);
 
?>