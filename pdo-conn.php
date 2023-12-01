<?php

$dbname = "cmudnslhhd_calendar";
$dbuser = "cmudnslhhd";
$dbpass= "Pika12_!_qq";
$dbhost= "localhost";

// Try Connection
try{

    $pdo = new PDO ("mysql:host=" . $dbhost . ";dbname=" . $dbname, $dbuser, $dbpass);
    //$con = new PDO($dsn, $userName, $passwd);

   //$pdo->setAttribute(PDO::ATTR_ERRMODE, POD::ERRMODE_EXCEPTION);
   // echo "Connection Success";
}
catch(PDOException $e){
echo "Error in connection" . $e->getMessage();
exit();
}
?>