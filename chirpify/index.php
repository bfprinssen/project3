

<?php
if(session_status() === PHP_SESSION_NONE) session_start();
if (!isset($_SESSION['UID'])) {
     header("Location: login.php");
}else{
      include 'conn.php';

      $query = $db->prepare("SELECT * FROM users WHERE User_id = :id");
      $query->bindParam(":id", $_SESSION['UID']);
      $query->execute();
      $result = $query->fetch(PDO::FETCH_ASSOC);

      $q = "SELECT * FROM users WHERE User_id = ".$_SESSION['UID']." LIMIT 1";
      $stmt = $db->query($q);
      $user = $stmt->fetch();

      // while ($row = $stmt->fetch()) {
      //     echo $row['name']."<br />\n";
      // }
}

// echo '<pre>'.print_r($q ,true).'</pre>';
// echo '<pre>'.print_r($user,true).'</pre>';

?>
<!doctype html>
<html lang="en">
  <head>    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HOME</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="css/main.css" rel="stylesheet">
  </head>
  <body>
<div class="container">
<div class="row justify-content-space-between">
    <div class="col-12 text-center">
     
  <nav class="navbar">     
       <a href="index.php">Home</a>
       <a href="tweetviewer.php">Tweet</a>
       <a href="tweet.php">Tweets maken </a>
        <a href="logout.php">Logout</a> 
        </nav>
              <h1>Hallo <?php echo $user['username'];?></h1>
       
    </div>
</div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>

<?php /*
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <title>User Login</title>
    <style>
    </style>
</head>
<body>
<h2>User Login</h2>

<?php
session_start();
if (isset($_SESSION['error'])) {
    echo "<p>" . $_SESSION['error'] . "</p>";
    unset($_SESSION['error']);
}
?>

<form action="login.php" method="POST">
    <label for="username" class="username">Username:</label>
    <input type="text" id="username" name="username" required><br><br>

    <label for="password" class="password">Password:</label>
    <input type="password" id="password" name="password" required><br><br>

    <input type="submit" value="Login">
</form>

<p>Don't have an account?<a href="/register.php">Register here</a></p>
</body>
</html>*/?>



