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
            hr {
                border: 10px solid ghostwhite;
            }
           .prof_button, .pass_button, .patient_button, .doc_button, .request_button{
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

    <form action="../general/change_info.php" class = "profile">
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
                <html>
<meta http-equiv="refresh" content="3600;url=../general/logout.php" />
  <head>
    <meta charset="UTF-utf-8">
    <meta name="description" content="Statistics page for patients">
    <title>Trackzheimers</title>
    <link rel="stylesheet" href="top_menu_style.css">
    <link rel="stylesheet" href="../general/IMS_Style.css">

  </head>
  <body>

  <div class="navbar">
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
</br>

<div class="page">
<div class = "column">
<h1>Profile</h1>
<div class = "container">
<?php
        
        /*if ( isset($_SESSION["id"]) === false) {
        header("location: ../html/php/login.php");
        }
        */
        include dirname(__DIR__).'/general/openDB.php';
        $result = mysqli_query($link,"select * 
        from patient where patient_id = $_SESSION[id]")   
        or 
        die("Could not issue MySQL query"); 
        
        while ($row = $result->fetch_assoc()) {
            $first_name = $row["first_name"];
            $last_name = $row["last_name"];
            $patient_id = $row["patient_id"];
            $street = $row["street"];
            $street_no = $row["street_no"];
            $zip = $row["zip"]; 
            $city = $row["city"];
            $country = $row["country"];
            $phone = $row["phone"]; 
            $desc = $row["diagnosis_description"]; 
            $gender = $row["gender"]; 
            $birth_date = $row["date_of_birth"]; 
            $stage = $row["stage"]; 
            $diag_date = $row["diagnosis_date"];
     
            echo '<b>'."Name: ".'</b>'.$first_name." ".$last_name.'<br/>';
            echo '<b>'."ID: ".'</b>' .$patient_id.'<br/>';
            echo '<b>'."Telephone: ".'</b>'.$phone.'<br/>';
            echo '<b>'."Adress: ".'</b>'.$street. " ".$street_no." ".$zip." ".$city." ".$country.'<br />';
            echo '<b>'."Alzheimer's Stage: ".'</b>' .$stage.'<br/>';
            echo '<b>'."Gender: ".'</b>' .$gender.'<br/>';
            echo '<b>'."Date of Birth: ".'</b>' .$birth_date.'<br/>';
            echo '<b>'."Diagnosis Date: ".'</b>' .$diag_date.'<br/>';

            echo '<b>'."About: ".'</b>';
            echo $desc.'<br/>';
        }
        include dirname(__DIR__).'/general/closeDB.php';
 ?>

    <form action="../general/change_info.php" class = "profile">
        <button type = "submit" class = "prof_button">Change Information</button>
    </form>
    <form action="change_password_patient.php" class = "profile">
        <button type = "submit" class = "pass_button">Change Password</button>
    </form></br>
    <b>Medication</b></br>
<?php
include dirname(__DIR__).'/general/openDB.php';
$medication = mysqli_query($link, "select m.medication_name, pm.dose, pm.medication_interval
from patient_medication pm
join medication m on pm.medication_id = m.medication_id
where pm.patient_id = $_SESSION[id]")
or die("Could not issue MySQL query");
while ($row = $medication->fetch_assoc()) {
    $medication_name = $row["medication_name"];
    $dose = $row["dose"];
    $medication_interval = $row["medication_interval"];
    echo '<b>'."- ".'</b>'.$medication_name."($dose) to be taken ".$medication_interval.'<br />';}

include dirname(__DIR__).'/general/closeDB.php';
?>

<form action="change_medication.php" class = "medication">
    <button type = "submit" class = "med_button">Change Medication</button>
</form></br>
</div>
<h1>Allow you data for research</h1>
    <div class = "container">
    <a href="data_share_info.php">More information</a>
    <form action="data_share.php", method = "POST">
        <?php
        include dirname(__DIR__).'/general/openDB.php';
        $result = mysqli_query($link,"select share_data from patient where patient_id = $_SESSION[id]")   
        or 
        die("Could not issue MySQL query"); 

        while ($row = $result->fetch_assoc()) {
            $share_data = $row["share_data"];
        }
        if ($share_data == 1) {
            $allowed = "Stop allowing";
        } else {
            $allowed = "Allow"; 
        }
        ?> 
        <button type = "submit" class = "doc_button"><?php echo $allowed; ?></button>
    </form></br>

</div> 

</div>

<div class = "column">
<h1>Your Doctors</h1>
<div class = "container">
<?php
        include dirname(__DIR__).'/general/openDB.php';
        $result = mysqli_query($link,"select d.first_name, d.last_name, d.doctor_id, d.phone, d.street, d.street_no, d.zip, d.city, d.country 
        from doctor as d, patient_doctor as p_d
        where d.doctor_id = p_d.doctor_id and p_d.patient_id = $_SESSION[id] and p_d.both_accept = true")   
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
     
            echo '<b>'."Name: ".'</b>'.$first_name." ".$last_name.'<br />';
            echo '<b>'."ID: ".'</b>' .$doctor_id.'<br />';
            echo '<b>'."Telephone: ".'</b>'.$phone.'<br />';
            echo '<b>'."Adress: ".'</b>'.$street. " ".$street_no." ".$zip." ".$city." ".$country.'<br />';
            echo '</br>';
        }
        
        include dirname(__DIR__).'/general/closeDB.php';

    ?>

    <form action="connect_to_doctor.php", method = "POST">
        <input type="number" placeholder="Doctor ID" name="doctor_id" >
        <button type = "submit" class = "doc_button">Connect to Doctor</button>
    </form></br>
    </div> 

    <h1>Your connected caregivers</h1>
    <div class = "container">
    <?php
        include dirname(__DIR__).'/general/openDB.php';
        $result = mysqli_query($link,"select c.first_name, c.last_name, c.caregiver_id, c.phone, c.street, c.street_no, c.zip, c.city, c.country 
        from caregiver as c, patient_caregiver as p_c
        where c.caregiver_id = p_c.caregiver_id and p_c.patient_id = $_SESSION[id] and p_c.both_accept = true")   
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
            echo '</br>';
        }
        
        include dirname(__DIR__).'/general/closeDB.php';

    ?>

    <form action="patient_connect_to_caregiver.php", method = "POST">
        <input type="number" placeholder="Caregiver ID" name="caregiver_id" >
        <button type = "submit" class = "doc_button">Connect to Caregiver</button>
    </form></br>
        </div> 

    
   
</div>
</body> 
</html>
                <?php
                break;
            case 'C':
                ?>
        <html>               
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="top_menu_style.css">
        <link rel="stylesheet" href="IMS_Style.css">
    </head>

    <body>
        <style>
            table, th, td {
                padding: 15px; 
                border: 1px white;
                border-collapse: collapse;
                border-bottom: 1px solid #ddd;
                border-top: 1px solid #ddd;
            }
        </style>

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
    

    <form action="../general/change_info.php" class = "profile">
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
                <html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="top_menu_style.css">
        <link rel="stylesheet" href="../general/IMS_Style.css">
        
    </head>

    <body>
                <style>
                    textarea {
                width: 100%;
                height: 300px;
                -webkit-box-sizing: border-box; /* Safari/Chrome, other WebKit */
                -moz-box-sizing: border-box;    /* Firefox, other Gecko */
                box-sizing: border-box;         /* Opera/IE 8+ */
                font-size: 18px;   
            }
                    textarea{
    		width: 95%;
    		padding: 12px;
    		border: 1px solid #ccc;
    		border-radius; 4px;
    		resize: vertical;
    		font-size: 14px;
            font-family:"Arial";     
        }
        textarea, button{
            display: block; 
        }
                </style>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <img class="logo" src="../general/logo_small.png" width = 50>
                <ul class="nav navbar-nav">
                <li><a href="../general/start_page.php">Home</a></li> 
                <li><a href="../general/contact.php">Contact</a></li> 
                <li class="active"><a href="researcherprofile.php">Profile</a></li>            
                </ul>
                <ul class="nav navbar-nav navbar-right">
                <li><a href="../general/logout.php">Logout</a></li>
            </ul>
        </div>
    </nav>
    <div class = "page">
    <div class='column'>
        <h1>Profile</h1>
    <div class = "container">

    <?php

        include dirname(__DIR__).'/general/openDB.php';
        $result = mysqli_query($link, "SELECT r.first_name, r.last_name, r.researcher_id, r.phone, r.street, r.street_no, r.zip, r.city, r.country, u.email
        from researcher as r, users as u
        where r.researcher_id = $_SESSION[id] and u.user_id = $_SESSION[id]")   
        or 
        die("Could not issue MySQL query"); 
        
        while ($row = $result->fetch_assoc()) {
            $first_name = $row["first_name"];
            $last_name = $row["last_name"];
            $researcher_id = $row["researcher_id"];
            $street = $row["street"];
            $street_no = $row["street_no"];
            $zip = $row["zip"]; 
            $city = $row["city"];
            $country = $row["country"];
            $phone = $row["phone"]; 
            $email = $row["email"];
     
            echo '<b>'."Name: ".'</b>'.$first_name." ".$last_name.'<br />';
            echo '<b>'."ID: ".'</b>' .$researcher_id.'<br />';
            echo '<b>'."Telephone: ".'</b>'.$phone.'<br />';
            echo '<b>'."Adress: ".'</b>'.$street. " ".$street_no." ".$zip." ".$city." ".$country.'<br />';
        }
        
        include dirname(__DIR__).'/general/closeDB.php';

    ?>

    <form action="../general/change_info.php" class = "profile">
        <button type = "submit" class = "prof_button">Change Information</button>
    </form>
    <form action="change_password_researcher.php" class = "profile">
        <button type = "submit" class = "pass_button">Change Password</button>
    </form></br>
    </div>
    </div>

    <div class='column'>
        <h1>Request data access</h1>

        <div class = "container">
        <form action="../researcher/request_email.php" method='post'>
        <textarea name="motivation" cols=auto rows=auto placeholder="Enter your motivation here..."></textarea>
        <input type="hidden" name="email" value="<?php echo $email; ?>">
        <input type="submit" value='Submit motivation' class='request_button'>
        <p id='message' style="display:inline;color:green">
        <p id='error' style="display:inline;color:red">
        </form>

        </div>
    </div>
    </div>
    </body>
    <script>
        window.onload = function() {
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        const message = urlParams.get('message')
        document.getElementById('message').innerHTML = message;
        const error = urlParams.get('error')
        document.getElementById('error').innerHTML = error;
        }
        
    </script>

</html>

                <?php
                break;
        }
    } else {
    echo "<script>window.location.href = '../general/login.php';</script>";
    }
    
}
