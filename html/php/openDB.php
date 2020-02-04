
<?php
$hostname = "localhost:3306"; 
$username = "root"; 
<<<<<<< HEAD
$password = "root"; 
=======
$password = "riekstsdru"; 
>>>>>>> 42f29035cc61f3bdb2dfa35ce04c643a08e1cbe8
$dbname   = "ims"; 
$link = mysqli_connect($hostname, $username, $password, $dbname); 
 
if (!$link) {   echo "Error: Unable to connect to MySQL." 
. mysqli_connect_error() . PHP_EOL;  exit; } 
?>