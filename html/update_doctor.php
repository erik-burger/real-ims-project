
<?php 
session_start();
$id = $_SESSION["id"];
include dirname(__DIR__).'/html/php/openDB.php';

$f_name = $_POST["f_name"]; 
$m_name = $_POST["m_name"];  
$l_name = $_POST["l_name"];
$phone_no = $_POST["phone_no"]; 
$street = $_POST["street"];
$street_no = $_POST["street_no"];
$city = $_POST["city"];
$country = $_POST["country"];
$zip = $_POST["zip"];
$email = $_POST["email"];
$psw = $_POST["psw"];

$sql = "update doctor set first_name = '$f_name', 
    middle_name = '$m_name', 
    last_name = '$l_name', 
    email = '$email', 
    password_hash = '$psw', 
    street = '$street', 
    street_no = '$street_no', 
    city = '$city', 
    country = '$country', 
    zip = '$zip', 
    phone = '$phone_no'
    where doctor_id = '$id'";  

if (mysqli_query($link, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($link);
}

include dirname(__DIR__).'/html/php/closeDB.php';
?> 