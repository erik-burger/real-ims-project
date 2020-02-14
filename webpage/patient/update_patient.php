
<?php 
session_start();
$id = $_SESSION["id"];
include dirname(__DIR__).'/general/openDB.php';

$f_name = $_POST["f_name"]; 
$f_name = mysqli_real_escape_string($f_name);
$m_name = $_POST["m_name"];  
$m_name = mysqli_real_escape_string($m_name);
$l_name = $_POST["l_name"];
$l_name = mysqli_real_escape_string($l_name);
$phone_no = $_POST["phone_no"]; 
$phone_no = mysqli_real_escape_string($phone_no);
$street = $_POST["street"];
$street = mysqli_real_escape_string($street);
$street_no = $_POST["street_no"];
$street_no= mysqli_real_escape_string($street_no);
$city = $_POST["city"];
$city = mysqli_real_escape_string($city);
$country = $_POST["country"];
$country = mysqli_real_escape_string($country);
$zip = $_POST["zip"];
$zip = mysqli_real_escape_string($zip);
$email = $_POST["email"];
$email = mysqli_real_escape_string($email);
$psw = $_POST["psw"];

//get the hashed password
$psw_result = mysqli_query($link, "select password_hash from patient where patient_id = $id");
$psw_row = mysqli_fetch_row($psw_result);
$password_hash = $psw_row[0];

if(password_verify($psw, $password_hash)){

    $sql = "update patient set first_name = '$f_name', 
        middle_name = '$m_name', 
        last_name = '$l_name', 
        email = '$email',  
        street = '$street', 
        street_no = '$street_no', 
        city = '$city', 
        country = '$country', 
        zip = '$zip', 
        phone = '$phone_no'
        where patient_id = '$id'";  

    if (mysqli_query($link, $sql)) {
        echo "New record created successfully";
        include dirname(__DIR__).'/general/closeDB.php';
        header("location: patientprofile.php");

    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($link);
    }
}else{
    echo "Password incorrect.";
    include dirname(__DIR__).'/general/closeDB.php';
    header("location: change_info_patient.php");
}

include dirname(__DIR__).'/general/closeDB.php';
?> 