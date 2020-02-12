<!DOCTYPE html>
<html>
<meta http-equiv="refresh" content="3600;url=../general/logout.php" />
<?php
session_start();
/*if ( isset($_SESSION["user"]) == "D") { // if the user is a patient -> logout
  $_SESSION = array();
  session_destroy();
  header("location: ../html/php/login.php");
} elseif( isset($_SESSION["user"]) === false) { // if no user is logged in -> login page
  header("location: ../html/php/login.php");
}*/
$_SESSION["timestamp"] = time();

?>
  <head>
    <meta charset="UTF-utf-8">
    <meta name="description" content="Start page for patients">
    <title>Trackzheimers</title>
    <link rel="stylesheet" href="top_menu_style.css">
  </head>

  <body> <!--style="background-color: blue;"> --> <!-- add for blue bg-->
    
    <div class="navbar" align="right">
        <a href="../general/logout.php">Logout</a>
    </div>
    
    <img src="LOGO.png" style="display: block;margin-left: auto;margin-right: auto;">

    <button onclick="location.href='Question_sheet.php'"
      type="button" 
      style="margin-left:auto;margin-right:auto;margin-bottom:5px;display:block;padding: 200px 175px;font-size: 100px;" 
      value="Test">
      TEST
    </button>

    <div class="btn-group" align="center">
      <button type="button" 
        style="display:inline-block;padding: 40px 53px;font-size: 20px;" 
        value="Test"> 
        GAMES
      </button>
      
      <button onclick="location.href='patientprofile.php'" 
        type="button" 
        style="display:inline-block;padding: 40px 53px;font-size: 20px;" 
        value="Test">
        PROFILE
      </button>

      <button onclick="location.href='patient_statistics.php'" 
        type="button" 
        style="display:inline-block;padding: 40px 53px;font-size: 20px;" 
        value="Test">
        STATISTICS
      </button>

    </div>
  </body>
</html>