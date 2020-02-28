<html>
<?php
session_start();
include dirname(__DIR__).'/general/openDB.php';
$logedin = $_SESSION["loggedin"];
$user = $_SESSION["user"];
$id = $_SESSION["id"];
$patient_id = mysqli_real_escape_string($link, $_POST["patient_id"]);
if (isset($logedin) && isset($user) && isset($id)) {
    if ($logedin == false){ // if the user is a patient -> logout
        echo "<script>window.location.href = '../general/login.php';</script>";
        }
    if ($user == 'D'){
        $sql = "DELETE FROM patient_doctor WHERE doctor_id = '$id' AND patient_id = '$patient_id'";
        mysqli_query($link, $sql)
        or 
        die("Could not issue MySQL query");
        header("location: ../doctor/doctorsearch.php");
    }
    elseif ($user == 'C'){
        $sql = "DELETE FROM patient_caregiver WHERE caregiver_id = '$id' AND patient_id = '$patient_id'";
        mysqli_query($link, $sql)
        or 
        die("Could not issue MySQL query"); 
        header("location: profile_page.php");
    } else {
        header("location: login.php");
    }
    
}