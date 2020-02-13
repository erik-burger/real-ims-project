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
                padding: 15px 32px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 30px;
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
    
    <button onclick="location.href='Question_sheet.php'"
      type="button" 
      style="margin-left:auto;margin-right:auto;margin-bottom:5px;display:block;padding: 100px 150px;font-size: 100px;" 
      value="Test">
      TEST
    </button>

    <div class="btn-group" align="center">
      <button type="button" 
        style="display:inline-block;padding: 40px 46px;font-size: 20px;" 
        value="Test"> 
        GAMES
      </button>
      
      <button onclick="location.href='patientprofile.php'" 
        type="button" 
        style="display:inline-block;padding: 40px 46px;font-size: 20px;" 
        value="Test">
        PROFILE
      </button>

      <button onclick="location.href='patient_statistics.php'" 
        type="button" 
        style="display:inline-block;padding: 40px 46px;font-size: 20px;" 
        value="Test">
        STATISTICS
      </button>

    </div>
  </body>
