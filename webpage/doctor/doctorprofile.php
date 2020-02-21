<html>
<?php
session_start();
/*Restrict access for other users or not logged*/ 
if (isset($_SESSION["user"]) or isset($_SESSION["loggedin"])) {
    if ($_SESSION["user"] !== "D" or $_SESSION["loggedin"] == false){ // if the user is a patient -> logout
    echo "<script>window.location.href = '../general/login.php';</script>";
    }
}  
?> 

<meta http-equiv="refresh" content="3600;url=../general/logout.php" />
    <head>
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
                .prof_button, .pass_button{
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
            .profile{
                display: inline-block;  
            }
            .page{
                margin-left: auto; 
                margin-right: auto; 
                padding: 10px;
                width: 95%; 
                margin-bottom: 50px;   
            }
            .container {
 		 	border-radius: 10px;
  			background-color: #f2f2f2;
  			padding-left: 20px;
  			width:95%;
  			margin-right: auto;
  			margin-left:auto;
            margin-bottom: 20px; 
            margin-top: 20px;
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
            <li><a href="doctorstart.php">Home</a></li>
            <li><a href="doctor_contact.php">Contact</a></li>
            <li><a href="doctorprofile.php">Profile</a></li>
            <li class="active"><a href="doctorsearch.php">Patients</a></li>
            <li><a href="chat_home_doctor.php">Messages</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="../general/logout.php">Logout</a></li>
            </ul>
        </div>
    </nav>
    
    <div class = "page">
        <h1>Your profile</h1>
   
    <div class = "container">
    <?php
        include dirname(__DIR__).'/general/openDB.php';
        $result = mysqli_query($link, "select first_name, last_name, doctor_id, phone, street, street_no, zip, city, country, picture 
        from doctor
        where doctor_id = $_SESSION[id]")   
        or 
        die("Could not issue MySQL query"); 
        
        while ($row = $result->fetch_assoc()) {
            $first_name = $row["first_name"];
            $last_name = $row["last_name"];
            $doctor_id = $row["doctor_id"];
            $street = $row["street"];
            $street_no = $row["street_no"];
            $zip = $row["zip"]; 
            $city = $row["city"];
            $country = $row["country"];
            $phone = $row["phone"];
            $picture = $row["picture"]; 
     
            echo '<b>'."Name: ".'</b>'.$first_name." ".$last_name.'<br />';
            echo '<b>'."ID: ".'</b>' .$doctor_id.'<br />';
            echo '<b>'."Telephone: ".'</b>'.$phone.'<br />';
            echo '<b>'."Adress: ".'</b>'.$street. " ".$street_no." ".$zip." ".$city." ".$country.'<br />';
            echo '<b>'."Profile Picture:".'</b>'.$picture. '<br />';
        }
       
        include dirname(__DIR__).'/general/closeDB.php';

    ?>

    <form action="change_info_doctor.php" class = "profile">
        <button type = "submit" class = "prof_button">Change Information</button>
    </form>
    <form action="change_password_doctor.php" class = "profile">
        <button type = "submit" class = "pass_button">Change Password</button>
    </form></br>
    </div>
    </div>
    </div>
    </body>

</html>
