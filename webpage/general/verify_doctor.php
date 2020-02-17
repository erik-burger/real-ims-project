<?php
// --------- NEED TO DO --------
// Configurate the button
// Fix so that the button only shows at the right situations 


include dirname(__DIR__).'/general/openDB.php';

$message = '';

if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['verification_hash']) && !empty($_GET['verification_hash'])){	
	// Verify data
	$email = $link->real_escape_string($_GET['email']);
	$verification_hash = $link->real_escape_string($_GET['verification_hash']);
		
	// Search for matches in the database
	$sql_search = "SELECT * FROM doctor WHERE email='$email' AND verification_hash='$verification_hash' ";
	$search = mysqli_query($link, $sql_search);

    if($search){
    	if(mysqli_num_rows($search)==1){
    		$rows = mysqli_fetch_array($search);
    		$status = $rows['verified'];
    		if($status == 0){
    			//Activate the account
        		$sql_update = "UPDATE doctor SET verified = '1' WHERE email='$email' AND verification_hash='$verification_hash'";
        		if(mysqli_query($link, $sql_update)){
        			$message = "Your account has been activated, you can now login with the email and password you have registered";
        		}else{
        			$message = "Something went wrong, account not activated. Please contact us on trackzheimers@gmail.com ";
        		}
        	}else{
        		$message = "Account is already activated. You can now login with the email and password you have registered.";
        	}
   		}else{
       		$message = "The url is invalid, please use the url that has been sent to you";
   		}
   	}
} else {
	$message = "Please use the link that has been sent to you";
}

include dirname(__DIR__).'/general/closeDB.php';;
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="top_menu_style.css">
    <style>
    	.messagebox {
			background-color:#f2f2f2;
			color: black;
			font-family:'Voltaire', sans-serif;
			font-size:20px;
			width:300px;
			height: 300px;
			padding:70px;
  			margin-right: auto;
			margin-left:auto;
			margin-top: 50px;
			text-align: center;
		}
	</style>
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
          <a href="../patient/patient_registration.php">Patient</a>
          <a href="../doctor_registration.php">Doctor</a>
          <a href="../researcher/researcher_registration.php">Researcher</a>
          <a href="../caregiver/caregiver_registration.php">Caregiver</a>
        </div>
      </div>       
</div>

<div class="messagebox">
	<h3>Doctor verification</h3><br>
	<?php echo $message; ?><br>
</div>

</body>
</html>