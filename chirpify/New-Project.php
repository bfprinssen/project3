<<<<<<< Updated upstream
<?php
require_once ('authenticate.php');
?>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "y";

    try {
        $conn = new PDO("mysql:host=$servername;$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
=======

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "y";

    try {
        $conn = new PDO("mysql:host=$servername;$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
>>>>>>> Stashed changes
