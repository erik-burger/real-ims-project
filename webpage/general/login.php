<html>

<?php
session_start();
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  if ($_SESSION["user"] == "D") {
      header("location:../doctor/doctorstart.php");
  }elseif($_SESSION["user"] == "P"){
      header("location: ../patient/patientstart.php");
  }elseif($_SESSION["user"] == "R"){
      header("location: ../researcher/researcherstart.php");
  }elseif($_SESSION["user"] == "C"){
      header("location: ../caregiver/caregiverstart.php");}}

?>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="top_menu_style.css">
        <link href="IMS_Style.css" rel="stylesheet">

        <style>
          .logo {
                display: inline-block;
                float: left; 
            }
                        
          input[type = text], select , textarea
          {
          width: 100%;
    		  padding: 12px;
    		  border: 1px solid #ccc;
    		  border-radius; 4px;
    		  resize: vertical;
          }
          input[type = password], select , textarea{
    		  width: 100%;
    		  padding: 12px;
    		  border: 1px solid #ccc;
    		  border-radius; 4px;
    		  resize: vertical;
          }
          .container {
 		 	    border-radius: 5px;
  			  background-color: ghostwhite;
  			  padding: 20px;
  			  width:70%;
  			  margin-right: auto;
  			  margin-left:auto;
		      }
      
        </style>
    </head>

    <body>   
        <div class="navbar">
        <div class="navbar-header">
                <img class="logo" src="../general/logo_small.png" width = 50>
            </div>
            <a class="active" href="login.php">Login</a>
            <a href="info.html">About</a>
            <div class="dropdown">
                <button class="dropbtn">Register
                  <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                  <a href="../patient/patient_registration.php">Patient</a>
                  <a href="../doctor/doctor_registration.php">Doctor</a>
                  <a href="../researcher/researcher_registration.php">Researcher</a>
                  <a href="../caregiver/caregiver_registration.php">Caregiver</a>
                </div>
              </div>       
        </div>
                <img id="b" src="logo_grey.png" width=800>
        
        <form action="login_conn.php" method="post">
          
            <div class="container">
              <label for="email"><b>Email address</b></label>
              <input type="text" placeholder="Enter Email address" name="email" required><br>
          
              <label for="psw"><b>Password</b></label>
              <input type="password" placeholder="Enter Password" name="psw" required><br>
          
              <button type="submit">Login</button>
              <label>
                <input type="checkbox" checked="checked" name="remember"> Remember me
              </label>
            </div>
          
            <div class="container">
              <span class="psw">Forgot <a href="#">password?</a></span>
            </div>
          </form> 
      
      

    </body>
</html>