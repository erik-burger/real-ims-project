<?php 
include dirname(__DIR__).'/php/openDB.php';;
$f_name = $_POST["f_name"]; 
$m_name = $_POST["m_name"];  
$l_name = $_POST["l_name"]; 
$ssn = $_POST["ssn"];
$phone = $_POST["phone_no"];
$street = $_POST["street"];
$street_no = $_POST["street_no"];
$city = $_POST["city"];
$country = $_POST["country"];
$zip = $_POST["zip"];
$state_county = $_POST["state_county"];
$date_of_birth = $_POST["date_of_birth"];
$gender = $_POST['gender']; 
$education = $_POST["education"]; 
$diagnosis_date = $_POST["diagnosis_date"];
$email = $_POST["email"];
$psw = $_POST["psw"];
$diagnosis_desc = $_POST["diagnosis_desc"];

//create a hashed password to store in the database
$password_hash = password_hash($psw, PASSWORD_DEFAULT);

$sql = "insert into patient (
    first_name, middle_name, last_name, email, password_hash, 
    street, street_no, city, country, zip, 
    date_of_birth, gender, education, diagnosis_date,
    diagnosis_description, SSN, phone, state) 
values ('$f_name', '$m_name', '$l_name', '$email', '$password_hash', '$street', 
    '$street_no', '$city', '$country', '$zip', '$date_of_birth', 
    '$gender', $education, '$diagnosis_date', '$diagnosis_desc', '$ssn', '$phone', '$state_county')";  

if (mysqli_query($link, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($link);
}

include dirname(__DIR__).'/php/closeDB.php';;
?> 