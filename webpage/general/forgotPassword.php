<?php
session_start();

//Connect to database
include dirname(__DIR__).'/general/openDB.php';

use PHPMailer\PHPMailer\PHPMailer;

//Function to generate random password
function random_psw($chars){
	$data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
	return substr(str_shuffle($data),0,$chars);
}

$email = ""; 
$error = array('email'=>'', 'general' => '');
$send_mail = 0; //Send mail if variable is 1 and not if 0
$category = ''; //What type of user?


if(isset($_POST["submit"])){

	if (empty($_POST["email"])){
		$errors['email'] = "Email is required";
	}else{
		$email = $link->real_escape_string($_POST["email"]);
		$email = filter_var($email, FILTER_SANITIZE_EMAIL);
		$email = strip_tags($email); 
		
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$errors['email'] = "Not a valid email";
		}else{ //Email is valid --> Check if doctor, patient, caregiver or researcher
			//Check if doctor
			$sql_doc = "SELECT email, verified FROM doctor WHERE email = '$email'";
			$doc_result = mysqli_query($link, $sql_doc) or die("Could not issue doctor MySQL query");
				
			if(mysqli_num_rows($doc_result) ==1){ //Continue to doctor 
				//Check if verified 
				$verified1 = mysqli_fetch_array($doc_result);
				if($verified1['verified']==1){
					//Send email
					$send_mail = 1;
					$category = 'D';
				}else{
					$error['general'] = 'This email adress has not been activated. Please activate your account before resetting the password.';
				}
			
			}else{ //Check if patient
				$sql_patient = "SELECT email, verified FROM patient WHERE email = '$email'";
				$patient_result = mysqli_query($link, $sql_patient) or die("Could not issue patient MySQL query");
				
				if(mysqli_num_rows($patient_result) == 1){ //Continue to patinet 
					//Check if verified 
					$verified2 = mysqli_fetch_array($patient_result);
					if($verified2['verified']==1){
						//Send email
						$send_mail = 1;
						$category = 'P';
					}else{
						$error['general'] = 'This email adress has not been activated. Please activate your account before resetting the password.';
					}				
				
				}else{ //Check if researcher
					$sql_researcher = "SELECT email, verified FROM researcher WHERE email = '$email'";
					$researcher_result = mysqli_query($link, $sql_researcher) or die("Could not issue researcher MySQL query");
				
					if(mysqli_num_rows($researcher_result) ==1){ //Continue to researcher 
						//Check if verified 
						$verified3 = mysqli_fetch_array($researcher_result);
						if($verified3['verified']==1){
							//Send email
							$send_mail = 1;
							$category = 'R';
						}else{
							$error['general'] = 'This email adress has not been activated. Please activate your account before resetting the password.';
						}				
					}else{ //Check if caregiver
						$sql_caregiver = "SELECT email, verified FROM caregiver WHERE email = '$email'";
						$caregiver_result = mysqli_query($link, $sql_caregiver) or die("Could not issue caregiver MySQL query");
				
						if(mysqli_num_rows($caregiver_result) ==1){ //Continue to caregiver 
							//Check if verified 
							$verified4 = mysqli_fetch_array($caregiver_result);
							if($verified4['verified']==1){
								//Send email
								$send_mail = 1;
								$category = 'C';
							}else{
								$error['general'] = 'This email adress has not been activated. Please activate your account before resetting the password.';
							}
						}else{
							$error['general'] = "This email has not been registered. Please register an account before trying to reset the password. ";
						}
					}
				}
			}	
		}
	}
		
	if(!array_filter($error)){
		//Generate new password
		$new_psw = random_psw(5);
		$new_hash = password_hash($new_psw, PASSWORD_DEFAULT);
		
		//Write the email 
		require_once("../PHPMailer/PHPMailer.php");
        require_once("../PHPMailer/SMTP.php");
        require_once("../PHPMailer/Exception.php");
						
        $mail = new PHPMailer();
			
        //SMTP Settings
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "trackzheimers@gmail.com";
        $mail->Password = '123trackzheimers';
        $mail->Port = 465; //587
        $mail->SMTPSecure = "ssl"; //tls

        //Email Settings
        $mail->isHTML(true);
        $mail->setFrom("trackzheimers@gmail.com");
        $mail->addAddress($email);
        $mail->Subject = "Reset password";
        $mail->Body = "Here is your new password: $new_psw <br><br>";
        $mail -> Body .= "Use this password to login, and you can then change the password in your profile page.";
		
		
		// Inserting new password into database
		if($category =='D'){
			$sql = "UPDATE doctor SET password_hash = '$new_hash' WHERE email = '$email'";
		}elseif($category == 'P'){
			$sql = "UPDATE patient SET password_hash = '$new_hash' WHERE email = '$email'";
		}elseif($category == 'R'){
			$sql = "UPDATE researcher SET password_hash = '$new_hash' WHERE email = '$email'";
		}else{
			$sql = "UPDATE caregiver SET password_hash = '$new_hash' WHERE email = '$email'";
		}
		
		// If MySQL query is sucessfull send mail		
		if (mysqli_query($link, $sql)) {   					
			if ($mail->send()) {
				$sucess_message = "An email has been sent to you with a new password";
            } else {
            	$fail_message = "Something went wrong! Please contact us on trackzheimers@gemail.com";
        	}
		} else {  
			$fail_message = "Something went wrong! Please contact us on trackzheimers@gemail.com";
		}		
	}
} 
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
        
        <form action="forgotPassword.php" method="post">
          
            <div class="container">
            <h3>Forgot your password?</h3>
            <p>Enter your email and a new password will be sent to you</p>
            <?php
				if(isset($sucess_message)){ 
					echo '<font color="green"><b>'.$sucess_message.'</font></b>';
				}elseif(isset($fail_message)){
					echo '<font color="red"><b>'.$fail_message.'</font></b>';
				}
			?>
			
            	<div class="error"><?php echo $error['general']; ?></div><br>
            	
            	<label for="email"><b>Email adress</b><label>
            	<input type="text" name="email" value="<?php echo htmlspecialchars($email); ?>">
            	<div class="error"><?php echo $error['email']; ?></div>
            	
            	<input type="submit" name="submit" value="Reset password">
        
         </form> 
      

    </body>
</html>

<?php
include dirname(__DIR__).'/general/closeDB.php';
?>