<?php

session_start();
$message='';

//echo '<pre>'.print_r($_POST,true).'</pre>';

 include 'conn.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
  $query = $db->prepare("SELECT * FROM users WHERE username = :username");
  $query->bindParam(":username", $username);
  $query->execute();
  if ($query->rowCount() > 0 ) {
   $message=  "$username bestaat al!";
  } else{

   $message=  "$username bestaat niet";

              $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);
               $password = password_hash("$password", PASSWORD_DEFAULT);

               $query = $db->prepare("INSERT INTO users(username, password) VALUES (:username, :password)");
               $query->bindParam(":username", $username);
               $query->bindParam(":password", $password);

              // echo "New record created successfully";
              if($query->execute() ) {
                  header('location: /index.php');
              } else {
                   $message= "Er is een fout opgetreden!";
              }
            }
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-12 col-md-6 col-lg-4">

    <div class="card mt-3">
      <div class="card-header">
        Register
      </div>
      <div class="card-body">
        <?php
         // echo '<pre>'.print_r($_POST,true).'</pre>';
        if($message!=''){
        echo "<p style=\"color:#F00;\">$message</p>";
        }
        ?>
          <form method="POST">
          <label for="username">Username:</label>
          <input type="text" name="username" id="username" class="form-control" required><br>

          <label for="password" >Password: </label>
          <input class="form-control" type="password" name="password" id="password" required><br>
 <button class="btn btn-success w-100" type="submit" name="button">verzenden</button>

      </form>
      </div>
    </div>

  </div>

</div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
