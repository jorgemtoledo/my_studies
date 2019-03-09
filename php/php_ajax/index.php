<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Teste insert via Ajax</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>

<!-- 
Create table database
mysql> create table users(
    -> id INT NOT NULL AUTO_INCREMENT,
    -> name VARCHAR(100) NOT NULL,
    -> email VARCHAR(100) NOT NULL,
    -> PRIMARY KEY (id)
    -> );
 -->

  <!--The "message" id will be display via PHP and AJAX-->
  <p id="message"></p>     
  <form id="id_form" action="" method="post">
      <input type="text" name="name" placeholder="Name" required>
      <input type="email" name="email" placeholder="Email" required>
      <button  type="submit">Insert</button>
  </form>
  
  <!--AJAX-->
  <script type="text/javascript"> 
    $(document).ready(function () {
      // function form
      $('#id_form').submit(function(e){
        // Cancela evento (https://developer.mozilla.org/pt-BR/docs/Web/API/Event/preventDefault)
        e.preventDefault();

        // ajax
        $.ajax({
          // url para insert
          url: "insert.php",
          method: "post",
          data: $("form").serialize(),
          dataType: "text",
          success: function(strMessage) {
            $("#message").text(strMessage);
            $("#id_form")[0].reset();
          }
        });        
      });
    }); 
  </script>
</body>
</html>