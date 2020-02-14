<?php

session_start();
include dirname(__DIR__).'/general/openDB.php';
$result = mysqli_query($link,"SELECT share_data FROM patient WHERE patient_id = $_SESSION[id]")   
or 
die("Could not issue MySQL query"); 
while ($row = $result->fetch_assoc()) {
    $share_data = $row["share_data"];
}
if ($share_data == 1) {
    mysqli_query($link,"UPDATE patient SET share_data = 0
    WHERE patient_id = $_SESSION[id]");
} else {
    mysqli_query($link,"UPDATE patient SET share_data = 1
    WHERE patient_id = $_SESSION[id]");
}
header("location: patientprofile.php");
?>