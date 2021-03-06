<html> 
    <link rel="stylesheet" href="top_menu_style.css">
    <link rel="stylesheet" href="../general/IMS_Style.css">
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
<style>
          table, th, td {
          border: 1px solid black;
          border-collapse: collapse;
        }
        ul{
                list-style-type: none;
                margin: 0;
                padding: 0;
            }
        .logo {
            display: inline-block;
            float: left; 
        }
        * {
            box-sizing: border-box;
            }
            .left {
            width: 40%;
            
            }
            .right {
            width: 60%; 
           
            }
            .column {
              float: left;
            padding: 10px;
            height: 00px;
            }
            
            .page:after {
            content: "";
            display: table;
            clear: both;
            } 
            table, th, td {
                padding: 15px; 
                border: 1px white;
                border-collapse: collapse;
                border-bottom: 1px solid #ddd;
                border-top: 1px solid #ddd;
                Text-align: center;
            } 
              .container {
                  border-radius: 10px;
                  background-color: #f2f2f2;
                  padding-left: 20px;
                  width:100%;
                  margin-right: auto;
                  margin-left:auto;
                  margin-bottom: 20px; 
                  margin-top: 20px;
                  font-size:16px;
              }                        
</style>    
<div class = "page">
<div class = "column left"> 

<h1>Patient Profile</h1>
<div class = "container">
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

            echo '<b>'."About: ".'</b>';
            echo $desc.'<br/>';
        }
        include dirname(__DIR__).'/general/closeDB.php';
 ?>
 </div>
</div> 

<div class = "page">
<div class = "column right">

<?php
            $dates_data = [];
            $score_data = [];
            $score1_data = [];
            $score2_data = [];
            $score3_data = [];
            $score4_data = [];
            $score5_data = [];
            $score6_data = [];
            $score7_data = [];
            $score8_data = [];
            $score9_data = [];
            $score10_data = [];
            $score11_data = [];
            $score12_data = [];
            $score13_data = [];
            $score14_data = [];
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
  <!--content of page-->
    
    <div id='myDiv'></div>

  <!--end of content-->

    <script>

      var dates_arr = <?php echo json_encode($dates_data); ?>;
      var score_arr = <?php echo json_encode($score_data); ?>;
      var orientation_arr = <?php echo json_encode($orientation_score); ?>;
      var immediate_arr = <?php echo json_encode($score11_data); ?>;
      var attention_arr = <?php echo json_encode($score12_data); ?>;
      var delayed_arr = <?php echo json_encode($score13_data); ?>;
      var language_arr = <?php echo json_encode($score14_data); ?>;
      
      array_of_array = [
        {data: score_arr, name: 'total score', dates: dates_arr},
        {data: orientation_arr, name: 'orientation score', dates: dates_arr},
        {data: immediate_arr, name: 'immediate score', dates: dates_arr},
        {data: attention_arr, name: 'attention score', dates: dates_arr},
        {data: delayed_arr, name: 'dealyed score', dates: dates_arr},
        {data: language_arr, name: 'language score', dates: dates_arr}
      ]

      function makeTrace(i) {
        return {
            y: i.data,
            x: i.dates,
            fill: 'tozeroy',
            line: {
                shape: 'line' ,
                color: '#669999'
            },
            visible: i.name == 'total score',
            name: i.name,
        };
      }
      var selectorOptions = {
          buttons: [{
              step: 'month',
              stepmode: 'backward',
              count: 1,
              label: '1m'
          }, {
              step: 'month',
              stepmode: 'backward',
              count: 6,
              label: '6m'
          }, {
              step: 'year',
              stepmode: 'todate',
              count: 1,
              label: 'YTD'
          }, {
              step: 'year',
              stepmode: 'backward',
              count: 1,
              label: '1y'
          }, {
              step: 'all',
          }],
      };

      var updatemenus = [{
              y: 1.2,
              x: 1,
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
          }]

      var layout = {      
        updatemenus: updatemenus,
        title: {
          text: '<b>MMSE Score Over time</b>',
          font: {
            family: 'Arial',
            size: 18,
            color: 'black'
          }
        },
        xaxis: {
          title: {
            text: '<b>Date</b>',
            font: {
              family: 'Arial',
              size: 18,
              color: 'black'
            }
          },
          rangeselector: selectorOptions,
          rangeslider: {}
        },
        yaxis: {
          fixedrange: true,
          title: {
            text: '<b>Score</b>',
            font: {
              family: 'Arial',
              size: 18,
              color: 'black'
            }
          },
        },
        plot_bgcolor: "ghostwhite",
        paper_bgcolor: "ghostwhite"    
      };

      Plotly.newPlot('myDiv', array_of_array.map(makeTrace), layout, {displayModeBar: false});
      
    </script>
    
    <table style='width:70%' align = center>
        <tr>
        <th>Number of tests taken</th>
        <th>Latest test</th>
        <th>Latest score</th>
        </tr>
        <tr>
            <td><?php echo count($dates_data);?></td>
            <td><?php echo end($dates_data);?></td>
            <td><?php echo end($score_data);?></td>
        </tr>

</div>
</div>
</div>
</html> 