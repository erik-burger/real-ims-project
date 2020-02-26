<html>

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
                .prof_button, .pass_button, .patient_button{
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
         /*remove the number arrows*/
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
            input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
            }

            /* Firefox */
            input[type=number] {
            -moz-appearance:textfield;
            }
     
            * {
            box-sizing: border-box;
            }

            .column {
            float: left;
            width: 50%;
            padding: 10px;
            height: 00px; 
            }

            .page:after {
            content: "";
            display: table;
            clear: both;
            }  
            .profile{
                display: inline-block;  
            }
            input[type = text], select , textarea{
    		padding: 15px;
    		border: 1px solid #ccc;
    		border-radius; 4px;
            }

            input[type = number] {
    		padding: 15px;
    		border: 1px solid #ccc;
    		border-radius; 4px;
            }
            .container {
 		 	border-radius: 10px;
  			background-color: #f2f2f2;
  			padding-left: 20px;
  			width:95%;
  			margin-right: auto;
  			margin-left: auto;
            margin-bottom: 20px; 
            margin-top: 20px;
            font-size:18;
        } 
        
        hr {
                border: 10px solid ghostwhite;
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
            <html>
    <meta http-equiv="refresh" content="3600;url=../general/logout.php" />
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="top_menu_style.css">
        <link href="IMS_Style.css" rel="stylesheet">
    </head>
    <body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <img class="logo" src="../general/logo_small.png" width = 50>
            </div>
            <ul class="nav navbar-nav">
            <li><a href="../general/start_page.php">Home</a></li>
            <li><a href="../general/contact.php">Contact</a></li>
            <li><a href="doctorprofile.php">Profile</a></li>
            <li class="active"><a href="doctorsearch.php">Patients</a></li>
            <li><a href="../general/chat_home.php">Messages</a></li>
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
                <?php
                break;
            case 'P':
                ?>
                <!--Code-->
                <?php
                break;
            case 'C':
                ?>
                 <html>
                     <style>
                         table, th, td {
                        padding: 15px; 
                        border: 1px white;
                        border-collapse: collapse;
                        border-bottom: 1px solid #ddd;
                        border-top: 1px solid #ddd;
                    }
                     </style>
                     
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="top_menu_style.css">
        <link rel="stylesheet" href="IMS_Style.css">
    </head>

    <body>
        

    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <img class="logo" src="../general/logo_small.png" width = 50>
                <ul class="nav navbar-nav">
                <li><a href="../general/start_page.php">Home</a></li> 
                <li><a href="../general/contact.php">Contact</a></li>
                <li class="active"><a href="caregiverprofile.php">Profile</a></li>   
                <li><a href="../general/chat_home.php">Messages</a></li>           
                </ul>
                <ul class="nav navbar-nav navbar-right">
                <li><a href="../general/logout.php">Logout</a></li>
            </ul>
        </div>
    </nav>

    <div class="page">
    
    <div class = "column">
    <h1>Profile</h1>
    <div class = "container">
    <?php
        
       /*if ( isset($_SESSION["id"]) === false) {
        header("location: ../general/login.php");
        }
        */

        include dirname(__DIR__).'/general/openDB.php';
        $result = mysqli_query($link, "select first_name, last_name, caregiver_id, phone, street, street_no, zip, city, country 
        from caregiver
        where caregiver_id = $_SESSION[id]")   
        or 
        die("Could not issue MySQL query"); 
        
        while ($row = $result->fetch_assoc()) {
            $first_name = $row["first_name"];
            $last_name = $row["last_name"];
            $caregiver_id = $row["caregiver_id"];
            $street = $row["street"];
            $street_no = $row["street_no"];
            $zip = $row["zip"]; 
            $city = $row["city"];
            $country = $row["country"];
            $phone = $row["phone"]; 
     
            echo '<b>'."Name: ".'</b>'.$first_name." ".$last_name.'<br />';
            echo '<b>'."ID: ".'</b>' .$caregiver_id.'<br />';
            echo '<b>'."Telephone: ".'</b>'.$phone.'<br />';
            echo '<b>'."Adress: ".'</b>'.$street. " ".$street_no." ".$zip." ".$city." ".$country.'<br />';
        }
        
        include dirname(__DIR__).'/general/closeDB.php';

    ?>
    

    <form action="change_info_caregiver.php" class = "profile">
        <button type = "submit" class = "prof_button">Change Information</button>
    </form>
    <form action="change_password_caregiver.php" class = "profile">
        <button type = "submit" class = "pass_button">Change Password</button>
    </form></br>
    </div>
    </div>

    <div class = "column">
        <h1>Your Connected To</h1>
        <?php
        include dirname(__DIR__).'/general/openDB.php';
        $result = mysqli_query($link,"select p.first_name, p.last_name, p.patient_id 
                                      from patient as p, patient_caregiver as p_c
                                      where p.patient_id = p_c.patient_id 
                                      and p_c.caregiver_id = $_SESSION[id]
                                      and p_c.both_accept = true")   
        or 
        die("Could not issue MySQL query"); 
    
        echo "<table style='width:70%'>
        <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>ID</th>
        </tr>"; 
        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $p_id = $row["patient_id"];
                echo "<tr><td>" . $row["first_name"]. "</td>
                <td>" . $row["last_name"] . "</td>
                <td><a href ='../general/profile_statistics.php?id=$p_id'>". $p_id. "</a></td></tr>";
        }
        echo "</table>";
        }     
        include dirname(__DIR__).'/general/closeDB.php';   
        
        ?>

    <form action="caregiver_connect_to_patient.php", method = "POST">   
        <input type="number" placeholder="Patient ID" name="patient_id" >
        <button type = "submit" class = "patient_button">Connect to Patient</button>
    </form></br>
    </div>
    </div> 
    </body>
</html>
                <?php
                break;
            case 'R':
                ?>
                <!--Code-->
                <?php
                break;
        }
    } else {
    echo "<script>window.location.href = '../general/login.php';</script>";
    }
    
}
