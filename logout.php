<?php
session_start();
session_destroy();

 echo '<hr><pre>'.print_r($_SESSION,true).'</pre><hr/>';
header("Location: project3/chirpify/index.php");
 ?>