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
