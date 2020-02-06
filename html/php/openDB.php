
<?php
$hostname = "back.db1.course.it.uu.se"; 
$username = "spring20_ims_2"; 
$password = "WwtPqL1R"; 
$dbname   = "spring20_ims_2"; 
$link = mysqli_connect($hostname, $username, $password, $dbname); 
 
if (!$link) {   echo "Error: Unable to connect to MySQL." 
. mysqli_connect_error() . PHP_EOL;  exit; } 
?>