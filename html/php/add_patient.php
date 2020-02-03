<?php 
include "../html/php/openDB.php";
$f_name = $_POST["f_name"]; 
$m_name = $_POST["m_name"];  
$l_name = $_POST["l_name"]; 
$street = $_POST["street"];
$street_no = $_POST["street_no"];
$city = $_POST["city"];
$country = $_POST["country"];
$zip = $_POST["zip"];
$date_of_birth = $_POST["date_of_birth"];
$gender = $_POST['gender']; 
$education = $_POST["education"]; 
$diagnosis_date = $_POST["diagnosis_date"];
$email = $_POST["email"];
$psw = $_POST["psw"];
$diagnosis_desc = $_POST["diagnosis_desc"];

$sql = "insert into patient (
    first_name, middle_name, last_name, email, password_hash, 
    street, street_no, city, country, zip, 
    date_of_birth, gender, education, diagnosis_date,
    diagnosis_description) 
values ('$f_name', '$m_name', '$l_name', '$email', '$psw', '$street', 
    '$street_no', '$city', '$country', '$zip', '$date_of_birth', 
    '$gender', $education, '$diagnosis_date', '$diagnosis_desc')";  

if (mysqli_query($link, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($link);
}

include "../html/php/closeDB.php";
?> 