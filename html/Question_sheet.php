<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-utf-8">
        <meta name="description" content="questions_sheet">
        <title>Trackzheimers</title>   
        <link rel="stylesheet" href="top_menu_style.css">
    </head>

        <div class="navbar">
            <a href="../html/php/logout.php">Logout</a>          
        </div>

    <body>
        

        <script>
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

        <form action=test_result.php method="POST">

            <div id='question1' style="text-align:center;">
                <h1 align="center">Write the current year</h1>
                <div style="text-align:center;">
                    <input type="number" name="curr_year" align="center"
                    style="height:100px; width:300px;font-size:100px;">
                </div>
                <button type="button" onclick="change_question('question2','question1')">Next1</button>
            </div>

            <div id='question2' style="display:none" style="text-align:center;">
                <h1 align="center">Select the current month</h1>
                <input type="radio" name="month" value="January">January<br>
                <input type="radio" name="month" value="February">Februay<br>
                <input type="radio" name="month" value="March">March<br>
                <input type="radio" name="month" value="April">April<br>
                <input type="radio" name="month" value="May">May<br>
                <input type="radio" name="month" value="June">June<br>
                <input type="radio" name="month" value="July">July<br>
                <input type="radio" name="month" value="August">August<br>
                <input type="radio" name="month" value="September">September<br>
                <input type="radio" name="month" value="October">October<br>
                <input type="radio" name="month" value="November">November<br>
                <input type="radio" name="month" value="December">December<br>
                <button type="button" onclick="change_question('question3','question2')">Next2</button>
            </div>

            <div id='question3' style="display:none" style="text-align:center;">
                <h1 align="center">Select current day</h1>
                <input type="radio" name="day_word" value="Monday">Monday<br>
                <input type="radio" name="day_word" value="Tuesday">Tuesday<br>
                <input type="radio" name="day_word" value="Wednesday">Wednesday<br>
                <input type="radio" name="day_word" value="Thursday">Thursday<br>
                <input type="radio" name="day_word" value="Friday">Friday<br>
                <input type="radio" name="day_word" value="Saturday">Saturday<br>
                <input type="radio" name="day_word" value="Sunday">Sunday<br>
                <button type="button" onclick="change_question('question4','question3')">Next3</button>
            </div>

            <div id='question4' style="display:none" style="text-align:center;">
                <h1 align="center">Select current daynumber????</h1>
                <div style="text-align:center;">
                    <input type="number" name="day_num" align="center"
                    style="height:100px; width:300px;font-size:100px;">
                </div>
                <button type="button" onclick="change_question('question5','question4')">Next4</button>
            </div>

            <div id='question5' style="display:none" style="text-align:center;">
                <h1 align="center">What time of day is it?</h1>
                    <input type="radio" name="time_of_day" value="Morning">Morning<br> <!--06-10 -->
                    <input type="radio" name="time_of_day" value="Lunchtime">Lunchtime<br><!--10-14 -->
                    <input type="radio" name="time_of_day" value="Afternoon">Afternoon<br><!--14-18 -->
                    <input type="radio" name="time_of_day" value="Evening">Evening<br><!--18-22 -->
                    <input type="radio" name="time_of_day" value="Night">Night<br><!--22-06 -->
                <button type="button" onclick="change_question('question6','question5')">Next5</button>
            </div>

            <div id='question6' style="display:none" style="text-align:center;">
                <h1 align="center">In what country are you in?</h1>
                <div style="text-align:center;">
                    <input type="text" name="country" align="center" autocomplete="new-password" autocomplete="off"
                    style="height:100px; width:300px;font-size:100px;">
                </div>
                <button type="button" onclick="change_question('question7','question6')">Next6</button>
            </div>


            <div id='question7' style="display:none" style="text-align:center;">
                <h1 align="center">In what county/state are you in?</h1>
                <div style="text-align:center;">
                    <input type="text" name="state" align="center" autocomplete="new-password"
                    style="height:100px; width:300px;font-size:100px;">
                </div>
                <button type="button" onclick="change_question('question8','question7')">Next7</button>
            </div>

            <div id='question8' style="display:none" style="text-align:center;">
                <h1 align="center">In what city/town are you?</h1>
                <div style="text-align:center;">
                    <input type="text" name="town" align="center" autocomplete="new-password"
                    style="height:100px; width:300px;font-size:100px;">
                </div>
                <button type="button" onclick="change_question('question9','question8')">Next8</button>
            </div>

            <div id='question9' style="display:none" style="text-align:center;">
                <h1 align="center">On what street are you?</h1>
                <div style="text-align:center;">
                    <input type="text" name="street" align="center" autocomplete="new-password"
                    style="height:100px; width:300px;font-size:100px;">
                </div>
                <button type="button" onclick="change_question('question10','question9')">Next9</button>
            </div>

            <div id='question10' style="display:none" style="text-align:center;">
                <h1 align="center">On what floor is your bedroom?</h1>
                <div style="text-align:center;">
                    <input type="text" name="bedroom" align="center"
                    style="height:100px; width:300px;font-size:100px;">
                </div>
                <button type="button" onclick="change_question('question11','question10')">Next10</button>
            </div>

            <div id='question11' style="display:none" style="text-align:center;">
                <h1 align="center">Write the word shown on the screen and remember them</h1>
                <div style="text-align:center;">
                    <?php
                            include dirname(__DIR__)."/html/php/openDB.php";
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
                                    echo "$option1, $option2, $option3";
                                    echo "<input type='hidden' name='word_1_ans' value='$option1'>";
                                    echo "<input type='hidden' name='word_2_ans' value='$option2'>";
                                    echo "<input type='hidden' name='word_3_ans' value='$option3'>";
                                    
                            }
                            include dirname(__DIR__)."/html/php/closeDB.php";
                    ?>
                    <input type='text' name='word_1' autocomplete='new-password'>
                    <input type='text' name='word_2' autocomplete='new-password'>
                    <input type='text' name='word_3' autocomplete='new-password'>
                </div>
                <button type="button" onclick="change_question('question12','question11')">Next11</button>
            </div>

            <div id='question12' style="display:none" style="text-align:center;">
                <script>
                    window.onload = function(){
                    let numbers = [40, 50, 60, 70, 80, 90]
                    number = numbers[Math.floor(Math.random() * numbers.length)]
                    document.getElementById('output').innerHTML = number;
                };
                </script>
                
                <?php
                    $numbers = array(40, 50, 60, 70, 80, 90);
                    $number = $numbers[array_rand($numbers)];
                    $title_str = "Subtract 7 from ".$number.", 5 times";
                    //echo '<h1>'Subtract 7 from$number 5 times'</h1>';
                    echo "<h1 align='center'>".$title_str."</h1>";
                    echo "<div>";
                    echo "<input type='hidden' name='0st-number' value='$number'>";
                    echo "<input type='number' name='1st-sub' align='center' style='height:20px; width:40px;font-size:15px;'>";
                    echo "<input type='number' name='2st-sub' align='center' style='height:20px; width:40px;font-size:15px;'>";
                    echo "<input type='number' name='3st-sub' align='center' style='height:20px; width:40px;font-size:15px;'>";
                    echo "<input type='number' name='4st-sub' align='center' style='height:20px; width:40px;font-size:15px;'>";
                    echo "<input type='number' name='5st-sub' align='center' style='height:20px; width:40px;font-size:15px;'>";
                    echo "</div>";
                ?>
                <button type="button" onclick="change_question('question13','question12')">Next12</button>
            </div>

            <div id='question13' style="display:none" style="text-align:center;">
                <h1 align="center">Write the words you that you were to remember (order does not matter).</h1>
                <div>
                    <input type="text" name="word_1_rem" align="center" autocomplete="new-password">
                    <input type="text" name="word_2_rem" align="center" autocomplete="new-password">
                    <input type="text" name="word_3_rem" align="center" autocomplete="new-password">
                </div>
                <button type="button" onclick="change_question('question14_1','question13')">Next13</button>
            </div>

            <div id='question14_1' style="display:none" style="text-align:center;">
                <h1 align="center">Name these images.</h1>
                <div>
                    <?php
                        include dirname(__DIR__)."/html/php/openDB.php";
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
                                echo "<img src=".$image_url."><br>";
                                echo "<input type='hidden' name='image_1_ans' value='$ans_1'>";
                                echo "<input type='radio' name='image_1' value='$ans_1'>$ans_1";
                                echo "<input type='radio' name='image_1' value='$option1_1'>$option1_1";
                                echo "<input type='radio' name='image_1' value='$option2_1'>$option2_1";
                                echo "<input type='radio' name='image_1' value='$option3_1'>$option3_1";
                        }
                        include dirname(__DIR__)."/html/php/closeDB.php";
                ?>

                </div>
                <button type="button" onclick="change_question('question14_2','question14_1')">Next14_1</button>
            </div>
            <div id='question14_2' style="display:none" style="text-align:center;">
                <h1 align="center">Name these images.</h1>
                <div>
                    <?php
                        include dirname(__DIR__)."/html/php/openDB.php";
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
                                echo "<img src=".$image_url."><br>";
                                echo "<input type='hidden' name='image_2_ans' value='$ans_2'>";
                                echo "<input type='radio' name='image_2' value='$ans_2'>$ans_2";
                                echo "<input type='radio' name='image_2' value='$option1_2'>$option1_2";
                                echo "<input type='radio' name='image_2' value='$option2_2'>$option2_2";
                                echo "<input type='radio' name='image_2' value='$option3_2'>$option3_2";
                        }
                        include dirname(__DIR__)."/html/php/closeDB.php";
                ?>
                <button type="submit" value="Submit">Submit</button>


        </form>

    </body>
</html>