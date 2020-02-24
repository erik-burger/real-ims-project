<!DOCTYPE html>

<?php
session_start();
/*Restrict access for other users or not logged*/ 
if (isset($_SESSION["user"]) or isset($_SESSION["loggedin"])) {
    if ($_SESSION["user"] !== "P" or $_SESSION["loggedin"] == false){ // if the user is a patient -> logout
    echo "<script>window.location.href = '../general/login.php';</script>";
    }
} 
?>

<?php
if(isset($_POST["submit"])){
 
  $patient_id = $_SESSION["id"];
  include dirname(__DIR__)."/general/openDB.php";
  $result = mysqli_query($link,"select country, state, city, street, bedroom_floor from patient where patient_id = $patient_id");
  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
      $answerQ6 = $row["country"];
      $answerQ7 = $row["state"];
      $answerQ8 = $row["city"];
      $answerQ9 = $row["street"];
      $answerQ10 = $row["bedroom_floor"];

 }
}

  $question1 = 0;
  $question2 = 0;
  $question3 = 0;
  $question4 = 0;
  $question5 = 0;
  $question6 = 0;
  $question7 = 0;
  $question8 = 0;
  $question9 = 0;
  $question10 = 0;
  $question11 = 0;
  $question12 = 0;
  $question13 = 0;
  $question14 = 0;

    //Question 1
    if ($_POST['curr_year'] == date('Y')){
      $question1++;
    }

    //Question 2
    if ($_POST['month'] == date('F')){
      $question2++;
    }

    //Question 3
    if ($_POST['day_word'] == date('l')){
      $question3++;
    }

    //Question 4
    if ($_POST['day_num'] == date('j')){
      $question4++;
    }

    //Question 5
    $time_of_day = $_POST['time_of_day'];
    date_default_timezone_set('Europe/Stockholm');
    $hour = date('G');
    switch ($time_of_day) {
      case "Morning":
          if (5 <= $hour and $hour <= 11 ) {
            $question5++;
          }
          break;
      case "Lunchtime":
          if (10 <= $hour and $hour <= 14) {
            $question5++;
          }
          break;
      case "Afternoon":
          if (13 <= $hour and $hour <= 18) {
            $question5++;
          }
          break;
      case "Evening":
          if (17 <= $hour and $hour <= 22) {
            $question5++;
          }
      case "Night":
          if (20 <= $hour or $hour <= 5) {
            $question5++;
          }
        break;
    }
    
    //Question 6 
    if (preg_match('/'.$answerQ6.'/i', $_POST['country'])) {
      $question6++;
    }
    
    //Question 7
    if (preg_match('/'.$answerQ7.'/i', $_POST['state'])) {
      $question7++;
    }

    //Question 8
    if (preg_match('/'.$answerQ8.'/i', $_POST['town'])) {
      $question8++;
    }

    //Question 9
    if (preg_match('/'.$answerQ9.'/i', $_POST['street'])) {
      $question9++;
    }

    //Question 10
    if ($_POST['bedroom'] == $answerQ10) {
      $question10++;
    }
    
    //Question 11
    if (preg_match('/'.$_POST['word_1_ans'].'/i', $_POST['word_1']) or preg_match('/'.$_POST['word_1_ans'].'/i', $_POST['word_2']) or preg_match('/'.$_POST['word_1_ans'].'/i', $_POST['word_3'])) {
      $question11++;
    }
    if (preg_match('/'.$_POST['word_2_ans'].'/i', $_POST['word_1']) or preg_match('/'.$_POST['word_2_ans'].'/i', $_POST['word_2']) or preg_match('/'.$_POST['word_2_ans'].'/i', $_POST['word_3'])) {
      $question11++;
    }
    if (preg_match('/'.$_POST['word_3_ans'].'/i', $_POST['word_1']) or preg_match('/'.$_POST['word_3_ans'].'/i', $_POST['word_2']) or preg_match('/'.$_POST['word_3_ans'].'/i', $_POST['word_3'])) {
      $question11++;
    }

    //Question 12
    if ($_POST['1st-sub'] ==$_POST['0st-number'] -7 ) {
      $question12++;
    }
    if ($_POST['2st-sub'] ==$_POST['0st-number'] -(7*2) ) {
      $question12++;
    }
    if ($_POST['3st-sub'] ==$_POST['0st-number'] -(7*3) ) {
      $question12++;
    }
    if ($_POST['4st-sub'] ==$_POST['0st-number'] -(7*4) ) {
      $question12++;
    }
    if ($_POST['5st-sub'] ==$_POST['0st-number'] -(7*5) ) {
      $question12++;
    }

    //Question 13

    if (preg_match('/'.$_POST['word_1_ans'].'/i', $_POST['word_1_rem']) or preg_match('/'.$_POST['word_1_ans'].'/i', $_POST['word_2_rem']) or preg_match('/'.$_POST['word_1_ans'].'/i', $_POST['word_3_rem'])) {
      $question13++;
    }
    if (preg_match('/'.$_POST['word_2_ans'].'/i', $_POST['word_1_rem']) or preg_match('/'.$_POST['word_2_ans'].'/i', $_POST['word_2_rem']) or preg_match('/'.$_POST['word_2_ans'].'/i', $_POST['word_3_rem'])) {
      $question13++;
    }
    if (preg_match('/'.$_POST['word_3_ans'].'/i', $_POST['word_1_rem']) or preg_match('/'.$_POST['word_3_ans'].'/i', $_POST['word_2_rem']) or preg_match('/'.$_POST['word_3_ans'].'/i', $_POST['word_3_rem'])) {
      $question13++;
    }

    //Question 14
    if ($_POST['image_1'] == $_POST['image_1_ans']) {
      $question14++;
    }
    if ($_POST['image_2'] == $_POST['image_2_ans']) {
      $question14++;
    }


    //echo "1: $question1, 2: $question2, 3: $question3, 4: $question4, 5: $question5, 6: $question6, 7: $question7, 8: $question8, 9: $question9, 10: $question10, 11: $question11, 12: $question12, 13: $question13, 14: $question14";

  $total_score = $question1 + $question2 + $question3 + $question4 + $question5 + $question6 + $question7 + $question8 + $question9 + $question10 + $question11 + $question12 + $question13 + $question14;

  $test_date = date("Y-m-d H:i:s");
  $sql = "insert into test (patient_id, test_date, score_1, score_2, score_3, score_4, score_5, score_6, score_7, score_8, score_9, score_10, score_11, score_12, score_13, score_14, total_score)
  VALUES ('$patient_id', '$test_date', '$question1', '$question2', '$question3', '$question4', '$question5', '$question6', '$question7', '$question8', '$question9', '$question10', '$question11', '$question12', '$question13', '$question14', '$total_score')";
  if (mysqli_query($link, $sql)) {
    //echo "New record created successfully";

    echo '<script>; window.location.replace("../general/start_page.php"); </script>';


  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($link);
  }
  include dirname(__DIR__)."/general/closeDB.php";
  header("location: ../general/start_page.php");
}
  ?>
