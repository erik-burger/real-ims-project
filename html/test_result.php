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
    $time_of_day = $_POST['day_num'];
    switch ($time_of_day) {
      case "Morning":
          echo "i equals 0";
          break;
      case 1:
          echo "i equals 1";
          break;
      case 2:
          echo "i equals 2";
          break;
  }

    echo "$orientation_score";
  ?>
</html>