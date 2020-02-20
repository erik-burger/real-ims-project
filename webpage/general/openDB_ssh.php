<?php

define('DB_SERVER', 'back.db1.course.it.uu.se:3306');
define('DB_USERNAME', 'spring20_ims_2');
define('DB_PASSWORD', 'WwtPqL1R');
define('DB_NAME', 'spring20_ims_2');
define('SERVER_IP', 'beurling.it.uu.se');
define('username', 'rape5194');
define('password', 'Fgng3maTs!');


$connection = ssh2_connect(SERVER_IP, 22);

ssh2_auth_password($connection, username, password);

$tunnel = ssh2_tunnel($connection, 'back.db1.course.it.uu.se', 3306);



$link = mysqli_connect('127.0.0.1', DB_USERNAME, DB_PASSWORD, 
                         DB_NAME, 3306, $tunnel);

if (!$link) {
	echo "Error: Unable to connect to MySQL." . mysqli_connect_error() . PHP_EOL;
	exit;
}
?>