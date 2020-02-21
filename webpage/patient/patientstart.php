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
                text-align: center;
                text-decoration: none;
            }
<<<<<<< HEAD
            
            .smallbutton{
              height: 100px;
              width: 200px;
              display:inline-block; 
              padding: 40px 46px;
              font-size: 20px;
              margin-bottom:5px;
=======
            .bigbutton{
              padding: 10px 10px;
            }
            .btn-group{
              display: block;
              padding: 10px 10px;
            }
            .all_buttons{
              display: inline-block;
              padding: 10px 10px;
>>>>>>> reminder
            }

        </style>
  </head>

  <body> <!--style="background-color: blue;"> --> <!-- add for blue bg-->
    
  <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <img class="logo" src="../general/logo_small.png" width = 50>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="../general/logout.php">Logout</a></li>
            </ul>
        </div>
    </nav>
    <hr>
    
    <div class = "all_buttons">
    <div class="bigbutton">
    <button onclick="location.href='Question_sheet.php'"
      type="button" 
      style="font-size: 100px;height: 430px;width: 500px" 
      value="Test">
      TEST
    </button>
    </div>
<<<<<<< HEAD
    
    <div class="btn-group" align="center">
      <button class= "smallbutton" onclick="location.href='patient_sudoku.php'"
        type="button" 
        value="Test"> 
        GAMES
      </button>
      
      <button class= "smallbutton" onclick="location.href='patientprofile.php'" 
        type="button" 
        value="Test">
        PROFILE
      </button>

      <button class= "smallbutton" onclick="location.href='patient_statistics.php'" 
        type="button" 
        value="Test">
        STATISTICS
      </button>

      <button class= "smallbutton" onclick="location.href='chat_home_patient.php'" 
        type="button" 
=======
   
    <div class="btn-group" style = "height:10x;width:10px;">
      <button onclick="location.href='patient_sudoku.php'"
        type="button" 
        style="padding: 40px 46px;font-size: 20px;width: 200px;height: 100px;" 
        value="Test"> 
        GAMES
      </button>
    <div class ="btn-group"></div>  
      <button onclick="location.href='patientprofile.php'" 
        type="button" 
        style="padding: 40px 46px;font-size: 20px;width: 200px;height: 100px;" 
        value="Test">
        PROFILE
      </button>
      <div class ="btn-group"></div>
      <button onclick="location.href='patient_statistics.php'" 
        type="button" 
        style="padding: 40px 46px;font-size: 20px;width: 200px;height: 100px;" 
        value="Test">
        STATISTICS
      </button>
      <div class ="btn-group"></div>
      <button onclick="location.href='chat_home_patient.php'" 
        type="button" 
        style="padding: 40px 46px;font-size: 20px;width: 200px;height: 100px;" 
>>>>>>> reminder
        value="Test">
        MESSAGES
      </button>
    </div>
    </div>
  </body>
</html>