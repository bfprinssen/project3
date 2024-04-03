<?php

try {
    include 'conn.php';
    // echo '<pre>'.print_r($_POST, true).'</pre>';
    if (isset($_POST['verzenden'])) {

        // $sql = "INSERT INTO users (username, password)
        // VALUES ('".$_POST['username']."', '".$_POST['password']."')";
        // echo $sql;
        // $db->exec($sql);
        // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        $query = $db->prepare("SELECT * FROM users WHERE username = :username");
        $query->bindParam(":username", $username);
        $query->execute();
        if ($query->rowCount() == 1) {
         echo "$username bestaat al!";
         exit();
        }

         $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
         $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);
         $password = password_hash("$password", PASSWORD_DEFAULT);

         $query = $db->prepare("INSERT INTO users(username, password) VALUES (:username, :password)");
         $query->bindParam(":username", $username);
         $query->bindParam(":password", $password);

        // echo "New record created successfully";
        }
        if($query->execute() ) {
            header('location: /home.php');
        } else {
            echo "Er is een fout opgetreden!";
        }
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}
?>