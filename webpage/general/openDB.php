<?php
<<<<<<< HEAD
$hostname = "localhost:3306"; //"back.db1.course.it.uu.se:3306"; 
$username = "root"; //"spring20_ims_2"; 
$password = ""; //"WwtPqL1R"; 
$dbname   = "ims_out"; //"spring20_ims_2"; 
=======
	
$hostname = "back.db1.course.it.uu.se:3306"; 
$username = "spring20_ims_2"; 
$password = "WwtPqL1R"; 
$dbname   = "spring20_ims_2"; 
>>>>>>> 95b65113ba07f6ea0592ce974231234e25f36017
$link = mysqli_connect($hostname, $username, $password, $dbname); 
 
if (!$link) {   echo "Error: Unable to connect to MySQL." 
. mysqli_connect_error() . PHP_EOL;  exit; } 

?>
