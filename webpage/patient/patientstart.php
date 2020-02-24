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
           .bigbutton{
              padding: 10px 10px;
            }
            .btn-group{
              display: block;
              padding: 10px 10px;
            }
            .all_buttons{
              display: inline-block;
              padding: 10px 10px;}
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
    
    <div class = "all_buttons" style="align:center;">
    <div class="bigbutton">
    <button onclick="location.href='Question_sheet.php'"
      type="button" 
      style="font-size: 100px;height: 480px;width: 500px; position:absolute; top: 15%;left:41%;" 
      value="Test">
      TEST
    </button>
    </div>
    <div class="btn-group" style = "height:10x;width:10px;">
      <button onclick="location.href='patient_sudoku.php'"
        type="button" 
        style="padding: 40px 46px;font-size: 20px;width: 200px;height: 100px; position:absolute;top: 15%; left: 22%;" 
        value="Test"> 
        GAMES
      </button>
    <div class ="btn-group"></div>  
      <button onclick="location.href='patientprofile.php'" 
        type="button" 
        style="padding: 40px 46px;font-size: 20px;width: 200px;height: 100px; position:absolute;top: 35%; left: 22%;" 
        value="Test">
        PROFILE
      </button>
      <div class ="btn-group"></div>
      <button onclick="location.href='patient_statistics.php'" 
        type="button" 
        style="padding: 40px 46px;font-size: 20px;width: 200px;height: 100px;position:absolute;top: 55%; left: 22%;" 
        value="Test">
        STATISTICS
      </button>
      <div class ="btn-group"></div>
      <button onclick="location.href='chat_home_patient.php'" 
        type="button" 
        style="padding: 40px 46px;font-size: 20px;width: 200px;height: 100px;position:absolute;top: 75%; left: 22%;" 
        value="Test">
      MESSAGES</button>
  </body>
</html>