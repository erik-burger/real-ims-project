<?php
// -------- ADD TO THIS FILE -----
	// RULES FOR THE PASSWORD
	// JAVASCRIPT INJECTIONS	

//Connect to database
include dirname(__DIR__).'/general/openDB.php';


use PHPMailer\PHPMailer\PHPMailer;


$f_name = $m_name = $l_name = $phone = $street = $street_no = $city = $country = $zip = $email = $psw = $verification_hash = '';

if(isset($_POST["submit"])){
			
	if (!empty($_POST["f_name"])){
		$f_name = $link->real_escape_string($_POST["f_name"]);	
		$f_name = htmlspecialchars($f_name); 	
	}
	
	if(!empty($_POST["m_name"])){	
		$m_name = $link->real_escape_string($_POST["m_name"]);
		$m_name = htmlspecialchars($m_name); 
	}

	if (!empty($_POST["l_name"])){
		$l_name = $link->real_escape_string($_POST["l_name"]);
		$l_name = htmlspecialchars($l_name); 
	}
		
	if (!empty($_POST["phone"])){
		$phone = $_POST["phone"];
	}

	if (!empty($_POST["street"])){
		$street = $link->real_escape_string($_POST["street"]);
		$street = htmlspecialchars($street); 
	}		

	if (!empty($_POST["street_no"])){
		$street_no = $link->real_escape_string($_POST["street_no"]);
		$street_no = htmlspecialchars($street_no); 
	}

	if (!empty($_POST["city"])){
		$city = $link->real_escape_string($_POST["city"]);
		$city = htmlspecialchars($city); 
	}

	if (!empty($_POST["country"])){
		$country = $link->real_escape_string($_POST["country"]);
		$country = htmlspecialchars($country); 	
	}

	if (!empty($_POST["zip"])){
		$zip = $link->real_escape_string($_POST["zip"]);
		$zip = htmlspecialchars($zip); 
	}

	if (!empty($_POST["email"])){
		$email = $link->real_escape_string($_POST["email"]);
		$email = filter_var($email, FILTER_SANITIZE_EMAIL);
		$email = htmlspecialchars($email); 
		
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			// Error message?		
		}else{			
			$sql_email = "SELECT * FROM users WHERE email = '$email'";
			$result = mysqli_query($link, $sql_email);
			
			if(mysqli_num_rows($result)>0){
				$errors['email'] = "Email adress already registered, please use another email";
			}
		}
	}

	if (!empty($_POST['psw'])){
		if(!empty($_POST['psw_repeat'])){
			$psw = $link->real_escape_string($_POST['psw']);
		}
	}
		
	$verification_hash = md5(rand(0,10000));
	
	if(array_filter($errors)){
	 // Go back to the form
	} else {	
				
	// Hashing password
		$psw = password_hash($psw, PASSWORD_DEFAULT);
	
	// Inserting into database
			
		$sql = "INSERT INTO doctor (first_name, middle_name, last_name, email, password_hash, street, street_no, city, country, zip, phone, verification_hash) 
		VALUES ('$f_name', '$m_name', '$l_name', '$email', '$psw', '$street', '$street_no', '$city', '$country', '$zip', '$phone', '$verification_hash')";  
		
		if (mysqli_query($link, $sql)) {   					

        	require_once("../../PHPMailer/PHPMailer.php");
        	require_once("../../PHPMailer/SMTP.php");
        	require_once("../../PHPMailer/Exception.php");
						
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
        	$mail->Subject = "Verify account";
        	$mail->Body = "Thanks for registering an account at trackzheimers!";
        	$mail -> Body .= "Plase activate your account by pressing on the link below: <br>";
        	$mail -> Body .= "<a href=\"http://localhost:8888/real-ims-project/webpage/patient/verify_patient.php?email=$email&&verification_hash=$verification_hash\">Activate account<p></a><br>";
        	$mail -> Body .= "Are you not able to activate your account? Please contact uss at trackzheimers@gmail.com";
		
			if ($mail->send()) {
				$sucess_message = "Thanks for regestering!"."<br><br>"."Email has been sent! Please activate your account by clicking on the link that has been sent to you.";
            } else {
            	$fail_message = "Something went wrong! Please contact us on trackzheimers@gemail.com";
            	//echo "Something is wrong: <br><br>" . $mail->ErrorInfo;
        	}
		} else {  
			$fail_message = "Something went wrong! Please contact us on trackzheimers@gemail.com";
		 	//echo "Error: " . $sql . "<br>" . mysqli_error($link);
		}
			
	}
}
?> 

<?php 
include dirname(__DIR__).'/general/closeDB.php';
	
?>