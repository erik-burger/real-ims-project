<!DOCTYPE html>
<html>
<meta http-equiv="refresh" content="3600;url=../general/logout.php" />
  <head>
    <meta charset="UTF-utf-8">
    <meta name="description" content="Statistics page for patients">
    <title>Trackzheimers</title>
    <link rel="stylesheet" href="top_menu_style.css">
  </head>
  
  <body>

    <div class="navbar">
      <a href="patientstart.php">Go Back</a>
      <a href="../general/logout.php">Logout</a>          
    </div>

    <h1>Profile</h1>

    <?php
        session_start(); 
        /*if ( isset($_SESSION["id"]) === false) {
        header("location: ../html/php/login.php");
        }
        */
        include dirname(__DIR__).'general/openDB.php';
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
        include dirname(__DIR__).'../general/closeDB.php';
 ?>

<h3>Your Doctor</h3>
<?php
        include dirname(__DIR__).'../general/openDB.php';
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
        
        include dirname(__DIR__).'../general/closeDB.php';

    ?>
    <p>Change your information <a href="#">here</a>.</p>

</body> 
</html>
