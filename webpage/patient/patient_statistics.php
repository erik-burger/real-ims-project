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
  <?php
    session_start();
    $patient_id = $_SESSION["id"];
  ?>
  

    <div class="navbar">
      <a href="patientstart.php">Go Back</a>
      <a href="../general/logout.php">Logout</a>          
    </div>
    <div id='myDiv'></div>
    <?php

          include dirname(__DIR__)."/general/openDB.php";
          $attributes = "test_date, total_score, score_1, score_2, score_3, score_4, score_5, score_6, score_7, score_8, score_9, score_10, score_11, score_12, score_13, score_14";
          $result = mysqli_query($link,"select $attributes from test where patient_id = $patient_id")
          or 
          die("Could not issue MySQL query");

          $dates_data = array();
          foreach ($result as $row) {
            $dates_data[] = $row['test_date'];
            $score_data[] = $row['total_score'];
            $score1_data[] = $row['score_1'];
            $score2_data[] = $row['score_2'];
            $score3_data[] = $row['score_3'];
            $score4_data[] = $row['score_4'];
            $score5_data[] = $row['score_5'];
            $score6_data[] = $row['score_6'];
            $score7_data[] = $row['score_7'];
            $score8_data[] = $row['score_8'];
            $score9_data[] = $row['score_9'];
            $score10_data[] = $row['score_10'];
            $score11_data[] = $row['score_11'];
            $score12_data[] = $row['score_12'];
            $score13_data[] = $row['score_13'];
            $score14_data[] = $row['score_14'];
          }

        $orientation_score = array_map(function () {
            return array_sum(func_get_args());
        }, $score1_data, $score2_data, $score3_data, $score4_data, $score5_data, $score6_data, $score7_data, $score8_data, $score9_data, $score10_data);

    ?>

    <script>

      var dates_arr = <?php echo json_encode($dates_data); ?>;
      var score_arr = <?php echo json_encode($score_data); ?>;
      var orientation_arr = <?php echo json_encode($orientation_score); ?>;
      var immediate_arr = <?php echo json_encode($score11_data); ?>;
      var attention_arr = <?php echo json_encode($score12_data); ?>;
      var delayed_arr = <?php echo json_encode($score13_data); ?>;
      var language_arr = <?php echo json_encode($score14_data); ?>;
      
      score_curve = {
      x: dates_arr,
      y: score_arr,
      line: {
          shape: 'line' ,
          color: 'red',
          width: 5
      },
      visible: true,
      name: 'Data set 1',
      };

      orientation_curve = {
      x: dates_arr,
      y: orientation_arr,
      line: {
          shape: 'line' ,
          color: 'red',
          width: 5
      },
      visible: false,
      name: 'Data set 2',
      };

      immediate_curve = {
      x: dates_arr,
      y: immediate_arr,
      line: {
          shape: 'line' ,
          color: 'red',
          width: 5
      },
      visible: false,
      name: 'Data set 3',
      };

      attention_curve = {
      x: dates_arr,
      y: attention_arr,
      line: {
          shape: 'line' ,
          color: 'red',
          width: 5
      },
      visible: false,
      name: 'Data set 4',
      };

      delayed_curve = {
      x: dates_arr,
      y: delayed_arr,
      line: {
          shape: 'line' ,
          color: 'red',
          width: 5
      },
      visible: false,
      name: 'Data set 5',
      };

      language_curve = {
      x: dates_arr,
      y: language_arr,
      line: {
          shape: 'line' ,
          color: 'red',
          width: 5
      },
      visible: false,
      name: 'Data set 6',
      };

      var options_curve = [score_curve, orientation_curve, immediate_curve, attention_curve, delayed_curve, language_curve];

      Plotly.newPlot('myDiv', options_curve, {
          updatemenus: [{
              y: 0.8,
              yanchor: 'top',
              buttons: [{
                  method: 'restyle',
                  args: ['line.color', 'red'],
                  label: 'red'
              }, {
                  method: 'restyle',
                  args: ['line.color', 'blue'],
                  label: 'blue'
              }, {
                  method: 'restyle',
                  args: ['line.color', 'green'],
                  label: 'green'
              }]
          }, {
              y: 1,
              yanchor: 'top',
              buttons: [{
                  method: 'restyle',
                  args: ['visible', [true, false, false, false, false, false]],
                  label: 'Total score'
              }, {
                  method: 'restyle',
                  args: ['visible', [false, true, false, false, false, false]],
                  label: 'Orientation score'
              }, {
                  method: 'restyle',
                  args: ['visible', [false, false, true, false, false, false]],
                  label: 'Immediate repeat score'
              }, {
                  method: 'restyle',
                  args: ['visible', [false, false, false, true, false, false]],
                  label: 'Attention score'
              }, {
                  method: 'restyle',
                  args: ['visible', [false, false, false, false, true, false]],
                  label: 'Delayed repeat score'
              }, {
                  method: 'restyle',
                  args: ['visible', [false, false, false, false, false, true]],
                  label: 'Language score'
              }]
          }],
      });


      /*
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
      }
      */
    </script>

  </body>

</html>
