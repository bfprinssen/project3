<<<<<<< Updated upstream
<?php
session_start();
require_once ('authenticate.php');
require 'conn.php';

if (isset($_POST['username'], $_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = $db->prepare("SELECT * FROM users WHERE username = :username");
    $query->bindParam(":username", $username);
    $query->execute();

    $user = $query->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        // The username and password are correct. Start the session and store the user_id
        $_SESSION['user_id'] = $user['User_id'];

        // Redirect the user to the homepage or wherever you want
        header('Location: home.php');
        exit;
    } else {
        // The username or password are incorrect
        echo "Invalid username or password";
    }
}
?>
=======
<?php

session_start();
try {
    include 'conn.php';
    $db = new PDO("mysql:host=localhost;dbname=benny_db", "benny_db", "b3nth3m@n");
    if(isset($_POST['username']) && isset($_POST['password'])) {
        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
        $password = $_POST['password'];
        $query = $db->prepare("SELECT * FROM users WHERE username = :username");
        $query->bindParam(":username", $username);
        $query->execute();
        if ($query->rowCount() == 1) {
            $result = $query->fetch(PDO::FETCH_ASSOC);
            if (password_verify($password, $result['password'])) {
                header("Location: /chirpify/home.php");
                exit();
            } else {
                $_SESSION['error'] = "Incorrect password!";
                header("Location: index.php");
                exit();
            }
        } else {
            $_SESSION['error'] = "Username not found!";
            header("Location: index.php");
            exit();
        }
    }
} catch (PDOException $e) {
    die("Error!: " . $e->getMessage());
}
>>>>>>> Stashed changes
