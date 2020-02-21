<!DOCTYPE html>

<?php
session_start();
/*Restrict access for other users or not logged*/ 
if (isset($_SESSION["user"]) or isset($_SESSION["loggedin"])) {
    if ($_SESSION["user"] !== "D" or $_SESSION["loggedin"] == false){ // if the user is a patient -> logout
    echo "<script>window.location.href = '../general/login.php';</script>";
    }
} 
?>

<html>
<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="top_menu_style.css">
        <link href="IMS_Style.css" rel="stylesheet">
        <style>
            ul{
                list-style-type: none;
                margin: 0;
                padding: 0;
            }
            .logo {
                display: inline-block;
                float: left; 
            }
            table, th, td {
                padding: 15px; 
                border: 1px white;
                border-collapse: collapse;
                border-bottom: 1px solid #ddd;
                border-top: 1px solid #ddd;
                Text-align: center;
            }
            
        </style>
    </head>

    <body>


    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <img class="logo" src="../general/logo_small.png" width = 50>
            </div>
            <ul class="nav navbar-nav">
            <li class="active"><a href="doctorstart.php">Home</a></li>
            <li><a href="../general/contact.php">Contact</a></li>
            <li><a href="doctorprofile.php">Profile</a></li>
            <li><a href="doctorsearch.php">Patients</a></li>
            <li class="active"><a href="chat_home_doctor.php">Messages</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="../general/logout.php">Logout</a></li>
            </ul>
        </div>
    </nav>

<?php
$chat_message_id = $_GET["chat_id"];
include dirname(__DIR__).'/general/openDB.php';

$update = mysqli_query($link, "update chat set message_status = 1 where chat_message_id = $chat_message_id")
or die("Could not issue 1");

$sql =  "select c.from_user_id, c.from_user_type, c.chat_message, c.date_time, p.first_name, p.last_name 
from chat c join patient p on c.from_user_id = p.patient_id where chat_message_id = $chat_message_id"; //change status to read and fetch data 
$result = mysqli_query($link, $sql)
or die("Could not issue MySQL query");

include dirname(__DIR__).'/general/closeDB.php';

while($row = $result->fetch_assoc()) {
    $from_user_id = $row["from_user_id"];
    $first_name = $row["first_name"];
    $last_name = $row["last_name"];
    echo "From: " . $row["first_name"] . " " . $row["last_name"] . "<br>
    Date and Time: ". $row["date_time"] . "<br>
    Message: <br>". $row["chat_message"];
}
?>
<br>
<div class="center">
    <form action="chat_reply_doctor.php" method="post">
    <label for="send_to"><b>Reply to:</b></label><br>
    <select name = "send_to" required>
        <?php print "<option value='$from_user_id'>" . $first_name . " " . $last_name . "</option>";?>
    </select><br><br<>
        <label for="message" class="center">Answer</label><br />
        <textarea cols="40" rows="5" name="message" id="message"></textarea><br />
        <input type="submit" value="Send" />
    </form>
</div>
</div>
</body>
</html>