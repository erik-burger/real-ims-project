<!DOCTYPE html>
<html>
<?php 
session_start();
include dirname(__DIR__).'/general/openDB.php';

//$medication_name = mysqli_real_escape_string($link, $_POST["medication_name"]);
$dose = mysqli_real_escape_string($link, $_POST["dose"]);
$dose = htmlspecialchars($dose); 

$medication_interval = mysqli_real_escape_string($link, $_POST["interval"]);
$medication_interval = htmlspecialchars($medication_interval);

$medication_id = $_POST["medication_id"];

$sql = "insert into patient_medication (patient_id, medication_id, dose, medication_interval) 
values ($_SESSION[id], $medication_id, '$dose', '$medication_interval')";

if (mysqli_query($link, $sql)) {
    echo "New medication added successfully";
    header("location: ../general/profile_page.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($link);}

include dirname(__DIR__).'/general/closeDB.php';
?> 
</html>