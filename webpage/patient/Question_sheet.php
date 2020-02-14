<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-utf-8">
        <meta name="description" content="questions_sheet">
        <title>Trackzheimers</title>   
        <link rel="stylesheet" href="top_menu_style.css">
        <link rel="stylesheet" href="../general/IMS_Style.css">
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
                width:800px;
                font-size:70px;
                border: 2px solid #669999;
            }
              
            .radio_group {
                margin: 0 auto;
                width:200px;
                text-align: left;
                font-size:30px
            }
            input[type=radio] {
                transform:scale(1.8);
                margin: 20px 10px;
                margin-top: 10px;
                vertical-align: middle;
            }

            .image_label {
                font-size:30px
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
        </style>
    </head>

    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <img class="logo" src="../general/logo_small.png" width = 50>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a onclick= go_back("patientstart.php")>Home</a></li>            
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

        

        <form action=test_result.php method="POST">

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
                <input type="radio" name="month" value="January"
                onkeydown="return event.key != 'Enter';">January<br>
                <input type="radio" name="month" value="February"
                onkeydown="return event.key != 'Enter';">Februay<br>
                <input type="radio" name="month" value="March"
                onkeydown="return event.key != 'Enter';">March<br>
                <input type="radio" name="month" value="April"
                onkeydown="return event.key != 'Enter';">April<br>
                <input type="radio" name="month" value="May"
                onkeydown="return event.key != 'Enter';">May<br>
                <input type="radio" name="month" value="June"
                onkeydown="return event.key != 'Enter';">June<br>
                <input type="radio" name="month" value="July"
                onkeydown="return event.key != 'Enter';">July<br>
                <input type="radio" name="month" value="August"
                onkeydown="return event.key != 'Enter';">August<br>
                <input type="radio" name="month" value="September"
                onkeydown="return event.key != 'Enter';">September<br>
                <input type="radio" name="month" value="October"
                onkeydown="return event.key != 'Enter';">October<br>
                <input type="radio" name="month" value="November"
                onkeydown="return event.key != 'Enter';">November<br>
                <input type="radio" name="month" value="December"
                onkeydown="return event.key != 'Enter';">December<br>
                </div>
                <hr>
                <button type="button" onclick="change_question('question1','question2')">Back</button>
                <button type="button" onclick="change_question('question3','question2')">Next</button>
            </div>

            <div id='question3' style="display:none;text-align:center;">
                <h1 align="center">Select current day</h1>
                <div class = 'radio_group'>
                <input type="radio" name="day_word" value="Monday"
                onkeydown="return event.key != 'Enter';">Monday<br>
                <input type="radio" name="day_word" value="Tuesday"
                onkeydown="return event.key != 'Enter';">Tuesday<br>
                <input type="radio" name="day_word" value="Wednesday"
                onkeydown="return event.key != 'Enter';">Wednesday<br>
                <input type="radio" name="day_word" value="Thursday"
                onkeydown="return event.key != 'Enter';">Thursday<br>
                <input type="radio" name="day_word" value="Friday"
                onkeydown="return event.key != 'Enter';">Friday<br>
                <input type="radio" name="day_word" value="Saturday"
                onkeydown="return event.key != 'Enter';">Saturday<br>
                <input type="radio" name="day_word" value="Sunday"
                onkeydown="return event.key != 'Enter';">Sunday<br>
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
                    <input type="radio" name="time_of_day" value="Morning"
                    onkeydown="return event.key != 'Enter';">Morning<br> <!--06-10 -->
                    <input type="radio" name="time_of_day" value="Lunchtime"
                    onkeydown="return event.key != 'Enter';">Lunchtime<br><!--10-14 -->
                    <input type="radio" name="time_of_day" value="Afternoon"
                    onkeydown="return event.key != 'Enter';">Afternoon<br><!--14-18 -->
                    <input type="radio" name="time_of_day" value="Evening"
                    onkeydown="return event.key != 'Enter';">Evening<br><!--18-22 -->
                    <input type="radio" name="time_of_day" value="Night"
                    onkeydown="return event.key != 'Enter';">Night<br><!--22-06 -->
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
                <?php
                    $numbers = array(40, 50, 60, 70, 80, 90);
                    $number = $numbers[array_rand($numbers)];
                    $title_str = "Subtract 7 from ".$number.", 5 times";
                    //echo '<h1>'Subtract 7 from$number 5 times'</h1>';
                    echo "<h1 align='center'>".$title_str."</h1>";
                ?>
                <div>
                <input type='hidden' name='0st-number' value='<?php echo $number; ?>'>
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
                        <div class='image_label'>
                        <input type='radio' name='image_1' onkeydown="return event.key != 'Enter';" value='<?php echo $ans_1; ?>'><?php echo $ans_1; ?>
                        <input type='radio' name='image_1' onkeydown="return event.key != 'Enter';" value='<?php echo $option1_1; ?>'><?php echo $option1_1; ?>
                        <input type='radio' name='image_1' onkeydown="return event.key != 'Enter';" value='<?php echo $option2_1; ?>'><?php echo $option2_1; ?>
                        <input type='radio' name='image_1' onkeydown="return event.key != 'Enter';" value='<?php echo $option3_1; ?>'><?php echo $option3_1; ?>
                       </div>
                </div>
                <hr>
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
                        
                        <div class='image_label'>
                        <input type='radio' name='image_2' onkeydown="return event.key != 'Enter';" value='<?php echo $ans_2; ?>'><?php echo $ans_2; ?>
                        <input type='radio' name='image_2' onkeydown="return event.key != 'Enter';" value='<?php echo $option1_2; ?>'><?php echo $option1_2; ?>
                        <input type='radio' name='image_2' onkeydown="return event.key != 'Enter';" value='<?php echo $option2_2; ?>'><?php echo $option2_2; ?>
                        <input type='radio' name='image_2' onkeydown="return event.key != 'Enter';" value='<?php echo $option3_2; ?>'><?php echo $option3_2; ?>
                        </div>
                        
                <br>
                <button type="button" onclick="change_question('question14_1','question14_2')">Back</button>
                <button type="submit" value="Submit">Submit</button>
        </form>
    </body>
</html>