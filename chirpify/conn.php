<?php

// echo 'CONN';

if($_SERVER['HTTP_HOST']=='benny.221.projectserver.nl'){
    // echo 'server';
    $db = new PDO("mysql:host=localhost;dbname=benny_db", "benny_db", "b3nth3m@n");
}
else{
    $db = new PDO("mysql:host=localhost;dbname=benny_db", "root", "");
}

