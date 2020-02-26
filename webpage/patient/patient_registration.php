<?php
// ------ ADD TO THIS FILE:
	// RULES FOR THE PASSWORD
	//JAVASCRIPT INJECTIONS


//Connect to database
//include('../general/openDB.php');
include dirname(__DIR__).'/general/openDB.php';

use PHPMailer\PHPMailer\PHPMailer;

// Introduce variables 

$usertype = "P";
$verified = 0;

$f_name = $m_name = $l_name = $ssn = $date_of_birth = $phone = $street = $street_no = $city = $bedroom_floor = '';
$state_county = $country = $zip = $diagnosis_date = $diagnosis_desc = $education = $email = $psw = $verification_hash ='';

// Introduce variables for error handling
$errors = array('f_name' => '', 'm_name' => '', 'l_name' => '', 'ssn' => '', 'date_of_birth' => '', 'phone' => '',
'street' => '', 'gender' => '', 'street_no' => '', 'city' => '', 'state_county' => '', 'country' => '', 'zip' => '',
'diagnosis_date' => '', 'education' => '', 'email' => '', 'psw' => '', 'bedroom_floor' => '');

// Validation of the form 
if(isset($_POST["submit"])){
	
	if (empty($_POST["f_name"])){
		$errors['f_name'] = "First name is required";
	}else{
		$f_name = $link->real_escape_string($_POST["f_name"]);
		$f_name = htmlspecialchars($f_name);
		if(!preg_match('/^[a-z A-Z -]+$/', $f_name)){
			$errors['f_name'] = "Name can be letters and dashes only";
		}
	}
	
	if(!empty($_POST["m_name"])){	
		if(!preg_match('/[a-z A-Z - \s]+/', $_POST["m_name"])){
			$errors['m_name'] = "Middle can must be letters, spacing and dashes only";
		}else{
			$m_name = $link->real_escape_string($_POST["m_name"]);
			$m_name = htmlspecialchars($m_name);
		}
	}

	if (empty($_POST["l_name"])){
		$errors['l_name'] = "Last name is required";
	}else{
		$l_name = $link->real_escape_string($_POST["l_name"]);
		$l_name = htmlspecialchars($l_name);
		if(!preg_match('/^[a-z A-Z -]+$/', $l_name)){
			$errors['l_name']= "Last name can be letters and dashes only";
		}
	}
	
	if (empty($_POST["phone"])){
		$errors['phone'] = "Phone number is required";
	}else{
		$phone = $_POST["phone"];
	}
	
	if(empty($_POST["ssn"])){
		$errors['ssn'] = "Social security number is required";
	}else{
		$ssn = $link->real_escape_string($_POST["ssn"]);
		$ssn = htmlspecialchars($ssn);
		if(!preg_match('/([0-9]{6}+[-][0-9]{4})/', $ssn)){
			$errors['ssn'] = "Must be only numbers";
		}
	}
	
	if (empty($_POST["street"])){
		$errors['street'] = "Street is required";
	}else{
		$street = $link->real_escape_string($_POST["street"]);
		$street = htmlspecialchars($street);
		if(!preg_match('/^[a-z A-Z \s]+$/', $street)){
			$errors['street'] = "Street can be letters and spacing only";
		}
	}		
	
	if (empty($_POST["street_no"])){
		$errors['street_no'] = "Street number is required";
	}else{
		$street_no = $link->real_escape_string($_POST["street_no"]);
		$street_no = htmlspecialchars($street_no);
		if(!preg_match('/^[0-9]+[a-z A-Z]?/', $street_no)){
			$errors['street_no'] = "Must be number and can contain a letter";
		}
	}
	
	if (empty($_POST["city"])){
		$errors['city'] = "City is required";
	}else{
		$city = $link->real_escape_string($_POST["city"]);
		$city = htmlspecialchars($city);
		if(!preg_match('/^[a-z A-Z]+$/', $city)){
			$errors['city'] = "Must contain letters only";
		}
	}
	
	if (empty($_POST["state_county"])){
		$errors['state_county'] = "State or county is required";
	}else{
		$state_county = $link->real_escape_string($_POST["state_county"]);
		$state_county = htmlspecialchars($state_county);
		if (!preg_match('/^[a-z A-Z]+$/', $state_county)){
			$errors["state_county"] = "Must contain only letters";
		}
	}
	
	if (empty($_POST["country"])){
		$errors['country'] = "Country is required";
	}else{
		$country = $link->real_escape_string($_POST["country"]);
		$country = htmlspecialchars($country);
		if(!preg_match('/^[a-z A-Z]+$/', $country)){
			$errors['country'] = "Must contain letters only";
		}		
	}

	if (empty($_POST["zip"])){
		$errors['zip'] = "Zip is required";
	}else{
		$zip = $link->real_escape_string($_POST["zip"]);
		$zip = htmlspecialchars($zip);
		if(!preg_match('/^[0-9]+$/', $zip)){
			$errors['zip'] = "Must be numbers only";
		}
	}
	
	if (empty($_POST["date_of_birth"])){
		$errors["date_of_birth"] = "Date of birth is required";
	}else{
		$date_of_birth = $link->real_escape_string($_POST["date_of_birth"]);
		$date_of_birth = htmlspecialchars($date_of_birth);
		if (!preg_match('/[12][0-9]{3}-(0[1-9]|1[0-2])-(0[1-9]|[12][0-9]|3[01])/', $date_of_birth)){
			$errors["date_of_birth"] = "Must be numbers and have the following format YYYY-MM-DD";
		}
	}
	
	if (empty($_POST["diagnosis_date"])){
		$errors["diagnosis_date"] = "Diagnosis is required";
	}else{
		$diagnosis_date = $link->real_escape_string($_POST["diagnosis_date"]);
		$diagnosis_date = htmlspecialchars($diagnosis_date);
		if (!preg_match('/[12][0-9]{3}-(0[1-9]|1[0-2])-(0[1-9]|[12][0-9]|3[01])/', $diagnosis_date)){
			$errors["diagnosis_date"] = "Must be numbers and have the following format YYYY-MM-DD";
		}
	}
	
	if (empty($_POST['education'])){
		$errors['education'] = "Number of years of education is required";
	}else{
		$education = $link->real_escape_string($_POST['education']);
		$education = htmlspecialchars($education);
		if(!preg_match('/^[0-9]+$/', $education)){
			$errors['education'] = "Must be numbers";
		}
	}
	
	if (empty($_POST['bedroom_floor'])){
		$errors['bedroom_floor'] = "Bedroom floor ir required";
	}else{
		$bedroom_floor = $link->real_escape_string($_POST['bedroom_floor']);
		if(!preg_match('/^[0-9]+$/', $bedroom_floor)){
			$errors['bedroom_floor'] = "Must be numbers";
		}
	}
	
	if (empty($_POST["email"])){
		$errors['email'] = "Email is required";
	}else{
		$email = $link->real_escape_string($_POST["email"]);
		$email = filter_var($email, FILTER_SANITIZE_EMAIL);
		$email = htmlspecialchars($email);
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$errors['email'] = "Not a valid email";
		}else{			
			$sql_email = "SELECT * FROM users WHERE email = '$email'";
			$result = mysqli_query($link, $sql_email);
			if(mysqli_num_rows($result)>0){
				$errors['email'] = "Email adress already registered, please use another email";
			}
		}
	}

	if (empty($_POST['psw'])){
		$errors['psw']= 'Please enter a password';
	}elseif(empty($_POST['psw_repeat'])){
		$errors['psw'] = 'Please repeat your password';
	}elseif($_POST['psw']!= $_POST['psw_repeat']){
		$errors['psw'] = "Passwords do not match, pleas try again!";
	}else{
		$psw = $link->real_escape_string($_POST['psw']);

	}
	
	$verification_hash = md5(rand(0,10000));
	
	
	if(array_filter($errors)){
	 // Go back to the form
	} else {
	// Removing MySQL injections before adding the data to the database 
		$gender = $link->real_escape_string($_POST['gender']);
		$gender = htmlspecialchars($gender); 

		$diagnosis_desc = $link->real_escape_string($_POST['diagnosis_desc']);
		$diagnosis_desc = htmlspecialchars($diagnosis_desc);

	// Hashing password
		$password_hash = password_hash($psw, PASSWORD_DEFAULT);
	// Inserting into database
			
		$sql_patient = "INSERT INTO patient (first_name, middle_name, last_name, email, password_hash, 
		street, street_no, city, country, zip, date_of_birth, gender, education, diagnosis_date,
		diagnosis_description, SSN, phone, state, bedroom_floor, verification_hash, verified) 
		VALUES ('$f_name', '$m_name', '$l_name', '$email', '$password_hash', '$street', 
		'$street_no', '$city', '$country', '$zip', '$date_of_birth', 
		'$gender', '$education', '$diagnosis_date', '$diagnosis_desc', '$ssn', '$phone', '$state_county', '$bedroom_floor', '$verification_hash', '$verified')";  
		
		if (mysqli_query($link, $sql_patient)) {   
			
			$sql_user_id = "SELECT patient_id FROM patient WHERE email = $email";
			$user_id = mysqli_query($link, $sql_user_id);
			
			$sql_users = "INSERT INTO users (usertype, user_id, email, password_hash, verified, verification_hash) 
			VALUES ('$usertype', '$user_id', '$email', '$password_hash', '$verified', '$verification_hash')" ;
			
			if(mysqli_query($link, $sql_users)){ 					

        	require_once(dirname(__DIR__).'/PHPMailer/PHPMailer.php');
        	require_once(dirname(__DIR__).'/PHPMailer/SMTP.php');
        	require_once(dirname(__DIR__).'/PHPMailer/Exception.php');
						
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
        	$mail -> Body .= "<a href=\"http://localhost/real-ims-project/webpage/general/verify.php?email=$email&&verification_hash=$verification_hash&&usertype=$usertype\">Activate account<p></a><br>";
        	$mail -> Body .= "Are you not able to activate your account? Please contact uss at trackzheimers@gmail.com";
		
			if ($mail->send()) {
				$sucess_message = "Thanks for regestering!"."<br><br>"."Email has been sent! Please activate your account by clicking on the link that has been sent to you.";
            } else {
            	$fail_message = "Something went wrong! Please contact us on trackzheimers@gemail.com";
            	//echo "Something is wrong: <br><br>" . $mail->ErrorInfo;
        	}
        	}
		} else {  
			$fail_message = "Something went wrong! Please contact us on trackzheimers@gemail.com";
		 	//echo "Error: " . $sql . "<br>" . mysqli_error($link);
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
    <style>
    	*{
    	box-sizing: border-box;
		}
		
		body{
			background-color: ghostwhite;
		}
		
    	input[type = text], select , textarea{
    		width: 100%;
    		padding: 12px;
    		border: 1px solid #ccc;
    		border-radius; 4px;
    		resize: vertical;
    		font-size: 14px;
    	}
    	
    	input[type = number], select , textarea{
    		width: 100%;
    		padding: 12px;
    		border: 1px solid #ccc;
    		border-radius; 4px;
    		resize: vertical;
    		font-size: 14px;
    	}
    	
    	input[type = date], select, textarea{
    		width: 100%;
    		padding: 12px;
    		border: 1px solid #ccc;
    		border-radius; 4px;
    		resize: vertical;
    		font-size: 14px;
    	}
    	
    	label {
    		padding: 12px 12px 12px 0;
    		display: inline-block;
    	}
    	
    	input[type = submit]{
    		background-color: #c2d6d6;
  			color: black;
  			padding: 12px 20px;
 		 	border: none;
  			border-radius: 4px;
  			cursor: pointer;
  			float: right;
  		}
  		
  		input[type=submit]:hover {
  			background-color: #b3cccc;
		}
		
		.container {
 		 	border-radius: 12px;
  			background-color: #f2f2f2;
  			padding: 20px;
  			width:70%;
  			margin-right: auto;
  			margin-left:auto;
		}
		
		.logo {
                display: inline-block;
                float: left; 
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
	<a href="../general/login.php">Login</a>
	<a href="../general/info.html">About</a>
	<a href="../general/contact.php">Contact</a>
	<div class="dropdown">
        <button class="dropbtn">Register
        <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
          <a href="patient_registration.php">Patient</a>
          <a href="../doctor/doctor_registration.php">Doctor</a>
          <a href="../researcher/researcher_registration.php">Researcher</a>
          <a href="../caregiver/caregiver_registration.php">Caregiver</a>
        </div>
    </div>       
</div>
</br>
</br>
<section class="container grey-text"> 

	<div class="container">
		
	<?php
		if(isset($sucess_message)){ 
			echo '<font color="green"><b>'.$sucess_message.'</font></b>';
		}elseif(isset($fail_message)){
			echo '<font color="red"><b>'.$fail_message.'</font></b>';
		}
	?>
	
	<h1 class="center">Register as a Patient</h1>
    <p>Please fill in this form to create an account as a patient</p>

	<form action = "patient_registration.php" method = "POST">
      
		<label for="f_name"><b>First name</b></label>
      	<input type="text" name="f_name" value = "<?php echo htmlspecialchars($f_name); ?>">
      	<div class="error"><?php echo $errors['f_name']; ?></div><br>
      	
      	<label for="m_name"><b>Middle name</b></label>
      	<input type="text" name="m_name" value = "<?php echo htmlspecialchars($m_name); ?>">
      	<div class = "error"><?php echo $errors['m_name']; ?></div><br>

      	<label for="l_name"><b>Last name</b></label>
      	<input type="text" name="l_name" value = "<?php echo htmlspecialchars($l_name); ?>">
      	<div class="error"><?php echo $errors['l_name']; ?></div><br>
      	
      	<label for="ssn"><b>Social security number</b></label>
      	<input type ="text" name ="ssn" value = "<?php echo htmlspecialchars($ssn); ?>">
      	<div class="error"><?php echo $errors['ssn']; ?> </div><br>
      	
      	<label for="date_of_birth"><b>Date of birth</b></label>
      	<input type ="text" name="date_of_birth" value="<?php echo htmlspecialchars($date_of_birth); ?>">
      	<div class="error"><?php echo $errors['date_of_birth']; ?></div><br>
      	
      <label for="gender"><b>Gender</b></label>
      <select name = "gender">
	      <option selected = "selected">Select gender</option>
          <option value = "male">Male</option>
          <option value = "female">Female</option>
          <option value = "custom">Custom</option>
      </select>
      <div class="error"><?php echo $errors["gender"]; ?></div><br>

      	<label for="phone"><b>Phone number</b></label>
      	<input type="number" name="phone" value = "<?php echo htmlspecialchars($phone); ?>">
      	<div class="error"><?php echo $errors['phone']; ?></div><br>

      	<label for="street"><b>Street</b></label>
      	<input type="text" name="street" value = "<?php echo htmlspecialchars($street); ?>">
      	<div class="error"><?php echo $errors['street']; ?></div><br>

      	<label for="street_no"><b>Street number</b></label>
      	<input type="text" name="street_no" value = "<?php echo htmlspecialchars($street_no); ?>">
      	<div class="error"><?php echo $errors['street_no']; ?></div><br>

  	    <label for="city"><b>City</b></label>
   	    <input type="text"  name="city" value = "<?php echo htmlspecialchars($city); ?>">
      	<div class="error"><?php echo $errors['city']; ?></div><br>
      	
      	<label for="state_county"><b>State/County</b></label>
      	<input type="text" name="state_county" value = "<?php echo htmlspecialchars($state_county); ?>">
      	<div class="error"><?php echo $errors['state_county']; ?></div><br>

      	<label for="country"><b>Country</b></label>
      	<input type="text" name="country" value = "<?php echo htmlspecialchars($country); ?>">
      	<div class="error"><?php echo $errors['country']; ?></div><br>

      	<label for="zip"><b>Zip</b></label>
      	<input type="text" name="zip" value = "<?php echo htmlspecialchars($zip); ?>">
        <div class="error"><?php echo $errors['zip']; ?></div><br>
        
        <label for="education"><b>Number of education years</b></label>
        <input type="number" name="education" value="<?php echo htmlspecialchars($education); ?>">
        <div class="error"><?php echo $errors['education']; ?></div><br>
        
        <label for="bedroom_floor"><b>On what floor is your bedroom?</b></label>
        <input type="text" name="bedroom_floor" value="<?php echo htmlspecialchars($bedroom_floor); ?>">
        <div class="error"><?php echo $errors['bedroom_floor']; ?></div><br>

		<label for="diagnosis_date"><b>Diagnosis date</b></label>
		<input type="date" name="diagnosis_date" value="<?php echo htmlspecialchars($diagnosis_date); ?>">
		<div class="error"><?php echo $errors['diagnosis_date']; ?></div><br>
		
      	<label for="diagnosis_desc"><b>Diagnosis description (optional)</b></label>
      	<input type="text" name="diagnosis_desc" value="<?php echo htmlspecialchars($diagnosis_desc); ?>"><br>
      
      	<label for="email"><b>Email</b></label>
      	<input type="text" name="email" value = "<?php echo htmlspecialchars($email); ?>">
        <div class="error"><?php echo $errors['email']; ?></div><br>

      	<label for="psw"><b>Password</b></label>
      	<input type="password" name="psw" >
  
      	<label for="psw_repeat"><b>Repeat Password</b></label>
      	<input type="password" name="psw_repeat" >
      	<div class="error"><?php echo $errors['psw']; ?></div><br>
      
      <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
	  <input type="submit" name="submit" value="submit" style = "font-size: 14px">    
      <p>Already have an account? <a href="../general/login.php">Sign in</a>.</p>

	</form> 
</div>   	
</section>

</body>
</html>

<?php 
include dirname(__DIR__).'/general/closeDB.php';;	
?>