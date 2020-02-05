
<?php
$hostname = "localhost:3308"; 
$username = "root"; 
$password = "root";
$dbname   = "ims"; 
$link = mysqli_connect($hostname, $username, $password, $dbname); 
 
if (!$link) {   echo "Error: Unable to connect to MySQL." 
. mysqli_connect_error() . PHP_EOL;  exit; } 
?>