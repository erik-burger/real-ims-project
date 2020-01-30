<?php 
include "/wamp/www/real-ims-project/php/openDB.php";
$f_name = $_POST["f_name"]; 
$m_name = $_POST["m_name"]  
$l_name = $_POST["l_name"]; 
$street = $_POST["street"]
$street_no = $_POST["street_no"]
$city = $_POST["city"]
$country = $_POST["country"]
$zip = $_POST["zip"]
$date_of_birth = $_POST["date_of_birth"]
$gender = $_POST["gender"]
$education = $_POST["education"]
$diagnosis_desc = $_POST["diagnosis_desc"]
$email = $_POST["email"]
$psw = $_POST["psw"]
$diagnosis_desc = $_POST["diagnosis_desc"]




$sql = "insert into genre (genre_title) values ('$g_title')";  

if (mysqli_query($link, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($link);
}

include "/wamp/www/real-ims-project/php/closeDB.php";
?> 