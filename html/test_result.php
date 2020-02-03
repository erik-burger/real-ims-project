<html>  

  <?php


  include 'dbstarter.php';
  $answerQ6 = mysqli_query($link,"select country from patients where patient_id == ");
  $answerQ7 = mysqli_query($link,"select state from patients where patient_id == ");
  $answerQ8 = mysqli_query($link,"select city from patients where patient_id == ");
  $answerQ9 = mysqli_query($link,"select street from patients where patient_id == ");
  $answerQ10 = mysqli_query($link,"select bedroom_floor from patients where patient_id == ");

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
    if ($_POST['country'] == $answerQ6 {
      $question6++;
    }
    
    //Question 7
     if ($_POST['state'] == $answerQ7 {
      $question7++;
    }

    //Question 8
    if ($_POST['town'] == $answerQ8 {
      $question8++;
    }

    //Question 9
    if ($_POST['street'] == $answerQ9 {
      $question9++;
    }

    //Question 10
    if ($_POST['bedroom'] == $answerQ10 {
      $question10++;
    }

    echo "$question1 $question2 $question3 $question4 $question5 $question6 $question7 $question8 $question9 $question10";
  ?>
</html>