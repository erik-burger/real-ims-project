<!DOCTYPE html>

<?php
session_start();
/*Restrict access for other users or not logged*/ 
if (isset($_SESSION["user"]) or isset($_SESSION["loggedin"])) {
    if ($_SESSION["user"] !== "C" or $_SESSION["loggedin"] == false){ // if the user is a patient -> logout
    echo "<script>window.location.href = '../general/login.php';</script>";
    }
} 
?>

<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
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
    hr {
        border: 10px solid ghostwhite;
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
        margin-top: 10px;
        margin-bottom: 10px; 
        margin-left: 1px;              
    }      
    .table, th, td {
        padding: 15px; 
        border: 1px white;
        border-collapse: collapse;
        border-bottom: 1px solid #ddd;
        border-top: 1px solid #ddd;
    }
    .ul{
        list-style-type: none;
        margin: 0;
        padding: 0;
    }
    .logo {
        display: inline-block;
        float: left; 
    }

    .sideBySide{
    display: inline-block;
    padding: 20px
    }

    input[type = text], select , textarea{
        padding: 15px;
        border: 1px solid #ccc;
        border-radius; 4px;
    }
    table, th, td {
                padding: 15px; 
                border: 1px white;
                border-collapse: collapse;
                border-bottom: 1px solid #ddd;
                border-top: 1px solid #ddd;
                Text-align: center;
            }
          ul{
            list-style-type: none;
            margin: 0;
            padding: 0;
          }
          .logo {
              display: inline-block;
              float: left; 
          }

          .sideBySide{
        display: inline-block;
        padding: 20px
        }
    
    	input[type = text], select , textarea{
    		padding: 15px;
    		border: 1px solid #ccc;
    		border-radius; 4px;
      }
      .button {
      background-color: #669999; 
      border: none;
      color: white;
      padding: 14px 32px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      
    }

</style>
    </head>

    <body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <img class="logo" src="../general/logo_small.png" width = 50>
                <ul class="nav navbar-nav">
                <li><a href="caregiverstart.php">Home</a></li> 
                <li><a href="caregiver_contact.php">Contact</a></li>  
                <li><a href="caregiverprofile.php">Profile</a></li>
                <li class="active"><a href="chat_home_caregiver.php">Messages</a></li>            
                </ul>
                <ul class="nav navbar-nav navbar-right">
                <li><a href="../general/logout.php">Logout</a></li>
            </ul>
        </div>
    </nav>

<h1>My Messages</h1>
<body>
<button onclick="window.location.href = 'chat_caregiver.php'" class = "newbutton">New Message</button>

<table style="width:50%" align="center">
    <tr>
    <th align = 'center'>Time</th>
    <th align = 'center'>First Name</th>
    <th align = 'center'>Last Name</th>
    <th align = 'center'>Status</th>
    </tr>

<?php

include dirname(__DIR__).'/general/openDB.php';

$sql = "select c.chat_message_id, p.first_name, p.last_name, c.from_user_id, c.from_user_type, c.date_time, c.message_status from chat c 
join patient p on c.from_user_id = p.patient_id
where to_user_id = $_SESSION[id] and to_user_type = '$_SESSION[user]'"; 
$result = mysqli_query($link, $sql) 
or die("Could not issue MySQL query");

include dirname(__DIR__).'/general/closeDB.php';

if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
    $chat_id = $row["chat_message_id"];
    if ($row["message_status"] == 0){$status = "New";}else{$status = "";}
    echo "<tr><td align = 'center'><a href ='chat_read_caregiver.php?chat_id=$chat_id'>".$row["date_time"]."</td>
    <td align = 'center'>" . $row["first_name"]. "</td>
    <td align = 'center'>" . $row["last_name"] . "</td>
    <td align = 'center'>" . $status . "</a></td></tr>";
}
echo "</table>";
}  
?>
</html>