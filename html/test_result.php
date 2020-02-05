<html>  

  <?php


  include "../html/php/openDB.php";
  $answerQ6 = mysqli_query($link,"select country from patients where patient_id == ");
  $answerQ7 = mysqli_query($link,"select state from patients where patient_id == ");
  $answerQ8 = mysqli_query($link,"select city from patients where patient_id == ");
  $answerQ9 = mysqli_query($link,"select street from patients where patient_id == ");
  $answerQ10 = mysqli_query($link,"select bedroom_floor from patients where patient_id == ");
  include "../html/php/closeDB.php";
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
    if ($_POST['curr_year'] == date(Y)){
      $question1++;
    }

    //Question 2
    if ($_POST['month'] == date(F)){
      $question2++;
    }

    //Question 3
    if ($_POST['day_word'] == date(l)){
      $question3++;
    }

    //Question 4
    if ($_POST['day_num'] == date(j)){
      $question4++;
    }

    //Question 5
    $time_of_day = $_POST['time_of_day'];
    date_default_timezone_set('Europe/Stockholm');
    $hour = date(G);
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
    if ($_POST['country'] == $answerQ6) {
      $question6++;
    }
    
    //Question 7
     if ($_POST['state'] == $answerQ7) {
      $question7++;
    }

    //Question 8
    if ($_POST['town'] == $answerQ8) {
      $question8++;
    }

    //Question 9
    if ($_POST['street'] == $answerQ9) {
      $question9++;
    }

    //Question 10
    if ($_POST['bedroom'] == $answerQ10) {
      $question10++;
    }
    
    //Question 11
    if ($_POST['word_1'] == $_POST['word_1_ans'] or $_POST['word_1'] == $_POST['word_2_ans'] or $_POST['word_1'] == $_POST['word_3_ans']) {
      $question11++;
    }
    if ($_POST['word_2'] == $_POST['word_1_ans'] or $_POST['word_2'] == $_POST['word_2_ans'] or $_POST['word_2'] == $_POST['word_3_ans']) {
      $question11++;
    }
    if ($_POST['word_3'] == $_POST['word_1_ans'] or $_POST['word_3'] == $_POST['word_2_ans'] or $_POST['word_3'] == $_POST['word_3_ans']) {
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
    if ($_POST['word_1_rem'] == $_POST['word_1_ans'] or $_POST['word_1_rem'] == $_POST['word_2_ans'] or $_POST['word_1_rem'] == $_POST['word_3_ans']) {
      $question13++;
    }
    if ($_POST['word_2_rem'] == $_POST['word_1_ans'] or $_POST['word_2_rem'] == $_POST['word_2_ans'] or $_POST['word_2_rem'] == $_POST['word_3_ans']) {
      $question13++;
    }
    if ($_POST['word_3_rem'] == $_POST['word_1_ans'] or $_POST['word_3_rem'] == $_POST['word_2_ans'] or $_POST['word_3_rem'] == $_POST['word_3_ans']) {
      $question13++;
    }

    //Question 13
    if ($_POST['image_1'] == $_POST['image_1_ans']) {
      $question14++;
    }
    if ($_POST['image_2'] == $_POST['image_2_ans']) {
      $question14++;
    }


    echo "1: $question1, 2: $question2, 3: $question3, 4: $question4, 5: $question5, 6: $question6, 7: $question7, 8: $question8, 9: $question9, 10: $question10, 11: $question11, 12: $question12, 13: $question13, 14: $question14";

    
  ?>
</html>