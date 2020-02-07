<!DOCTYPE html>
<html>
<body>

<?php 

// Starting the session
session_start();

// Connection to DB
include dirname(__DIR__).'\php\openDB.php';

// Registration form
	
// Getting the inserted values and checking for SQL injections
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
$psw = mysqli_real_escape_string($link,$_POST['psw']); 
$psw_repeat = mysqli_real_escape_string($link,$_POST['psw_repeat']); // Used to check if the passwords match later on
	
// Ensure that all requiered fields have been filled out
if (empty($f_name)) {array_push($errors, "First name is required");}
if (empty($l_name)) {array_push($errors, "Last name is required");}
if (empty($phone)) {array_push($errors, "Phone number is required");}
if (empty($street)) {array_push($errors, "Street is required");}
if (empty($street_no)) {array_push($errors, "Street number is required");}
if (empty($city)) {array_push($errors, "City is required");}
if (empty($country)) {array_push($errors, "Country is required");}
if (empty($email)) {array_push($errors, "Email is required");}
if (empty($psw)) {array_push($errors, "Password is required");}
	
// Check if the passwords match 
if ($psw != $psw_repeat) {
	array_push($link, "The passwords do not match, please try again!");
}
//Create a hashed password to store in the database
$password_hash = password_hash($psw, PASSWORD_DEFAULT);

// When form is error free register user
if (count($errors) == 0) {
	$sql = "insert into doctor (first_name, middle_name, last_name, email, password_hash, street, street_no, city, country, zip, phone) 
	values ('$f_name', '$m_name', '$l_name', '$email', '$password_hash', '$street', '$street_no', '$city', '$country', '$zip', '$phone')";  
		
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
