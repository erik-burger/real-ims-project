<<<<<<< HEAD
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
    <a href="../general/login.html">Login</a>
    <a href="../general/info.html">About</a>  
    <div class="dropdown">
        <button class="dropbtn">Register
          <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
          <a href="../patient/registration.html">Patient</a>
          <a href="doctor_registration.html">Doctor</a>
        </div>
      </div>       
</div>

<img src="logo.jpg" width = "250" height = "133" alt = "Trackzheimers logo">

<?php
	// Connection to DB
	include dirname(__DIR__).'../general/openDB.php';
=======
<?php
//Connect to database
include dirname(__DIR__).'general/openDB.php';;
>>>>>>> b439291090638031cecebe73036f1d6f619d1e07

$f_name = $m_name = $l_name = $phone = $street = $street_no = $city = $country = $zip = $email = '';
$errors = array('f_name' =>'', 'l_name'=>'', 'phone'=>'', 'street' => '', 'street_no' => '', 
'city' => '', 'country' => '', 'zip' => '', 'email' => '', 'psw' => '');

if(isset($_POST["submit"])){
	
	if (empty($_POST["f_name"])){
		$errors['f_name'] = "First name is required";
	}else{
		$f_name = $_POST["f_name"];
	}
	
	$m_name = $_POST["m_name"];

	if (empty($_POST["l_name"])){
		$errors['l_name'] = "Last name is required";
	}else{
		$l_name = $_POST["l_name"];
	}
	
	if (empty($_POST["phone"])){
		$errors['phone'] = "Phone number is required";
	}else{
		$phone = $_POST["phone"];
	}
	
	if (empty($_POST["street"])){
		$errors['street'] = "Street is required";
	}else{
		$street = $_POST["street"];
	}		
	
	if (empty($_POST["street_no"])){
		$errors['street_no'] = "Street number is required";
	}else{
		$street_no = $_POST["street_no"];
	}
	
	if (empty($_POST["city"])){
		$errors['city'] = "City is required";
	}else{
		$city = $_POST["city"];
	}
	
	if (empty($_POST["country"])){
		$errors['country'] = "Country is required";
	}else{
		$country = $_POST["country"];
	}

	if (empty($_POST["zip"])){
		$errors['zip'] = "Zip is required";
	}else{
		$zip = $_POST["zip"];
	}
	
	if (empty($_POST["email"])){
		$errors['email'] = "Email is required";
	}else{
		$email = $_POST["email"];
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$errors['email'] = "Not a valid email";
		}
	}
	
	if (empty($_POST['psw'])){
		$errors['psw']= 'Please enter a password';
	}elseif(empty($_POST['psw_repeat'])){
		$errors['psw'] = 'Please repeat your password';
	}elseif($_POST['psw']!= $_POST['psw_repeat']){
		$errors['psw'] = "Passwords do not match, pleas try again!";
	}else{
		$psw = $_POST['psw'];
	}
	
	if(array_filter($errors)){
	 // Go back to the form
	} else {
	// Removing MySQL injections before adding the data to the database 
		$f_name = mysqli_real_escape_string($link,$_POST['f_name']);
		$m_name = mysqli_real_escape_string($link,$_POST['m_name']);
		$l_name = mysqli_real_escape_string($link,$_POST['l_name']);
		$phone = mysqli_real_escape_string($link,$_POST['phone']);
		$street = mysqli_real_escape_string($link,$_POST['street']);
		$street_no = mysqli_real_escape_string($link,$_POST['street_no']);
		$city = mysqli_real_escape_string($link,$_POST['city']);
		$country = mysqli_real_escape_string($link,$_POST['country']);
		$zip = mysqli_real_escape_string($link,$_POST['zip']);
		$email = mysqli_real_escape_string($link,$_POST['email']);

	// Hashing password
		$psw = password_hash($psw, PASSWORD_DEFAULT);
	
	// Inserting into database
			
		$sql = "INSERT INTO doctor (first_name, middle_name, last_name, email, password_hash, street, street_no, city, country, zip, phone) 
		VALUES ('$f_name', '$m_name', '$l_name', '$email', '$psw', '$street', '$street_no', '$city', '$country', '$zip', '$phone')";  
		
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
    <link rel="stylesheet" type="text/css" href="top_menu_style.css">
    <style>
    	.error {
    		color: #FF0000;
    	}
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

<h1>Register as a Doctor</h1>

<<<<<<< HEAD
<form metod = "POST" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 

      <h3>Register</h3>
      <p>Please fill in this form to create an account.</p>
            
     	<label for="f_name"><b>First name</b></label>
      	<input type="text" placeholder="Enter first name" name="f_name" value = "<?php echo $f_name; ?>">
      	<span class="error"> <?php echo $f_nameErr; ?> </span><br>
=======
<section class="container grey-text"> 
	<h4 class="center">Register</h4>
    <p>Please fill in this form to create an account.</p>

	<form action = "doctor_registration.php" method = "POST">
>>>>>>> b439291090638031cecebe73036f1d6f619d1e07
		
		<label for="f_name"><b>First name</b></label>
      	<input type="text" name="f_name" value = "<?php echo htmlspecialchars($f_name); ?>">
      	<div class="error"><?php echo $errors['f_name']; ?></div><br>
      	
      	<label for="m_name"><b>Middle name</b></label>
      	<input type="text" name="m_name" value = "<?php echo htmlspecialchars($m_name); ?>"><br>

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

      	<label for="email"><b>Email</b></label>
      	<input type="text" name="email" value = "<?php echo htmlspecialchars($email); ?>">
        <div class="error"><?php echo $errors['email']; ?></div><br>

      	<label for="psw"><b>Password</b></label>
      	<input type="password" name="psw" >
  
      	<label for="psw_repeat"><b>Repeat Password</b></label>
      	<input type="password" name="psw_repeat" >
      	<div class="error"><?php echo $errors['psw']; ?></div><br>

      	<p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
		<input type="submit" name="submit" value="submit">    
      	<p>Already have an account? <a href="#">Sign in</a>.</p>
      	
</section>

<<<<<<< HEAD
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
	
include dirname(__DIR__).'..\general\closeDB.php';
?>
=======
>>>>>>> b439291090638031cecebe73036f1d6f619d1e07
</body>
</html>

<?php 
include dirname(__DIR__).'general/openDB.php';;
	
?>