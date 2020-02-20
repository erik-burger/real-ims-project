<!DOCTYPE html>
<html>
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="top_menu_style.css">
        <link href="IMS_Style.css" rel="stylesheet">
        <style>
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
        </style>
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



<style>
table, th, td {
                padding: 15px; 
                border: 1px white;
                border-collapse: collapse;
                border-bottom: 1px solid #ddd;
                border-top: 1px solid #ddd;
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
<h1>My Messages</h1>
<body>
<button onclick="window.location.href = 'chat_doctor.php';" class = newbutton>New Message</button>
<div text-align="center">
<table style="width:50%" align="center" >
    <tr>
    <th>Time</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Status</th>
    </tr>
</div>
<?php
session_start();
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
    echo "<tr><td><a href ='chat_read_doctor.php?chat_id=$chat_id'>".$row["date_time"]."</td>
    <td>" . $row["first_name"]. "</td>
    <td>" . $row["last_name"] . "</td>
    <td>" . $status . "</a></td></tr>";
}
echo "</table>";
}  
?>
</html>