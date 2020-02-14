<?php 
include dirname(__DIR__).'/general/openDB.php';
$f_name = $_POST["f_name"]; 
$f_name = mysqli_real_escape_string($f_name);
$m_name = $_POST["m_name"];  
$m_name = mysqli_real_escape_string($m_name);
$l_name = $_POST["l_name"]; 
$l_name = mysqli_real_escape_string($l_name);
$ssn = $_POST["ssn"];
$ssn = mysqli_real_escape_string($ssn);
$phone = $_POST["phone_no"];
$phone = mysqli_real_escape_string($phone);
$street = $_POST["street"];
$street = mysqli_real_escape_string($street);
$street_no = $_POST["street_no"];
$street_no = mysqli_real_escape_string($street_no);
$city = $_POST["city"];
$city = mysqli_real_escape_string($city);
$country = $_POST["country"];
$country = mysqli_real_escape_string($country);
$zip = $_POST["zip"];
$zip = mysqli_real_escape_string($zip);
$state_county = $_POST["state_county"];
$state_county = mysqli_real_escape_string($state_county);
$date_of_birth = $_POST["date_of_birth"];
$date_of_birth = mysqli_real_escape_string($date_of_birth);
$gender = $_POST['gender']; 
$gender = mysqli_real_escape_string($gender);
$education = $_POST["education"]; 
$education = mysqli_real_escape_string($education);
$diagnosis_date = $_POST["diagnosis_date"];
$diagnosis_date = mysqli_real_escape_string($diagnosis_date);
$email = $_POST["email"];
$email = mysqli_real_escape_string($email);
//Doesnt check password because i'm scared to do it
$psw = $_POST["psw"];
$diagnosis_desc = $_POST["diagnosis_desc"];
$diagnosis_desc = mysqli_real_escape_string($diagnosis_desc);

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

include dirname(__DIR__).'/general/openDB.php';
?> 