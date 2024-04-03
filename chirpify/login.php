<?php
session_start();
$message='';

// echo session_id();
// echo session_status();
// echo '<pre>'.print_r($_POST,true).'</pre>';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
     // The request is using the POST method
         include 'conn.php';

         if(isset($_POST['username']) && isset($_POST['password'])) {

            //echo '<pre>'.print_r($_POST,true).'</pre>';
             $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
             $password = $_POST['password'];
             $query = $db->prepare("SELECT * FROM users WHERE username = :username");
             $query->bindParam(":username", $username);
             $query->execute();
             if ($query->rowCount() == 1) {
                 $result = $query->fetch(PDO::FETCH_ASSOC);

               echo '<pre>'.print_r($result,true).'</pre>';

                 if (password_verify($password, $result['password'])) {


                      $_SESSION["UID"] = $result['User_id'];

                    echo '<pre>'.print_r($_SESSION,true).'</pre>';
                       header("Location: index.php");
                    echo 'OK';

exit();
                 } else {
                  echo 'NOT OK';
                     $message = "Incorrect password!";
                 }
             } else {
                 $message = "Username not found!";
            }
         }

}else{
// echo "NO_POST";
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-10 col-md-6 col-lg-4">
      <div class="card mt-5">
        <div class="card-header">
          User Login
        </div>
        <form action="login.php" method="POST">
        <div class="card-body">
          <?php
           // echo '<pre>'.print_r($_POST,true).'</pre>';
          if($message!=''){
          echo "<p style=\"color:#F00;\">$message</p>";
          }
          ?>
              <label for="username" class="username">Username:</label>
              <input type="text" class="form-control" id="username" name="username" required autocomplete="off">
              <label for="password" class="password">Password:</label>
              <input type="password" class="form-control" id="password" name="password" required autocomplete="off">
            </div>
            <div class="card-footer d-flex justify-content-between">
              <small>Don't have an account?<br>
                <a href="/register.php">Register here</a></small>
                <button type="submit" class="btn btn-success">login</button>
              </div>
            </form>
          </div>
      </div>
  </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/BUmain.css">
    <title>User Login</title>
    <style>
    </style>
</head>
<body>

</body>
</html>
