<html>
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
        display: block;
        font-size: 16px;   
        margin-top: 10px;
        margin-bottom: 10px; 
        margin: auto;           
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
.button{
background-color: #669999; 
border: none;
color: white;
padding: 14px 32px;
text-align: center;
text-decoration: none;
display: inline-block;
font-size: 16px;

}
.page{
    margin-left: auto; 
    margin-right: auto; 
    padding: 10px;
    width: 80%; 
    margin-bottom: 50px;   
}
</style>
<?php
session_start();
$logedin = $_SESSION["loggedin"];
$user = $_SESSION["user"];
if (isset($logedin) or isset($user)) {
    if ($logedin == 1) {
        switch ($user) {
            case 'D':
                ?>
                    <!DOCTYPE html>

                    <?php
                    /*Restrict access for other users or not logged*/ 
                    if (isset($_SESSION["user"]) or isset($_SESSION["loggedin"])) {
                        if ($_SESSION["user"] !== "D" or $_SESSION["loggedin"] == false){ // if the user is a patient -> logout
                        echo "<script>window.location.href = '../general/login.php';</script>";
                        }
                    } 
                    ?>

                    <html>
                    <head>
                            <meta charset="UTF-8">
                            <meta name="viewport" content="width=device-width, initial-scale=1">
                            
                        <body>


                        <nav class="navbar navbar-inverse">
                            <div class="container-fluid">
                                <div class="navbar-header">
                                    <img class="logo" src="../general/logo_small.png" width = 50>
                                </div>
                                <ul class="nav navbar-nav">
                                <li class="active"><a href="start_page.php">Home</a></li>
                                <li><a href="../general/contact.php">Contact</a></li>
                                <li><a href="../general/profile_page.php">Profile</a></li>
                                <li><a href="../doctor/doctorsearch.php">Patients</a></li>
                                <li class="active"><a href="chat_home.php">Messages</a></li>
                                </ul>
                                <ul class="nav navbar-nav navbar-right">
                                    <li><a href="../general/logout.php">Logout</a></li>
                                </ul>
                            </div>
                        </nav>

                    <div class = "page">
                    <h1>My Messages</h1>
                    <body>
                    <button onclick="window.location.href = 'chat.php';" class = newbutton>New Message</button>
                    <br><div text-align="center">
                    <table style="width:80%" align="center" >
                        <tr>
                        <th align = 'center'>Time</th>
                        <th align = 'center'>First Name</th>
                        <th align = 'center'>Last Name</th>
                        <th align = 'center'>Status</th>
                        </tr>
                    </div>
                    <?php
                    include dirname(__DIR__).'/general/openDB.php';

                    $sql = "select c.chat_message_id, p.first_name, p.last_name, c.from_user_id, c.from_user_type, c.date_time, c.message_status from chat c 
                    join patient p on c.from_user_id = p.patient_id
                    where to_user_id = $_SESSION[id] and to_user_type = '$_SESSION[user]' order by c.date_time DESC"; 
                    $result = mysqli_query($link, $sql) 
                    or die("Could not issue MySQL query");

                    include dirname(__DIR__).'/general/closeDB.php';

                    if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $chat_id = $row["chat_message_id"];
                        if ($row["message_status"] == 0){$status = "New";}else{$status = "";}
                        echo "<tr><td align = 'center'><a href ='chat_read.php?chat_id=$chat_id'>".$row["date_time"]."</td>
                        <td align = 'center'>" . $row["first_name"]. "</td>
                        <td align = 'center'>" . $row["last_name"] . "</td>
                        <td align = 'center'>" . $status . "</a></td></tr>";
                    }
                    echo "</table>";
                    }  
                    ?>
                    </div>
                    </html>
                <?php
                break;
            case 'P':
                ?>
                    <!DOCTYPE html>
                    
                    <?php
                    /*Restrict access for other users or not logged*/ 
                    if (isset($_SESSION["user"]) or isset($_SESSION["loggedin"])) {
                        if ($_SESSION["user"] !== "P" or $_SESSION["loggedin"] == false){ // if the user is a patient -> logout
                        echo "<script>window.location.href = '../general/login.php';</script>";
                        }
                    } 
                    ?>

                    <html>
                    <meta http-equiv="refresh" content="3600;url=../general/logout.php" />
                    <body>
                    <nav class="navbar navbar-inverse">
                            <div class="container-fluid">
                                <div class="navbar-header">
                                    <img class="logo" src="../general/logo_small.png" width = 50>
                                </div>
                                <ul class="nav navbar-nav">
                                <li class="active"><a href="start_page.php">Home</a></li>            
                                </ul>
                                <ul class="nav navbar-nav navbar-right">
                                    <li><a href="../general/logout.php">Logout</a></li>
                                </ul>
                            </div>
                        </nav>
                        <div class = "page">
                    <h1>My Messages</h1>
                    <body>
                    <button onclick="window.location.href = 'chat.php'" class = newbutton >New Message</button>
                    <br><table style="width:80%" align="center">
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
                    where to_user_id = $_SESSION[id] and to_user_type = 'P' 
                    union
                    select c.chat_message_id, ca.first_name, ca.last_name, c.from_user_id, c.from_user_type, c.date_time, c.message_status from chat c 
                    join caregiver ca on c.from_user_id = ca.caregiver_id
                    where to_user_id = $_SESSION[id] and to_user_type = 'P' order by date_time DESC";
                    $result = mysqli_query($link, $sql) 
                    or die("Could not issue MySQL query");

                    include dirname(__DIR__).'/general/closeDB.php';
                    if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $chat_id = $row["chat_message_id"];
                        if ($row["message_status"] == 0){$status = "New";}else{$status = "";}
                        echo "<tr><td align = 'center'><a href ='chat_read.php?chat_id=$chat_id'>".$row["date_time"]."</td>
                        <td align = 'center'>" . $row["first_name"]. "</td>
                        <td align = 'center'>" . $row["last_name"] . "</td>
                        <td align = 'center'>" . $status . "</a></td></tr>";
                        
                    }
                    echo "</table>";
                    } 
                    ////<td><a href ='../patient/patientdoctor.php?id=$p_id'>". $p_id. "</a></td></tr>";//link timestamp to messsage  
                    ?>
                    </div>
                    </html>
                                    <?php
                                    break;
                                case 'C':
                                    ?>
                                        <body>
                                        <nav class="navbar navbar-inverse">
                                            <div class="container-fluid">
                                                <div class="navbar-header">
                                                    <img class="logo" src="../general/logo_small.png" width = 50>
                                                    <ul class="nav navbar-nav">
                                                    <li><a href="start_page.php">Home</a></li> 
                                                    <li><a href="../general/contact.php">Contact</a></li>  
                                                    <li><a href="../general/profile_page.php">Profile</a></li>
                                                    <li class="active"><a href="chat_home.php">Messages</a></li>            
                                                    </ul>
                                                    <ul class="nav navbar-nav navbar-right">
                                                    <li><a href="../general/logout.php">Logout</a></li>
                                                </ul>
                                            </div>
                                        </nav>
                                    <div class = "page">      
                                    <h1>My Messages</h1>
                                    <body>
                                    <br><button onclick="window.location.href = '../general/chat.php'" class = "newbutton">New Message</button>
                                    <br>
                                    <table style="width:80%" align="center">
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
                                    where to_user_id = $_SESSION[id] and to_user_type = '$_SESSION[user]' order by c.date_time DESC"; 
                                    $result = mysqli_query($link, $sql) 
                                    or die("Could not issue MySQL query");

                                    include dirname(__DIR__).'/general/closeDB.php';

                                    if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        $chat_id = $row["chat_message_id"];
                                        if ($row["message_status"] == 0){$status = "New";}else{$status = "";}
                                        echo "<tr><td align = 'center'><a href ='chat_read.php?chat_id=$chat_id'>".$row["date_time"]."</td>
                                        <td align = 'center'>" . $row["first_name"]. "</td>
                                        <td align = 'center'>" . $row["last_name"] . "</td>
                                        <td align = 'center'>" . $status . "</a></td></tr>";
                                    }
                                    echo "</table>";
                                    }  
                                    ?>
                                    </html>
                                    <?php
                                    break;
                            }
                        } else {
                        echo "<script>window.location.href = '../general/login.php';</script>";
                        }
                        
                    }
                    ?>
                    </div> 
                    </html>