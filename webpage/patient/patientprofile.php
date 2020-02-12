<!DOCTYPE html>
<html>
<meta http-equiv="refresh" content="3600;url=../general/logout.php" />
  <head>
    <meta charset="UTF-utf-8">
    <meta name="description" content="Statistics page for patients">
    <title>Trackzheimers</title>
    <link rel="stylesheet" href="top_menu_style.css">
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

            .med_button, .prof_button, .pass_button{
                background-color: #669999; 
                border: none;
                color: white;
                padding: 15px 10px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;   
                margin: 10px;             
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
            <li class="active"><a href="patientstart.php">Home</a></li>            
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="../general/logout.php">Logout</a></li>
            </ul>
        </div>
    </nav>

    <h1>Profile</h1>

   
   <?php
        session_start(); 
        /*if ( isset($_SESSION["id"]) === false) {
        header("location: ../html/php/login.php");
        }
        */
        include dirname(__DIR__).'/general/openDB.php';
        $result = mysqli_query($link,"select * from patient where patient_id = $_SESSION[id]")   
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

            echo '<h3>'."About".'</h3>';
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

<h3>Medication</h3>

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


<h1>Your Doctors</h1>

<?php
        include dirname(__DIR__).'/general/openDB.php';
        $result = mysqli_query($link,"select d.first_name, d.last_name, d.doctor_id, d.phone, d.street, d.street_no, d.zip, d.city, d.country 
        from doctor as d, patient_doctor as p_d
        where d.doctor_id = p_d.doctor_id and p_d.patient_id = $_SESSION[id]")   
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
        }
        
        include dirname(__DIR__).'/general/closeDB.php';

    ?>
   

</body> 
</html>
