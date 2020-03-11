<?php
//Initialize the session
session_start();
$_SESSION["loggedin"] = false;
$_SESSION["user"] = ""; 


//Check if the user is already logged in

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
	  header("location:../general/start_page.php");
}


//Connect to database
include dirname(__DIR__).'/general/openDB.php';

$email = "";
$password = "";
$error = array('username_err'=>'', 'psw_err'=>'', 'verified_err'=>'');

//If user has pressed login check for errors
if(isset($_POST['submit'])){
	// Check if username is empty
	if(empty(trim($_POST["email"]))){
    	$error['username_err'] = "Please enter your email address.";
	} else{
    	$email = trim($_POST["email"]);
    }

	// Check if password is empty
 	if(empty(trim($_POST["psw"]))){
    	$error['psw_err'] = "Please enter your password.";
	} else{
    	$password = trim($_POST["psw"]);
    }

$email = mysqli_real_escape_string($link, $email);

if(!array_filter($error)){ 	
	$usersql = "SELECT user_id FROM users WHERE email = '$email'";
	$userresult = mysqli_query($link, $usersql)
	or die("Could not issue MySQL query");
	$count = mysqli_num_rows($userresult);
	
	if($count == 1){
		$verifiedsql = "SELECT verified FROM users WHERE email = '$email'";
		$verifiedresult = mysqli_query($link, $verifiedsql) 
		or die("Could not issue verified MySQL query");
		$verified_row = mysqli_fetch_row($verifiedresult);
	
		if($verified_row[0] == 1){ //Account has been verified -> check password    			
			//Get the password_hash from the database
			$psw_result = mysqli_query($link, "SELECT password_hash from users where email = '$email'");
			$psw_row = mysqli_fetch_row($psw_result);
			$password_hash = $psw_row[0];

			if(password_verify($password, $password_hash) === true) {//Verify the string password with the hashed password
				//Set all the necessary session variables
				$_SESSION["loggedin"] = true;
				$_SESSION["email"] = $email;
				$result = mysqli_query($link, "select user_id, usertype from users where email = '$email'")
				or die("Could not issue doctor session MySQL query"); //get the doctor id from unique email
				while ($row = $result->fetch_assoc()) {
					$_SESSION["id"] = $row["user_id"];
					$_SESSION["user"] = $row["usertype"]; //for automatic logout if wrong user type acceses a page	
				}
				include dirname(__DIR__).'/general/email_reminder.php'; //Include email reminder file 
				
				$_SESSION["timestamp"] = time(); //needed for logout after inactivity
				header("location: ../general/start_page.php"); //redirect to doctor start page
				
			} else {
				$error['psw_err'] = "Password is invalid";
			}
		}else{
			$error['verified_err'] = "Account not activated. Please activate your account by clicking on the link that was sent to you when registering.";
		}
	}else{
		$error['verified_err'] = "Invalid email adress. Please register before you login";
	}
}}
?>


<!DOCTYPE html>
<html>

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
		.error {
    		color: #FF0000;
    		font-size: 14px;
    		font-weight: bold;
    	} 
		.button{
			background-color: #669999; 
			border: none;
			color: white;
			padding: 14px 32px;
			text-align: center;
			text-decoration: none;
			display: inline;
			font-size: 16px;  
			margin-top: 10px;    
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
			<a href="contact.php">Contact</a>
            <div class="dropdown">
                <button class="dropbtn">Register
                  <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                  <a href="../general/register.php?user=P">Patient</a>
				  <a href="../general/register.php?user=D">Doctor</a>
                  <a href="../general/register.php?user=R">Researcher</a>
                  <a href="../general/register.php?user=C">Caregiver</a>
                </div>
              </div>       
        </div>
                <img id="b" src="logo_grey.png" width=800>
        
        <form action="login.php" method="post">
          
            <div class="container">
              <div class="error"><?php echo $error['verified_err']; ?></div><br>
            
              <label for="email"><b>Email address</b></label>
              <input type="text" name="email" value="<?php echo htmlspecialchars($email); ?>">
              <div class="error"><?php echo $error['username_err']; ?></div><br>
          
              <label for="psw"><b>Password</b></label>
              <input type="password" name="psw">
          	  <div class="error"><?php echo $error['psw_err']; ?></div><br>
          
          	  <input class = "button" type = "submit" name="submit" value="Login">
             <!-- <button type="submit">Login</button> --> 
              <label>
                <input type="checkbox" checked="checked" name="remember"> Remember me
              </label>
            </div>
          
            <div class="container">
              <span class="psw">Forgot <a href="forgotPassword.php">password?</a></span>
            </div>
		  </form> 
    </body>
</html>

<?php
include dirname(__DIR__).'/general/closeDB.php';
?>