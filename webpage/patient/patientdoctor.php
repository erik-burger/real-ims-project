<!DOCTYPE html>
<html>
<meta http-equiv="refresh" content="3600;url=../general/logout.php" />
<head>
    <link rel="stylesheet" href="top_menu_style.css">
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
</head>

<body>
    <div class="navbar">
        <a href="doctorstart.php">Home</a>
        <a href="contact.php">Contact</a>
        <a href="doctorprofile.php">Profile</a>
        <a href="doctorsearch.php">Patients</a>
        <a href="../general/logout.php">Logout</a>          
    </div>

<img src="logo.jpg" width = "250" height = "133" alt = "Trackzheimers logo"><br>

<h1>Patient Profile</h1>

<?php
        $p_id = $_GET['id'];           
        include dirname(__DIR__).'/general/openDB.php';
        $result = mysqli_query($link,"select * 
        from patient
        where patient_id = $p_id")   
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

<h3>Statistics</h3>
<?php
    include dirname(__DIR__)."/general/openDB.php";
          $result = mysqli_query($link,"select test_date, total_score from test where patient_id = $patient_id")
          or 
          die("Could not issue MySQL query");

              $dates_data = array();
              foreach ($result as $row) {
                $dates_data[] = $row["test_date"];
                $score_data[] = $row["total_score"];
              }
    ?>
    <div id='myDiv'></div>
    <script>
      
      var dates_arr = <?php echo json_encode($dates_data); ?>;
      var score_arr = <?php echo json_encode($score_data); ?>;
      var trace50 = {
        x: dates_arr,
        y: score_arr,
        mode: 'lines',
        line: {
          color: 'rgb(190, 216, 215)',
          width: 5
        }
        };

        var layout = {
            title: {
            text:'Total MMSE score over time'
          },
          xaxis: {
            title: {
              text: 'Date'
            },
          },
          yaxis: {
            title: {
              text: 'Score'
            }
          }
        };
              
        var data = [trace50];

        Plotly.newPlot('myDiv', data, layout, {displayModeBar: false});
      </script>

</body>
</html>