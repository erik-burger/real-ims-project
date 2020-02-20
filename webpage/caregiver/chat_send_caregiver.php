<?php
session_start();
include dirname(__DIR__).'/general/openDB.php';

$from_user_id = $_SESSION["id"];
$from_user_type = $_SESSION["user"];
$to_user_id = $_POST["send_to"];
$to_user_type = "P";
$chat_message = $_POST["sendie"];
$date_time = gmdate('Y-m-d h:i:s \G\M\T');
$message_status = 0;

$sendchat = mysqli_query($link, "insert into chat 
(from_user_id, from_user_type, to_user_id, to_user_type, chat_message, date_time, message_status) values 
($from_user_id, '$from_user_type', $to_user_id, '$to_user_type', '$chat_message', '$date_time', '$message_status')")
or die("Could not issue MySQL query");

include dirname(__DIR__).'/general/closeDB.php';

header("location: chat_home_caregiver.php")

?>