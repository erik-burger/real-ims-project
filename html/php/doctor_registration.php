<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="top_menu_style.css">
    <style>
    	.error {color: #FF0000;}
    </style>
  </head>

<body>

<div class="navbar">
    <a href="login.html">Login</a>
    <a href="info.html">About</a>  
    <div class="dropdown">
        <button class="dropbtn">Register
          <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
          <a href="registration.html">Patient</a>
          <a href="doctor_registration.html">Doctor</a>
        </div>
      </div>       
</div>

<img src="logo.jpg" width = "250" height = "133" alt = "Trackzheimers logo">

<?php
	// Connection to DB
	include dirname(__DIR__).'\php\openDB.php';

	// Data validation
	$f_nameErr = $l_nameErr = $phoneErr = $streetErr = $street_noErr = $cityErr = $countryErr = $zipErr = $emailErr = $pswErr = "";
	$f_name = $m_name = $l_name = $phone = $street = $street_no = $city = $country = $zip = $email = $psw = $psw_repeat ="";
	
	// Function to test for PHP and HTML indjections
	function test_input($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
	}
	
	if (empty($_POST["f_name"])){
		$f_nameErr = "First name is required";
	}else{
		$f_name = test_input($_POST["f_name"]);
		$f_name = mysqli_real_escape_string($link,$_POST['f_name']); 
	}
	
	$m_name = test_input($_POST["m_name"]);
	$m_name = mysqli_real_escape_string($link,$_POST['m_name']); 

	if (empty($_POST["l_name"])){
		$l_nameErr = "Last name is required";
	}else{
		$l_name = test_input($_POST["l_name"]);
		$l_name = mysqli_real_escape_string($link,$_POST['l_name']); 
	}
	
	if (empty($_POST["phone"])){
		$phoneErr = "Phone number is required";
	}else{
		$phone = test_input($_POST["phone"]);
		$phone = mysqli_real_escape_string($link,$_POST['phone']); 
	}
	
	if (empty($_POST["street"])){
		$streetErr = "Street is required";
	}else{
		$street = test_input($_POST["street"]);
		$street = mysqli_real_escape_string($link,$_POST['street']); 
	}		
	
	if (empty($_POST["street_no"])){
		$street_noErr = "Street number is required";
	}else{
		$street_no = test_input($_POST["street_no"]);
		$street_no = mysqli_real_escape_string($link,$_POST['street_no']); 
	}
	
	if (empty($_POST["city"])){
		$cityErr = "City is required";
	}else{
		$city = test_input($_POST["city"]);
		$city = mysqli_real_escape_string($link,$_POST['city']); 
	}
	
	if (empty($_POST["country"])){
		$countryErr = "Country is required";
	}else{
		$country = test_input($_POST["country"]);
		$country = mysqli_real_escape_string($link,$_POST['country']); 
	}

	if (empty($_POST["zip"])){
		$zipErr = "Zip is required";
	}else{
		$zip = test_input($_POST["zip"]);
		$zip = mysqli_real_escape_string($link,$_POST['zip']); 
	}
	
	if (empty($_POST["email"])){
		$emailErr = "Email is required";
	}else{
		$email = test_input($_POST["email"]);
		$email = mysqli_real_escape_string($link,$_POST['email']); 
	}
	
	if ($psw != $psw_repeat){
		$pswErr = "Passwords do not match, pleas try again!";
	}

?>

<h1>Register as a Doctor</h1>

<form metod = "POST" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 

      <h3>Register</h3>
      <p>Please fill in this form to create an account.</p>
            
     	<label for="f_name"><b>First name</b></label>
      	<input type="text" placeholder="Enter first name" name="f_name" value = "<?php echo $f_name; ?>">
      	<span class="error"> <?php echo $f_nameErr; ?> </span><br>
		
      	<label for="m_name"><b>Middle name</b></label>
      	<input type="text" placeholder="Enter middle name" name="m_name"><br>

      	<label for="l_name"><b>Last name</b></label>
      	<input type="text" placeholder="Enter last name" name="l_name" value = "<?php echo $l_name; ?>">
      	<span class="error"> <?php echo $l_nameErr; ?> </span><br><br>

      	<label for="phone"><b>Phone number</b></label>
      	<input type="number" placeholder="Enter Phone number" name="phone" value ="<?php echo $phone;?>">
      	<span class="error"> <?php echo $phoneErr; ?> </span><br><br>

      	<label for="street"><b>Street</b></label>
      	<input type="text" placeholder="Enter Street" name="street" value = "<?php echo $street; ?>">
       	<span class="error"> <?php echo $streetErr; ?> </span><br><br>

      	<label for="street_no"><b>Street number</b></label>
      	<input type="text" placeholder="Enter Street number" name="street_no" value ="<?php echo $street_no; ?>">
      	<span class="error"> <?php echo $street_noErr; ?> </span><br><br>

  	    <label for="city"><b>City</b></label>
   	    <input type="text" placeholder="Enter city" name="city" value = "<?php echo $city; ?>">
      	<span class="error"> <?php echo $cityErr; ?> </span><br><br>

      	<label for="country"><b>Country</b></label>
      	<input type="text" placeholder="Enter country" name="country" value = "<?php echo $country; ?>">
      	<span class="error"> <?php echo $countryErr; ?> </span><br><br>

      	<label for="zip"><b>Zip</b></label>
      	<input type="text" placeholder="Enter Zip" name="zip" value = "<?php echo $zip;?>">
      	<span class="error"> <?php echo $zipErr; ?> </span><br><br>
  
      	<label for="email"><b>Email</b></label>
      	<input type="text" placeholder="Enter Email" name="email" value = "<?php echo $email; ?>">
      	<span class="error"> <?php echo $emailErr; ?> </span><br><br>
  
      	<label for="psw"><b>Password</b></label>
      	<input type="password" placeholder="Enter Password" name="psw" >
  
      	<label for="psw_repeat"><b>Repeat Password</b></label>
      	<input type="password" placeholder="Repeat Password" name="psw_repeat" >
            
      	<p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
      	<button type="submit">Register</button>  
    
      	<p>Already have an account? <a href="#">Sign in</a>.</p>    

   
</form> 

<?php
	if (empty($f_nameErr) && empty($l_nameErr) && empty($phoneErr) && empty($streetErr) && empty($street_noErr)
	&& empty($cityErr) && empty($countryErr) && empty($zipErr) && empty($emailErr) && empty($pswErr) && isset($f_name)
	&& isset($l_name) && isset($phone) && isset($street) && isset($street_no) && isset($city) && isset($country) && isset($zip)
	&& isset($email) && isset($psw)){
	
		$sql = "insert into doctor (first_name, middle_name, last_name, email, password_hash, street, street_no, city, country, zip, phone) 
		values ('$f_name', '$m_name', '$l_name', '$email', '$psw', '$street', '$street_no', '$city', '$country', '$zip', '$phone')";  
		
		if (mysqli_query($link, $sql)) {
   			echo "New record created successfully";
		} else {  
		 	echo "Error: " . $sql . "<br>" . mysqli_error($link);
		}
	}
	
include dirname(__DIR__).'\php\closeDB.php';
?>
</body>
</html>
