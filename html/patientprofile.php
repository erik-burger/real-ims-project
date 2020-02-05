<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-utf-8">
    <meta name="description" content="Statistics page for patients">
    <title>Trackzheimers</title>
    <link rel="stylesheet" href="top_menu_style.css">
  </head>
  
  <body>

    <div class="navbar">
      <a href="patientstart.html">Go Back</a>
      <a href="../html/php/login.php">Logout</a>          
    </div>

    <h1>Profile</h1>

    <?php
        include dirname(__DIR__).'\html\php\openDB.php';
        $result = mysqli_query($link,"select * 
        from patient
        where patient_id = 1")   
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
        include dirname(__DIR__).'\html\php\closeDB.php';
 ?>

<h3>Your Doctor</h3>
<?php
        include dirname(__DIR__).'\html\php\openDB.php';
        $result = mysqli_query($link,"select first_name, last_name, doctor_id, phone, street, street_no, zip, city, country 
        from doctor
        where doctor_id = 1")   
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
        
        include dirname(__DIR__).'\html\php\closeDB.php';

    ?>
    <p>Change your information <a href="#">here</a>.</p>

 <h1>Statistics</h1>
 <script>
    window.onload = function () {

    var chart = new CanvasJS.Chart("chartContainer", {
    	animationEnabled: false,
    	theme: "light2",
    	title:{
    		text: "MMSE score over time."
    	},
    	axisY:{
    		includeZero: true
    	},
    	data: [{
    		type: "line",
    		dataPoints: [
    			{ y: 20 },
    			{ y: 21},
    			{ y: 18},
    			{ y: 18 },
    			{ y: 20 },
    			{ y: 17 },
    			{ y: 16 },
    			{ y: 14 },
    			{ y: 13 },
    			{ y: 10 },
    			{ y: 11 },
    			{ y: 5 }
    		]
    	}]
    });
    chart.render();
}
</script>
<div id="chartContainer" style="height: 600px; width: 100%;">
</div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

</body> 
</html>
