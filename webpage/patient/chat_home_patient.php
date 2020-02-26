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
<meta http-equiv="refresh" content="3600;url=../general/logout.php" />
  <head>
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
            border-radius: 4px;
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
            </div>
            <ul class="nav navbar-nav">
            <li class="active"><a href="../general/start_page.php">Home</a></li>            
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="../general/logout.php">Logout</a></li>
            </ul>
        </div>
    </nav>
<h1>My Messages</h1>
<body>
<button onclick="window.location.href = 'chat_patient.php'" class = newbutton >New Message</button>
<table style="width:50%" align="center">
    <tr>
    <th align = "center">Time</th>
    <th align = "center">First Name</th>
    <th align = "center">Last Name</th>
    <th align = "center">Status</th>
    </tr>

<?php
include dirname(__DIR__).'/general/openDB.php';
$sql = "select c.chat_message_id, d.first_name, d.last_name, c.from_user_id, c.from_user_type, c.date_time, c.message_status from chat c 
join doctor d on c.from_user_id = d.doctor_id
where to_user_id = $_SESSION[id] and to_user_type = '$_SESSION[user]'";
$result = mysqli_query($link, $sql) 
or die("Could not issue MySQL query");

include dirname(__DIR__).'/general/closeDB.php';
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
    $chat_id = $row["chat_message_id"];
    if ($row["message_status"] == 0){$status = "New";}else{$status = "";}
    echo "<tr><td align = 'center'><a href ='chat_read_patient.php?chat_id=$chat_id'>".$row["date_time"]."</td>
    <td align = 'center'>" . $row["first_name"]. "</td>
    <td align = 'center'>" . $row["last_name"] . "</td>
    <td align = 'center'>" . $status . "</a></td></tr>";
    
}
echo "</table>";
} 
////<td><a href ='../patient/patientdoctor.php?id=$p_id'>". $p_id. "</a></td></tr>";//link timestamp to messsage  
?>




</html>