<?php

session_start();
$SESSION = array();
session_destroy();

header("location: login.php");
exit;

//script added in doctorstart, contact, doctorsearch, doctorprofile, patientstart



?>