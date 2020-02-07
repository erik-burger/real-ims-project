<?php
 
session_start();
        $patient_id = $_SESSION["patient_id"];
        include dirname(__DIR__).'/html/php/openDB.php';

        $result = mysqli_query($link,"select total_score, test_date from test where patient_id = '$patient_id'")   
        or 
        die("Could not issue MySQL query"); 

        $data = array();
        foreach ($result as $row) {
          $data[] = $row;
        }

        result -> close();

?>

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
      <a href="../html/php/logout.php">Logout</a>          
  	</div>
    

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
    		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
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
