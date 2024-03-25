<<<<<<< Updated upstream
<?php

require_once ('authenticate.php');

$db = new PDO("mysql:host=localhost;dbname=y", "root", "");

=======
<?php

echo 'CONN';

if($_SERVER['HTTP_HOST']=='benny.221.projectserver.nl'){
    echo 'server';
    $db = new PDO("mysql:host=localhost;dbname=benny_db", "benny_db", "b3nth3m@n");
}
else{
    $db = new PDO("mysql:host=localhost;dbname=y", "root", "");
}


>>>>>>> Stashed changes
