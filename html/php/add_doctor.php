<?php 
include "/wamp/www/real-ims-project/html/php/closeDB.php";
$f_name = $_POST["f_name"]; 
$m_name = $_POST["m_name"];  
$l_name = $_POST["l_name"];
<<<<<<< HEAD
$phone = $_POST["phone"]; 
=======
$phone_no = $_POST["phone"]; 
>>>>>>> d3edc4450354928f9f42ae2524a4567d4dc4789a
$street = $_POST["street"];
$street_no = $_POST["street_no"];
$city = $_POST["city"];
$country = $_POST["country"];
$zip = $_POST["zip"];
$email = $_POST["email"];
$psw = $_POST["psw"];

$sql = "insert into ims.doctor (
    first_name, middle_name, last_name, email, password_hash, 
    street, street_no, city, country, zip, phone) 
<<<<<<< HEAD
values ('$f_name', '$m_name', '$l_name', '$email', '$psw', '$street', 
    '$street_no', '$city', '$country', '$zip', '$phone')";  
=======
    values ('$f_name', '$m_name', '$l_name', '$email', '$psw', '$street', 
    '$street_no', '$city', '$country', '$zip', '$phone_no')";  
>>>>>>> d3edc4450354928f9f42ae2524a4567d4dc4789a

if (mysqli_query($link, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($link);
}

include "../real-ims-project/html/php/closeDB.php";
?> 