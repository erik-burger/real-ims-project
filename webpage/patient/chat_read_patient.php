<!DOCTYPE html>
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
            }
            .newbutton{
                background-color: #669999; 
                border: none;
                color: white;
                padding: 14px 10px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;            
                position:absolute;
                right:13%;
                top: 90%;     
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
p{font-size:1em}
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
<body><br><br>
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
    echo "<label style = 'position:absolute;left:13%'><b>From:</b></label><br><p style = 'position:absolute;left:13%'>" . $first_name . " " . $last_name . "</p><br><br>
    <label style = 'position:absolute;left:13%'><b>Date and Time:</b></label><br><p style = 'position:absolute;left:13%'> ". $row["date_time"] . "</p><br><br>
    <label style = 'position:absolute;left:13%'><b>Message: </b></label><br><p style = 'position:absolute;left:13%'>". $row["chat_message"] . "</p><br>";
}
?>
<br>
<div class="center">
    <form action="chat_reply_patient.php" method="post">
    <label for="send_to" style = "position:absolute;left:13%"><b>Reply to:</b></label><br>
    <select name = "send_to" style = "position:absolute;left:13%" required>
        <?php print "<option value='$chat_message_id'>" . $first_name . " " . $last_name . "</option>";?>
    </select><br><br<><br><br><br>
        <textarea name="message" id="message" style = "height:200px;width:1000px;position:absolute;left:13%"></textarea><br />
        <button class = newbutton type="submit" value="Send">Reply</button>
    </form>
</div>
</div>
</body>
</html>