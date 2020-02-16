<html>
<meta http-equiv="refresh" content="3600;url=../general/logout.php" />
<?php
session_start();
/*if ( isset($_SESSION["user"]) == "R") { // if the user is a patient -> logout
    $_SESSION = array();
    session_destroy();
    header("location: ../general/login.php");
} elseif( isset($_SESSION["user"]) === false) { // if no user is logged in -> login page
    header("location: ../html/php/login.php");
}
*/
?>

<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="top_menu_style.css">
        <link rel="stylesheet" href="../general/IMS_Style.css">
        <style>
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
        </style>
    </head>

    <body>

        <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <img class="logo" src="../general/logo_small.png" width = 50>
                <ul class="nav navbar-nav">
                <li class="active"><a href="researcherstart.php">Home</a></li> 
                <li><a href="researcherprofile.php">Profile</a></li>            
                </ul>
                <ul class="nav navbar-nav navbar-right">
                <li><a href="../general/logout.php">Logout</a></li>
            </ul>
        </div>
    </nav>


        <h1>TRACKZHEIMERS LOGO</h1>

        <h2>Information...</h2>
        <p1>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque urna justo, sagittis in bibendum vitae, auctor in ex. Nullam posuere, ex nec condimentum accumsan, sapien erat interdum erat, mattis accumsan tellus erat in tortor. Suspendisse a varius risus. Maecenas consectetur ligula elit, laoreet pharetra eros suscipit eget. Nunc molestie finibus mattis. Mauris quam lorem, placerat nec consequat a, laoreet vitae lorem. Donec a est at neque posuere varius quis consectetur orci. Phasellus justo justo, ornare ac elementum vel, dignissim ac lacus. Nam interdum nisl in neque molestie rutrum.
        </p1>
        <h1>Download</h1>
        <div class="container">
        
        <form method='post' action='download.php'>
        <input type='submit' value='Export' name='Export'>
        
        <table border='1' style='border-collapse:collapse;'>
            <tr>
            <th>ID</th>
            <th>date</th>
            <th>Total Score</th>
            <th>Question 1</th>
            <th>Question 2</th>
            <th>Question 3</th>
            <th>Question 4</th>
            <th>Question 5</th>
            <th>Question 6</th>
            <th>Question 7</th>
            <th>Question 8</th>
            <th>Question 9</th>
            <th>Question 10</th>
            <th>Question 11</th>
            <th>Question 12</th>
            <th>Question 13</th>
            <th>Question 14</th>
            </tr>
            <?php 
            include dirname(__DIR__).'/general/openDB.php';
            $sql = "SELECT patient_id, test_date, total_score, score_1, score_2, score_3, score_4, score_5, score_6, score_7, score_8, score_9, score_10, score_11, score_12, score_13, score_14 FROM test";
            $result = mysqli_query($link, $sql)   
            or 
            die("Could not issue MySQL query"); 
            $test_arr = array();
            $i = 0;
            $length = mysqli_num_rows($result);
            while($row = mysqli_fetch_array($result)){
            $patient_id = MD5($row['patient_id']);
            $test_date = $row['test_date'];
            $total_score = $row['total_score'];
            $score_1 = $row['score_1'];
            $score_2 = $row['score_2'];
            $score_3 = $row['score_3'];
            $score_4 = $row['score_4'];
            $score_5 = $row['score_5'];
            $score_6 = $row['score_6'];
            $score_7 = $row['score_7'];
            $score_8 = $row['score_8'];
            $score_9 = $row['score_9'];
            $score_10 = $row['score_10'];
            $score_11 = $row['score_11'];
            $score_12 = $row['score_12'];
            $score_13 = $row['score_13'];
            $score_14 = $row['score_14'];
            $i += 1;
            $test_arr[] = array($patient_id, $test_date, $total_score, $score_1, $score_2);
            if ($i>$length-15){
        ?>
            <tr>
            <td><?php echo $patient_id; ?></td>
            <td><?php echo $test_date; ?></td>
            <td><?php echo $total_score; ?></td>
            <td><?php echo $score_1; ?></td>
            <td><?php echo $score_2; ?></td>
            <td><?php echo $score_3; ?></td>
            <td><?php echo $score_4; ?></td>
            <td><?php echo $score_5; ?></td>
            <td><?php echo $score_6; ?></td>
            <td><?php echo $score_7; ?></td>
            <td><?php echo $score_8; ?></td>
            <td><?php echo $score_9; ?></td>
            <td><?php echo $score_10; ?></td>
            <td><?php echo $score_11; ?></td>
            <td><?php echo $score_12; ?></td>
            <td><?php echo $score_13; ?></td>
            <td><?php echo $score_14; ?></td>
            </tr>
        <?php
            }
            }
        ?>
        </table>
        <?php 
            $serialize_test_arr = serialize($test_arr);
        ?>
        <textarea name='export_data' style='display: none;'><?php echo $serialize_test_arr; ?></textarea>
        </form>
        </div>
    </body>
</html>