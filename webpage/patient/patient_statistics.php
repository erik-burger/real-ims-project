<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-utf-8">
    <meta name="description" content="Statistics page for patients">
    <title>Trackzheimers</title>   
    <link rel="stylesheet" href="top_menu_style.css">
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
  </head>

  <body>

    <div class="navbar">
      <a href="patientstart.php">Go Back</a>
      <a href="../general/logout.php">Logout</a>          
  	</div>
    <?php
 
      session_start();
          $patient_id = $_SESSION["id"];
          include dirname(__DIR__)."/general/openDB.php";
          $attributes = "test_date, total_score";
          $result = mysqli_query($link,"select $attributes from test where patient_id = $patient_id")
          or 
          die("Could not issue MySQL query");

          $dates_data = array();
          foreach ($result as $row) {
            $dates_data[] = $row["test_date"];
            $score_data[] = $row["total_score"];
            $score1_data[] = $row["score_1"];
            $score2_data[] = $row["score_2"];
            $score3_data[] = $row["score_3"];
            $score4_data[] = $row["score_4"];
            $score5_data[] = $row["score_5"];
            $score6_data[] = $row["score_6"];
            $score7_data[] = $row["score_7"];
            $score8_data[] = $row["score_8"];
            $score9_data[] = $row["score_9"];
            $score10_data[] = $row["score_10"];
            $score11_data[] = $row["score_11"];
            $score12_data[] = $row["score_12"];
            $score13_data[] = $row["score_13"];
            $score14_data[] = $row["score_14"];
          }
    ?>
    <div>
    <button type="button">Advanced</button><br>
    </div>
    <form method="post">
      <input type="radio" name="orientation" value="orientation">orientation
      <input type="submit" value="submit">
    </form>
    <?php
    if ($_POST['orientation'] == 'orientation') {
      $attributes = $attributes."score_1, score_2, score_3, score_4, score_5, score_6, score_7, score_8, score_9, score_10";
    }
    ?>
    <div>
    </div>
    <div id='myDiv'></div>
    <script>
      
      var dates_arr = <?php echo json_encode($dates_data); ?>;
      var score_arr = <?php echo json_encode($score_data); ?>;
      var trace50 = {
        x: dates_arr,
        y: score_arr,
        mode: 'lines',
        line: {
          color: 'rgb(88, 155, 155)',
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
