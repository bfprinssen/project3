<?php
try{
    require('conn.php');
    $sql = "SELECT T.*, U.username AS username FROM tweets T LEFT JOIN users U ON U.User_id= T.user_id";
    $query = $db->prepare($sql);
    $query->execute();
    
    $messages = array();

    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {         
        $messages[] = $row;        
    }
} catch (PDOException $e) {
    die("Error!: " . $e->getMessage());
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tweet</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <strong><link href="css/main.css" rel="stylesheet"></strong>
  </head>
  <body>
 <nav class="navbar">     
       <a href="index.php" class="home">Home</a>
      
       <a href="tweet.php">Tweets maken </a>
        <a href="logout.php" class="logout">Logout</a> 
        </nav>
        
    <div class="container">
  <div class="row justify-content-center">
    <div class="col-10 col-md-6 col-lg-4">
      <div class="card mt-5">
        <div class="card-header">
          Tweets <a href="tweet.php" class="right_twe">Tweets maken </a> 
        </div>
          
           <ul class="list-group list-group-flush">
 
    <?php

foreach($messages as $message){
    
    
    echo "<li class=\"list-group-item\">".$message['username']." zegt : ".htmlspecialchars($message['tweet_message'])." <br> ".date("F j, Y, g:i a" ,strtotime($message['dateCreated']))." </li>";
}


   ?>
                </ul>
</div>
</div>
</div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>