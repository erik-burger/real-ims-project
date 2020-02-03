<html>  

  <?php
    $orientation_score = 0;
    $imediate_repetition = 0;
    $delayed_repetition = 0;

    //Question 1
    if ($_POST['curr_year'] == date(Y)){
      $orientation_score++;
    }

    //Question 2
    if ($_POST['month'] == date(F)){
      $orientation_score++;
    }

    //Question 3
    if ($_POST['day_word'] == date(l)){
      $orientation_score++;
    }

    //Question 4
    if ($_POST['day_num'] == date(j)){
      $orientation_score++;
    }

    //Question 5
    $time_of_day = $_POST['time_of_day'];
    date_default_timezone_set('Europe/Stockholm');
    $hour = date(G);
    switch ($time_of_day) {
      case "Morning":
          if (5 <= $hour and $hour <= 11 ) {
            $orientation_score++;
          }
          break;
      case "Lunchtime":
          if (10 <= $hour and $hour <= 14) {
            $orientation_score++;
          }
          break;
      case "Afternoon":
          if (13 <= $hour and $hour <= 18) {
            $orientation_score++;
          }
          break;
      case "Evening":
          if (17 <= $hour and $hour <= 22) {
            $orientation_score++;
          }
      case "Night":
          if (20 <= $hour or $hour <= 5) {
            $orientation_score++;
          }
        break;
  }

    echo "$orientation_score";
  ?>
</html>