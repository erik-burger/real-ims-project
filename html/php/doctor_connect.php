<!DOCTYPE html>
<html>
<body>
	<head>
    <style>
    	.error {color: #FF0000;}
    </style>
    </head>
    
<?php
	// Connection to DB
	include dirname(__DIR__).'\php\openDB.php';

	// Data validation
	$f_nameErr = $l_nameErr = $phoneErr = $streetErr = $street_noErr = $cityErr = $countryErr = $zipErr = $emailErr = $pswErr = "";

	// Function to test for PHP and HTML indjections
	function test_input($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
	}
	
if(isset($_POST["submit"])){
	
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
}
	
include dirname(__DIR__).'\php\closeDB.php';
	
?>
</body>
</html>