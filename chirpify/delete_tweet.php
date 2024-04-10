<?php
require('conn.php');

if(isset($_POST['tweet_id'])) {
    $tweet_id = $_POST['tweet_id'];
    $sql = "DELETE FROM tweets WHERE tweet_id = :tweet_id";
    $query = $db->prepare($sql);
    $query->bindParam(':tweet_id', $tweet_id);
    $query->execute();
}

header('Location: index.php');
?>