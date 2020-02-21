<?php
session_start();
/*Restrict access for other users or not logged*/ 
if (isset($_SESSION["user"]) or isset($_SESSION["loggedin"])) {
    if ($_SESSION["user"] !== "P" or $_SESSION["loggedin"] == false){ // if the user is a patient -> logout
    echo "<script>window.location.href = '../general/login.php';</script>";
    }
} 
?>

<?php
include dirname(__DIR__).'/general/openDB.php';

$from_user_id = $_SESSION["id"];
$from_user_type = $_SESSION["user"];
$previous_chat_id = $_POST["send_to"];
$previous_chat_id = mysqli_real_escape_string($link, $previous_chat_id);
$chat_message = $_POST["message"];
$chat_message = mysqli_real_escape_string($link, $chat_message);
$date_time = gmdate('Y-m-d h:i:s \G\M\T');
$message_status = 0;

$sql = "select from_user_id, from_user_type from chat where chat_message_id = $previous_chat_id";
$result = mysqli_query($link, $sql)
or die("Could not issue MySQL query");
while($row = $result->fetch_assoc()) {
    $to_user_id = $row["from_user_id"];
    $to_user_type = $row["from_user_type"];
}
$sendchat = mysqli_query($link, "insert into chat 
(from_user_id, from_user_type, to_user_id, to_user_type, chat_message, date_time, message_status) values 
($from_user_id, '$from_user_type', $to_user_id, '$to_user_type', '$chat_message', '$date_time', '$message_status')")
or die("Could not issue MySQL query");

include dirname(__DIR__).'/general/closeDB.php';

header("location: chat_home_patient.php")

?>