<?php
if(session_status() === PHP_SESSION_NONE) {session_start();}



try {
   include 'conn.php';

    if (isset($_POST)) {
        $tweet_message =  filter_input(INPUT_POST, "tweet_message", FILTER_SANITIZE_STRING);
        $tweet_user =  $_SESSION['UID'] ;

        $query = $db->prepare("INSERT INTO tweets(user_id, tweet_message) VALUES (:tweet_user,:tweet_message)");
        $query->bindParam(":tweet_message", $tweet_message);
        $query->bindParam(":tweet_user", $tweet_user);

        if($query->execute()) {
            header('location: tweetviewer.php');
        } else {
            echo "Er is een fout opgetreden!";
        }
        echo "<br>";
    }

} catch (PDOException $e) {
    die("Error!: " . $e->getMessage());
}

?>