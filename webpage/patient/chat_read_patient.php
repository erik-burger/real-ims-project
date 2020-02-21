<!DOCTYPE html>
<?php
session_start();
/*Restrict access for other users or not logged*/ 
if (isset($_SESSION["user"]) or isset($_SESSION["loggedin"])) {
    if ($_SESSION["user"] !== "P" or $_SESSION["loggedin"] == false){ // if the user is a patient -> logout
    echo "<script>window.location.href = '../general/login.php';</script>";
    }
} 
?>
<html>
<meta charset="UTF-utf-8">
    <meta name="description" content="Statistics page for patients">
    <title>Trackzheimers</title>
    <link rel="stylesheet" href="top_menu_style.css">
    <link rel="stylesheet" href="../general/IMS_Style.css">
    <style>
            ul{
                list-style-type: none;
                margin: 0;
                padding: 0;
            }
            .logo {
                display: inline-block;
                float: left; 

            .newbutton{
                background-color: #669999; 
                border: none;
                color: white;
                padding: 14px 10px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;   
                margin-top: 10px;
                margin-bottom: 10px; 
                margin-left: 1px;              
            }      
            * {
            box-sizing: border-box;
            }

            .column {
            float: left;
            width: 50%;
            padding: 10px;
            height: 300px; 
            }

            .page:after {
            content: "";
            display: table;
            clear: both;
            }  

            input[type = text], select , textarea{
    		padding: 15px;
    		border: 1px solid #ccc;
    		border-radius; 4px;
      }

        </style>
        <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <img class="logo" src="../general/logo_small.png" width = 50>
            </div>
            <ul class="nav navbar-nav">
            <li class="active"><a href="patientstart.php">Home</a></li>            
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="../general/logout.php">Logout</a></li>
            </ul>
        </div>
    </nav>
<body>
<?php
$chat_message_id = $_GET["chat_id"];
include dirname(__DIR__).'/general/openDB.php';

$update = mysqli_query($link, "update chat set message_status = 1 where chat_message_id = $chat_message_id")
or die("Could not issue 1");
$typesql = mysqli_query($link, "select from_user_type from chat where chat_message_id = $chat_message_id")
or die("Could not issue 2");
$from_user_type = mysqli_fetch_assoc($typesql)["from_user_type"];

if($from_user_type == "D"){
    $sql =  "select c.from_user_id, c.from_user_type, c.chat_message, c.date_time, d.first_name, d.last_name 
    from chat c join doctor d on c.from_user_id = d.doctor_id where chat_message_id = $chat_message_id"; //change status to read and fetch data 
    $result = mysqli_query($link, $sql)
    or die("Could not issue MySQL query");
}elseif($from_user_type == "C"){
    $sql =  "select c.from_user_id, c.from_user_type, c.chat_message, c.date_time, ca.first_name, ca.last_name 
    from chat c join caregiver ca on c.from_user_id = ca.caregiver_id where chat_message_id = $chat_message_id"; //change status to read and fetch data 
    $result = mysqli_query($link, $sql)
    or die("Could not issue MySQL query");
}
include dirname(__DIR__).'/general/closeDB.php';

while($row = $result->fetch_assoc()) {
    $first_name = $row["first_name"];
    $last_name = $row["last_name"];
    echo "From: " . $first_name . " " . $last_name . "<br>
    Date and Time: ". $row["date_time"] . "<br>
    Message: <br>". $row["chat_message"];
}
?>
<br>
<div class="center">
    <form action="chat_reply_patient.php" method="post">
    <label for="send_to"><b>Reply to:</b></label><br>
    <select name = "send_to" required>
        <?php print "<option value='$chat_message_id'>" . $first_name . " " . $last_name . "</option>";?>
    </select><br><br<>
        <label for="message" class="center">Answer</label><br />
        <textarea cols="40" rows="5" name="message" id="message"></textarea><br />
        <input type="submit" value="Send" />
    </form>
</div>
</div>
</body>
</html>