<html>

    <head>
        <meta charset="UTF-utf-8">
        <meta name="description" content="questions_sheet">
        <title>Trackzheimers</title>   
        <link rel="stylesheet" href="top_menu_style.css">
        <style>
            body{
                background-color: ghostwhite;
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

            hr {
                border: 10px solid ghostwhite;
            }

            button {
                background-color: #669999;
                border: none;
                color: black;
                padding: 15px 32px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 30px;
            }
            
            input[type=number] {
                padding: 12px 20px;
                margin: 8px 0;
                box-sizing: border-box;
                height:100px; 
                width:300px;
                font-size:100px;
                border: 2px solid #669999;
            }
            input[type=text] {
                padding: 12px 20px;
                margin: 8px 0;
                box-sizing: border-box;
                height:100px; 
                width: 800px;
                font-size:70px;
                border: 2px solid #669999;
            }
              
            .radio_group {
                margin: 0 auto;
                width:200px;
                text-align: left;
            }

            .image_label {
                float: left;
                width: 50%;
                padding: 10px;
                height: 300px; 
            }

            .test_image {
                display: block;
                margin-left: auto;
                margin-right: auto;
                height: 400px;
            }

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
            
            .container {
            display: block;
            position: relative;
            padding-left: 35px;
            cursor: pointer;
            font-size: 22px;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            }

            /* Hide the browser's default radio button */
            .container input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
            height: 0;
            width: 0;
            }

            /* Create a custom radio button */
            .checkmark {
            position: absolute;
            top: 0;
            left: 0;
            height: 25px;
            width: 25px;
            background-color: #eee;
            border-radius: 50%;
            }

            /* On mouse-over, add a grey background color */
            .container:hover input ~ .checkmark {
            background-color: #ccc;
            }

            /* When the radio button is checked, add a blue background */
            .container input:checked ~ .checkmark {
            background-color: #669999;
            }

            /* Create the indicator (the dot/circle - hidden when not checked) */
            .checkmark:after {
            content: "";
            position: absolute;
            display: none;
            }

            /* Show the indicator (dot/circle) when checked */
            .container input:checked ~ .checkmark:after {
            display: block;
            }

            /* Style the indicator (dot/circle) */
            .container .checkmark:after {
            top: 9px;
            left: 9px;
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: ghostwhite;
            }
        </style>
    </head>

    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <img class="logo" src="../general/logo_small.png" width = 50>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a onclick= go_back("../general/start_page.php")>Home</a></li>            
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a onclick= go_back("../general/logout.php")>Logout</a></li>
            </ul>
        </div>
    </nav>

    <body>
        <script>
            function go_back(link){
                var r = confirm("Are you sure you want to end the test? All your progress in this test can be lost");
                if (r == true){
                    window.location.replace(link);
                }
            }

            function change_question(new_question, old_question) {
                var new_ = document.getElementById(new_question);
                var old_ = document.getElementById(old_question);
                if (new_.style.display === "none") {
                    new_.style.display = "block";
                } else {
                    new_.style.display = "none";
                }
                if (old_.style.display === "none") {
                    old_.style.display = "block";
                } else {
                    old_.style.display = "none";
                }
            }
        </script>

        <script>
            function sleep(ms) {
                return new Promise(resolve => setTimeout(resolve, ms));
            }

            
            function display_words(word_window, button, options) {
                var word = document.getElementById(word_window);
                var button_ = document.getElementById(button);
                var options_ = document.getElementById(options);
                word.style.display ="block";
                button_.style.display ="none";
                sleep(5000).then(() => {
                    word.style.display ="none";
                    options_.style.display ="block";
                });
            }
        </script>

        

        <form action=Question_sheet.php method="POST">

            <div id='question1' style="text-align:center;">
                <h1 backgroundcolor="ghostwhite" align="center">Write the current year</h1>
                <div style="text-align:center;">
                    <input type="number" name="curr_year" align="center"
                    onkeydown="return event.key != 'Enter';">
                </div>
                <hr>
                <button type="button" onclick="change_question('question2','question1')">Next</button>
            </div>


            <div id='question2' style="display:none;text-align:center;">
                <h1 align="center">Select the current month</h1>
                <div class = 'radio_group'>
                    <label class="container">
                    <input type="radio" name="month" value="January"
                    onkeydown="return event.key != 'Enter';">January
                    <span class="checkmark"></span>
                    </label><br>

                    <label class="container">
                    <input type="radio" name="month" value="February"
                    onkeydown="return event.key != 'Enter';">Februay
                    <span class="checkmark"></span>
                    </label><br>

                    <label class="container">
                    <input type="radio" name="month" value="March"
                    onkeydown="return event.key != 'Enter';">March
                    <span class="checkmark"></span>
                    </label><br>

                    <label class="container">
                    <input type="radio" name="month" value="April"
                    onkeydown="return event.key != 'Enter';">April
                    <span class="checkmark"></span>
                    </label><br>

                    <label class="container">
                    <input type="radio" name="month" value="May"
                    onkeydown="return event.key != 'Enter';">May
                    <span class="checkmark"></span>
                    </label><br>

                    <label class="container">
                    <input type="radio" name="month" value="June"
                    onkeydown="return event.key != 'Enter';">June
                    <span class="checkmark"></span>
                    </label><br>

                    <label class="container">
                    <input type="radio" name="month" value="July"
                    onkeydown="return event.key != 'Enter';">July
                    <span class="checkmark"></span>
                    </label><br>

                    <label class="container">
                    <input type="radio" name="month" value="August"
                    onkeydown="return event.key != 'Enter';">August
                    <span class="checkmark"></span>
                    </label><br>

                    <label class="container">
                    <input type="radio" name="month" value="September"
                    onkeydown="return event.key != 'Enter';">September
                    <span class="checkmark"></span>
                    </label><br>

                    <label class="container">
                    <input type="radio" name="month" value="October"
                    onkeydown="return event.key != 'Enter';">October
                    <span class="checkmark"></span>
                    </label><br>

                    <label class="container">
                    <input type="radio" name="month" value="November"
                    onkeydown="return event.key != 'Enter';">November
                    <span class="checkmark"></span>
                    </label><br>

                    <label class="container">
                    <input type="radio" name="month" value="December"
                    onkeydown="return event.key != 'Enter';">December
                    <span class="checkmark"></span>
                    </label><br>
                </div>
                <hr>
                <button type="button" onclick="change_question('question1','question2')">Back</button>
                <button type="button" onclick="change_question('question3','question2')">Next</button>
            </div>

            <div id='question3' style="display:none;text-align:center;">
                <h1 align="center">Select current day</h1>
                <div class = 'radio_group'>
                    <label class="container">
                    <input type="radio" name="day_word" value="Monday"
                    onkeydown="return event.key != 'Enter';">Monday
                    <span class="checkmark"></span>
                    </label><br>

                    <label class="container">
                    <input type="radio" name="day_word" value="Tuesday"
                    onkeydown="return event.key != 'Enter';">Tuesday
                    <span class="checkmark"></span>
                    </label><br>
                    
                    <label class="container">
                    <input type="radio" name="day_word" value="Wednesday"
                    onkeydown="return event.key != 'Enter';">Wednesday
                    <span class="checkmark"></span>
                    </label><br>

                    <label class="container">
                    <input type="radio" name="day_word" value="Thursday"
                    onkeydown="return event.key != 'Enter';">Thursday
                    <span class="checkmark"></span>
                    </label><br>

                    <label class="container">
                    <input type="radio" name="day_word" value="Friday"
                    onkeydown="return event.key != 'Enter';">Friday
                    <span class="checkmark"></span>
                    </label><br>

                    <label class="container">
                    <input type="radio" name="day_word" value="Saturday"
                    onkeydown="return event.key != 'Enter';">Saturday
                    <span class="checkmark"></span>
                    </label><br>

                    <label class="container">
                    <input type="radio" name="day_word" value="Sunday"
                    onkeydown="return event.key != 'Enter';">Sunday
                    <span class="checkmark"></span>
                    </label><br>
                </div>
                <hr>
                <button type="button" onclick="change_question('question2','question3')">Back</button>
                <button type="button" onclick="change_question('question4','question3')">Next</button> 
            </div>

            <div id='question4' style="display:none;text-align:center;">
                <h1 align="center">Write current daynumber</h1>
                <div style="text-align:center;">
                    <input type="number" name="day_num" align="center"
                    onkeydown="return event.key != 'Enter';">
                </div>
                <hr>
                <button type="button" onclick="change_question('question3','question4')">Back</button>
                <button type="button" onclick="change_question('question5','question4')">Next</button>
                
            </div>

            <div id='question5' style="display:none;text-align:center;">
                <h1 align="center">What time of day is it?</h1>
                <div class = 'radio_group'>
                    <label class="container">
                    <input type="radio" name="time_of_day" value="Morning"
                    onkeydown="return event.key != 'Enter';">Morning<br> <!--06-10 -->
                    <span class="checkmark"></span>
                    </label><br>

                    <label class="container">
                    <input type="radio" name="time_of_day" value="Lunchtime"
                    onkeydown="return event.key != 'Enter';">Lunchtime<br><!--10-14 -->
                    <span class="checkmark"></span>
                    </label><br>

                    <label class="container">
                    <input type="radio" name="time_of_day" value="Afternoon"
                    onkeydown="return event.key != 'Enter';">Afternoon<br><!--14-18 -->
                    <span class="checkmark"></span>
                    </label><br>

                    <label class="container">
                    <input type="radio" name="time_of_day" value="Evening"
                    onkeydown="return event.key != 'Enter';">Evening<br><!--18-22 -->
                    <span class="checkmark"></span>
                    </label><br>

                    <label class="container">
                    <input type="radio" name="time_of_day" value="Night"
                    onkeydown="return event.key != 'Enter';">Night<br><!--22-06 -->
                    <span class="checkmark"></span>
                    </label><br>
                </div>
                <hr>
                <button type="button" onclick="change_question('question4','question5')">Back</button>
                <button type="button" onclick="change_question('question6','question5')">Next</button>
            </div>

            <div id='question6' style="display:none;text-align:center;">
                <h1 align="center">In what country are you in?</h1>
                <div style="text-align:center;">
                    <input type="text" name="country" align="center" autocomplete="new-password"
                    onkeydown="return event.key != 'Enter';">
                </div>
                <hr>
                <button type="button" onclick="change_question('question5','question6')">Back</button>
                <button type="button" onclick="change_question('question7','question6')">Next</button>
            </div>


            <div id='question7' style="display:none;text-align:center;">
                <h1 align="center">In what county/state are you in?</h1>
                <div style="text-align:center;">
                    <input type="text" name="state" align="center" autocomplete="new-password"
                    onkeydown="return event.key != 'Enter';">
                </div>
                <hr>
                <button type="button" onclick="change_question('question6','question7')">Back</button>
                <button type="button" onclick="change_question('question8','question7')">Next</button>  
            </div>

            <div id='question8' style="display:none;text-align:center;">
                <h1 align="center">In what city/town are you?</h1>
                <div style="text-align:center;">
                    <input type="text" name="town" align="center" autocomplete="new-password"
                    onkeydown="return event.key != 'Enter';">
                </div>
                <hr>
                <button type="button" onclick="change_question('question7','question8')">Back</button>
                <button type="button" onclick="change_question('question9','question8')">Next</button>
            </div>

            <div id='question9' style="display:none;text-align:center;">
                <h1 align="center">On what street are you?</h1>
                <div style="text-align:center;">
                    <input type="text" name="street" align="center" autocomplete="new-password"
                    onkeydown="return event.key != 'Enter';">
                </div>
                <hr>
                <button type="button" onclick="change_question('question8','question9')">Back</button>
                <button type="button" onclick="change_question('question10','question9')">Next</button>
            </div>

            <div id='question10' style="display:none;text-align:center;">
                <h1 align="center">On what floor is your bedroom?</h1>
                <div style="text-align:center;">
                    <input type="number" name="bedroom" align="center"
                    onkeydown="return event.key != 'Enter';">
                </div>
                <hr>
                <button type="button" onclick="change_question('question9','question10')">Back</button>
                <button type="button" onclick="change_question('question11','question10')">Next</button>
                
            </div>

            <div id='question11' style="display:none;text-align:center;">
                <h1 align="center">Three words will be shown on the screen when start button is pressed. Write down the words and remember them.</h1><br>

                <div style="text-align:center;">
                    <?php
                            include dirname(__DIR__)."/general/openDB.php";
                            $result = mysqli_query($link,"select image_id, image_name from test_images");
                            $length =$result->num_rows-1;
                            $rand1 = rand(0,$length);
                            $rand2 = rand(0,$length);
                            while ($rand2 == $rand1){
                                $rand2 = rand(0,$length);
                            }
                            $rand3 = rand(0,$length);
                            while ($rand3 == $rand1 or $rand3 == $rand2){
                                $rand3 = rand(0,$length);
                            }
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    switch ($row["image_id"]) {
                                        case $rand1:
                                            $option1 = $row["image_name"];
                                        break;
                                        case $rand2:
                                            $option2 = $row["image_name"];
                                        break;
                                        case $rand3:
                                            $option3 = $row["image_name"];
                                        break;

                                    }
                                }
                            }
                                    ?>
                                    
                                    <div id='blank' style="text-align:center;">
                                    <button type="button" onclick="display_words('word_','blank','options')">Start</button>
                                    </div>
                                    <div id='word_' style="display:none;text-align:center;">
                                        <h1><?php echo "$option1, $option2, $option3";?></h1>
                                    </div>
                                    <?php
                                    echo "<input type='hidden' name='word_1_ans' value='$option1'>";
                                    echo "<input type='hidden' name='word_2_ans' value='$option2'>";
                                    echo "<input type='hidden' name='word_3_ans' value='$option3'>";
                                    
                            include dirname(__DIR__)."/general/closeDB.php";
                    ?>
                    <div id='options' style="display:none;text-align:center;">
                    <input type='text' name='word_1' autocomplete='new-password'
                    onkeydown="return event.key != 'Enter';">
                    <input type='text' name='word_2' autocomplete='new-password'
                    onkeydown="return event.key != 'Enter';">
                    <input type='text' name='word_3' autocomplete='new-password'
                    onkeydown="return event.key != 'Enter';">
                    <hr>
                    <button type="button" onclick="change_question('question10','question11')">Back</button>
                    <button type="button" onclick="change_question('question12','question11')">Next</button>
 
                    </div>
                </div>
                           </div>

            <div id='question12' style="display:none;text-align:center;">       
                <script>
                window.onload = function(){
                var numbers = [40, 50, 60, 70, 80, 90];
                var number = numbers[Math.floor(Math.random() * numbers.length)];
                document.getElementById('output').innerHTML = number;
                document.getElementById('output_value').value = number;
                }
                </script>     
                <h1 align='center'>Subtract 7 from <p id='output' style="display:inline"></p>, 5 times <h1>
                <div>
                <input type='hidden' name='0st-number' id='output_value' value="">
                <input type='number' name='1st-sub' align='center' onkeydown='return event.key != "Enter";'><br>
                <input type='number' name='2st-sub' align='center' onkeydown='return event.key != "Enter";'><br>
                <input type='number' name='3st-sub' align='center' onkeydown='return event.key != "Enter";'><br>
                <input type='number' name='4st-sub' align='center' onkeydown='return event.key != "Enter";'><br>
                <input type='number' name='5st-sub' align='center' onkeydown='return event.key != "Enter";'><br>
                </div>
                <hr>
                <button type="button" onclick="change_question('question11','question12')">Back</button>
                <button type="button" onclick="change_question('question13','question12')">Next</button>
            </div>

            <div id='question13' style="display:none;text-align:center;">
                <h1 align="center">Write the words you that you were to remember (order does not matter).</h1>
                <div>
                    <input type="text" name="word_1_rem" align="center" autocomplete="new-password" onkeydown="return event.key != 'Enter';">
                    <input type="text" name="word_2_rem" align="center" autocomplete="new-password" onkeydown="return event.key != 'Enter';">
                    <input type="text" name="word_3_rem" align="center" autocomplete="new-password" onkeydown="return event.key != 'Enter';">
                </div>
                <hr>
                <button type="button" onclick="change_question('question12','question13')">Back</button>
                <button type="button" onclick="change_question('question14_1','question13')">Next</button>
            </div>

            <div id='question14_1' style="display:none;text-align:center;">
                <h1 align="center">Name these images.</h1>
                <div>
                    <?php
                        include dirname(__DIR__)."/general/openDB.php";
                        $result = mysqli_query($link,"select image_id, image_url, image_name from test_images");
                        $length =$result->num_rows-1;
                        $image_num = rand(0,$length);
                        //First random number
                        $rand1 = rand(0,$length);
                        while ($rand1 == $image_num){
                            $rand1 = rand(0,$length);
                        }
                        $rand2 = rand(0,$length);
                        while ($rand2 == $image_num or $rand2 == $rand1){
                            $rand2 = rand(0,$length);
                        }
                        $rand3 = rand(0,$length);
                        while ($rand3 == $image_num or $rand3 == $rand1 or $rand3 == $rand2){
                            $rand3 = rand(0,$length);
                        }
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                switch ($row["image_id"]) {
                                    case $image_num:
                                        $image_url = $row["image_url"];
                                        $ans_1 = $row["image_name"];
                                    break;
                                    case $rand1:
                                        $option1_1 = $row["image_name"];
                                    break;
                                    case $rand2:
                                        $option2_1 = $row["image_name"];
                                    break;
                                    case $rand3:
                                        $option3_1 = $row["image_name"];
                                    break;

                                }
                            }
                                $enter = 'Enter';
                                echo "<img src=".$image_url." class='test_image'><br>";
                                echo "<input type='hidden' name='image_1_ans' value='$ans_1'>";

                        }
                        include dirname(__DIR__)."/general/closeDB.php";
                        ?>
                        <div class = 'radio_group'>
                            <label class="container">
                            <input type='radio' name='image_1' onkeydown="return event.key != 'Enter';" value='<?php echo $ans_1; ?>'><?php echo $ans_1; ?>
                            <span class="checkmark"></span>
                            </label><br>

                            <label class="container">
                            <input type='radio' name='image_1' onkeydown="return event.key != 'Enter';" value='<?php echo $option1_1; ?>'><?php echo $option1_1; ?>
                            <span class="checkmark"></span>
                            </label><br>

                            <label class="container">
                            <input type='radio' name='image_1' onkeydown="return event.key != 'Enter';" value='<?php echo $option2_1; ?>'><?php echo $option2_1; ?>
                            <span class="checkmark"></span>
                            </label><br>

                            <label class="container">
                            <input type='radio' name='image_1' onkeydown="return event.key != 'Enter';" value='<?php echo $option3_1; ?>'><?php echo $option3_1; ?>
                            <span class="checkmark"></span>
                            </label><br>
                       </div>
                </div>
                <button type="button" onclick="change_question('question13','question14_1')">Back</button>
                <button type="button" onclick="change_question('question14_2','question14_1')">Next</button>
            </div>
            <div id='question14_2' style="display:none;text-align:center;">
                <h1 align="center">Name these images.</h1>
                <div>
                    <?php
                        include dirname(__DIR__)."/general/openDB.php";
                        $result = mysqli_query($link,"select image_id, image_url, image_name from test_images");
                        $length =$result->num_rows-1;
                        $prev_num = $image_num;
                        $image_num = rand(0,$length);
                        while ($image_num == $prev_num){
                            $image_num= rand(0,$length);
                        }
                        //First random number
                        $rand1 = rand(0,$length);
                        while ($rand1 == $image_num){
                            $rand1 = rand(0,$length);
                        }
                        $rand2 = rand(0,$length);
                        while ($rand2 == $image_num or $rand2 == $rand1){
                            $rand2 = rand(0,$length);
                        }
                        $rand3 = rand(0,$length);
                        while ($rand3 == $image_num or $rand3 == $rand1 or $rand3 == $rand2){
                            $rand3 = rand(0,$length);
                        }
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                switch ($row["image_id"]) {
                                    case $image_num:
                                        $image_url = $row["image_url"];
                                        $ans_2 = $row["image_name"];
                                    break;
                                    case $rand1:
                                        $option1_2 = $row["image_name"];
                                    break;
                                    case $rand2:
                                        $option2_2 = $row["image_name"];
                                    break;
                                    case $rand3:
                                        $option3_2 = $row["image_name"];
                                    break;

                                }
                            }
                                echo "<img src=".$image_url." class='test_image'><br>";
                                echo "<input type='hidden' name='image_2_ans' value='$ans_2'>";
                        }
                        include dirname(__DIR__)."/general/closeDB.php";
                        ?>
                        
                        <div class = 'radio_group'>
                            <label class="container">
                            <input type='radio' name='image_2' onkeydown="return event.key != 'Enter';" value='<?php echo $ans_2; ?>'><?php echo $ans_2; ?>
                            <span class="checkmark"></span>
                            </label><br>

                            <label class="container">
                            <input type='radio' name='image_2' onkeydown="return event.key != 'Enter';" value='<?php echo $option1_2; ?>'><?php echo $option1_2; ?>
                            <span class="checkmark"></span>
                            </label><br>

                            <label class="container">
                            <input type='radio' name='image_2' onkeydown="return event.key != 'Enter';" value='<?php echo $option2_2; ?>'><?php echo $option2_2; ?>
                            <span class="checkmark"></span>
                            </label><br>

                            <label class="container">
                            <input type='radio' name='image_2' onkeydown="return event.key != 'Enter';" value='<?php echo $option3_2; ?>'><?php echo $option3_2; ?>
                            <span class="checkmark"></span>
                            </label><br>
                        </div>     
                <button type="button" onclick="change_question('question14_1','question14_2')">Back</button>
                <button type="submit" name="submit" value="Submit">Submit</button>
        </form>
    </body>
</html>