<!DOCTYPE html>
<html>
<?php 
session_start();
include dirname(__DIR__).'/general/openDB.php';

$medication_id = $_POST["remove_medication"];

$sql = "delete from patient_medication where patient_id = $_SESSION[id] and medication_id = $medication_id";

if (mysqli_query($link, $sql)) {
    echo "Medication removed successfully";
    header("location: patientprofile.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($link);}

include dirname(__DIR__).'/general/closeDB.php';
?> 
</html>