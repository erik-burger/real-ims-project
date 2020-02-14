<?php
// -------- ADD TO THIS FILE -----------
	// RULES FOR THE PASSWORD
	// SEND EMAIL WHEN REGESTERING
	//JAVASCRIPT INJECTIONS
	

//Connect to database
include('../general/openDB.php');

$f_name = $m_name = $l_name = $phone = $street = $street_no = $city = $country = $zip = $email = $psw = $verification_hash = '';
$errors = array('f_name' =>'', 'm_name' => '', 'l_name'=>'', 'phone'=>'', 'street' => '', 'street_no' => '', 
'city' => '', 'country' => '', 'zip' => '', 'email' => '', 'psw' => '');

if(isset($_POST["submit"])){
	
	if (empty($_POST["f_name"])){
		$errors['f_name'] = "First name is required";
	}else{
		$f_name = $link->real_escape_string($_POST["f_name"]);		
		if(!preg_match('/^[a-z A-Z -]+$/', $f_name)){
			$errors['f_name'] = "Name can be letters and dashes only";
		}
	}
	
	if(!empty($_POST["m_name"])){	
		if(!preg_match('/[a-z A-Z - \s]+/', $_POST["m_name"])){
			$errors['m_name'] = "Middle can must be letters, spacing and dashes only";
		}else{
			$m_name = $link->real_escape_string($_POST["m_name"]);
		}
	}

	if (empty($_POST["l_name"])){
		$errors['l_name'] = "Last name is required";
	}else{
		$l_name = $link->real_escape_string($_POST["l_name"]);
		if(!preg_match('/^[a-z A-Z -]+$/', $l_name)){
			$errors['l_name']= "Last name can be letters and dashes only";
		}
	}
	
	if (empty($_POST["phone"])){
		$errors['phone'] = "Phone number is required";
	}else{
		$phone = $_POST["phone"];
	}

	if (empty($_POST["street"])){
		$errors['street'] = "Street is required";
	}else{
		$street = $link->real_escape_string($_POST["street"]);
		if(!preg_match('/^[a-z A-Z]+$/', $street)){
			$errors['street'] = "Street can be letters only";
		}
	}		

	if (empty($_POST["street_no"])){
		$errors['street_no'] = "Street number is required";
	}else{
		$street_no = $link->real_escape_string($_POST["street_no"]);
		if(!preg_match('/^[0-9]+[a-z A-Z]?/', $street_no)){
			$errors['street_no'] = "Must be number and can contain a letter";
		}
	}

	if (empty($_POST["city"])){
		$errors['city'] = "City is required";
	}else{
		$city = $link->real_escape_string($_POST["city"]);
		if(!preg_match('/^[a-z A-Z]+$/', $city)){
			$errors['city'] = "Must contain letters only";
		}
	}

	if (empty($_POST["country"])){
		$errors['country'] = "Country is required";
	}else{
		$country = $link->real_escape_string($_POST["country"]);
		if(!preg_match('/^[a-z A-Z]+$/', $country)){
			$errors['country'] = "Must contain letters only";
		}		
	}

	if (empty($_POST["zip"])){
		$errors['zip'] = "Zip is required";
	}else{
		$zip = $link->real_escape_string($_POST["zip"]);
		if(!preg_match('/^[0-9]+$/', $zip)){
			$errors['zip'] = "Must be numbers only";
		}
	}

	if (empty($_POST["email"])){
		$errors['email'] = "Email is required";
	}else{
		$email = $link->real_escape_string($_POST["email"]);
		$email = filter_var($email, FILTER_SANITIZE_EMAIL);
		
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$errors['email'] = "Not a valid email";
		
		}else{			
			$sql_email = "SELECT * FROM doctor WHERE email = '$email'";
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
	// Hashing password
		$psw = password_hash($psw, PASSWORD_DEFAULT);
	
	// Inserting into database
			
		$sql = "INSERT INTO researcher (first_name, middle_name, last_name, email, password_hash, street, street_no, city, country, zip, phone, verification_hash) 
		VALUES ('$f_name', '$m_name', '$l_name', '$email', '$psw', '$street', '$street_no', '$city', '$country', '$zip', '$phone', '$verification_hash')";  
		
		if (mysqli_query($link, $sql)) {
   			echo "New record created successfully";
   			// header('Location: doctorstart.php');
		} else {  
		 	echo "Error: " . $sql . "<br>" . mysqli_error($link);
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
  		
    	.error {
    		color: #FF0000;
    		font-size: 14px;
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
          <a href="../doctor/doctor_registration.php">Doctor</a>
          <a href="researcher_registration.php">Researcher</a>
          <a href="../caregiver/caregiver_registration.php">Caregiver</a>
        </div>
      </div>       
</div>

<img src="logo.jpg" width = "250" height = "133" alt = "Trackzheimers logo">

<section class="container grey-text"> 

	<div class="container">
	<h1 class="center">Register as a Researcher</h1>
    <p>Please fill in this form to create an account as a researcher</p>

	<form action = "researcher_registration.php" method = "POST">
		
		<label for="f_name"><b>First name</b></label>
      	<input type="text" name="f_name" value = "<?php echo htmlspecialchars($f_name); ?>">
      	<div class="error"><?php echo $errors['f_name']; ?></div><br>
      	
      	<label for="m_name"><b>Middle name</b></label>
      	<input type="text" name="m_name" value = "<?php echo htmlspecialchars($m_name); ?>">
      	<div class = "error"><?php echo $errors['m_name']; ?></div><br>

      	<label for="l_name"><b>Last name</b></label>
      	<input type="text" name="l_name" value = "<?php echo htmlspecialchars($l_name); ?>">
      	<div class="error"><?php echo $errors['l_name']; ?></div><br>

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

      	<label for="country"><b>Country</b></label>
      	<input type="text" name="country" value = "<?php echo htmlspecialchars($country); ?>">
      	<div class="error"><?php echo $errors['country']; ?></div><br>

      	<label for="zip"><b>Zip</b></label>
      	<input type="text" name="zip" value = "<?php echo htmlspecialchars($zip); ?>">
        <div class="error"><?php echo $errors['zip']; ?></div><br>

      	<label for="email"><b>Your Email</b></label>
      	<input type="text" name="email" value = "<?php echo htmlspecialchars($email); ?>">
        <div class="error"><?php echo $errors['email']; ?></div><br>

      	<label for="psw"><b>Password</b></label>
      	<input type="password" name="psw" >
  
      	<label for="psw_repeat"><b>Repeat Password</b></label>
      	<input type="password" name="psw_repeat" >
      	<div class="error"><?php echo $errors['psw']; ?></div><br>

      	<p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
		<input type="submit" name="submit" value="submit" style = "font-size: 14px">    
      	<p>Already have an account? <a href="#">Sign in</a>.</p>
   </form>
   
</body>
</html>

<?php 
include dirname(__DIR__).'general/closeDB.php';;	
?>