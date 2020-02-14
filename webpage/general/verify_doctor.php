<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="top_menu_style.css">
  </head>

<body>

<div class="navbar">
    <a href="../general/login.php">Login</a>
    <a href="../general/info.html">About</a>  
    <div class="dropdown">
        <button class="dropbtn">Register
          <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
          <a href="../patient/registration.html">Patient</a>
          <a href="../doctor/doctor_registration.html">Doctor</a>
          <a href="researcher_registration.html">Researcher</a>
        </div>
      </div>       
</div>


<?php
include dirname(__DIR__).'../general/openDB.php';;

if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['verification_hash']) && !empty($_GET['verification_hash'])){
	// Verify data
	$email = mysql_escape_string($_GET['email']);
	$verification_hash = mysql_escape_string($_GET['verification_string']);
	
	// Search for matches in the database
	$search = mysql_query("SELECT email, verification_hash, verified FROM doctor WHERE email='".$email."' AND verification_hash='".$verification_hash."' AND verified='0'") or die(mysql_error()); 
    $match  = mysql_num_rows($search);
    
    if($match > 0){
    	//Activate the account
        mysql_query("UPDATE doctor SET veridied='1' WHERE email='".$email."' AND verification_hash='".$verification_hash."' AND verified='0'") or die(mysql_error());
        echo "Your account has been activated, you can now login with the email and password you have registered";
    }else{
        // No match -> invalid url or account has already been activated.
        echo "The url is either invalid or you already have activated your account";
    }
} else {
	echo "Please use the link that has been sent to you";
}

include dirname(__DIR__).'../general/closeDB.php';;
?>

</html>