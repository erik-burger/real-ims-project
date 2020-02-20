<?php
session_start();
include dirname(__DIR__).'/general/openDB.php';

$from_user_id = $_SESSION["id"];
$from_user_type = $_SESSION["user"];
$email = $_POST["send_to"];
$chat_message = $_POST["sendie"];
$date_time = gmdate('Y-m-d h:i:s \G\M\T');
$message_status = 0;

$doctorsql = "select doctor_id from doctor where email = '$email'";
$doctorresult = mysqli_query($link, $doctorsql)
or die("Could not issue doctor MySQL query");
$count1 = mysqli_num_rows($doctorresult);

if($count1 == 1) { //if the query returns 1 result proceed to send to doctor
    $to_user_id = mysqli_fetch_assoc($doctorresult)["doctor_id"];
    $to_user_type = "D";
}else{
    $caregiversql = "select caregiver_id from caregiver where email = '$email'";
    $caregiverresult = mysqli_query($link, $caregiversql)
    or die("Could not issue MySQL query");
    $coun2 = mysqli_num_rows($caregiverresult);

    if($coun2 == 1) {
        $to_user_id = mysqli_fetch_assoc($caregiverresult)["caregiver_id"];
        $to_user_type = "C";
    }
}
$sendchat = mysqli_query($link, "insert into chat 
(from_user_id, from_user_type, to_user_id, to_user_type, chat_message, date_time, message_status) values 
($from_user_id, '$from_user_type', $to_user_id, '$to_user_type', '$chat_message', '$date_time', '$message_status')")
or die("Could not issue MySQL query");

include dirname(__DIR__).'/general/closeDB.php';

header("location: chat_home_patient.php")

?>