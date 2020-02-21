<!DOCTYPE html>
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
            .profile{
                display: inline-block;  
            }

            .medication{
                display: inline-block; 
            } 

            .med_button, .prof_button, .pass_button, .doc_button{
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
      input[type = number], select , textarea{
    		padding: 15px;
    		border: 1px solid #ccc;
    		border-radius; 4px;
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
  </head>
  <body>

  <div class="navbar">
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
</br>

<div class="page">
<div class = "column">
<h1>Profile</h1>
<div class = "container">
<?php
        session_start(); 
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

    <form action="change_info_patient.php" class = "profile">
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
