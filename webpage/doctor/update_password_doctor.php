
<?php 
session_start();
$id = $_SESSION["id"];
include dirname(__DIR__).'/general/openDB.php';

$oldpsw = mysqli_real_escape_string($link,$_POST['oldpsw']); 
$oldpsw = strip_tags($oldpsw); 

$newpsw = mysqli_real_escape_string($link,$_POST['newpsw']); 
$newpsw = strip_tags($newpsw);

$repeatpsw = mysqli_real_escape_string($link,$_POST['repeatpsw']); 
$repeatpsw = strip_tags($repeatpsw);

if($newpsw != $repeatpsw) {
    echo "Passwords do not match";
}

//get the hashed password
$psw_result = mysqli_query($link, "select password_hash from doctor where doctor_id = $id");
$psw_row = mysqli_fetch_row($psw_result);
$password_hash = $psw_row[0];

if(password_verify($oldpsw, $password_hash)){
    $password_hash_new = password_hash($newpsw, PASSWORD_DEFAULT);
    $sql = "update doctor set password_hash = '$password_hash_new'
        where doctor_id = $id";  

    if (mysqli_query($link, $sql)) {
        echo "New record created successfully";
        include dirname(__DIR__).'/general/closeDB.php';
        header("location: doctorprofile.php");

    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($link);
    }
}else{
    echo "Password incorrect.";
    include dirname(__DIR__).'/general/closeDB.php';
    header("location: change_password_doctor.php");
}

include dirname(__DIR__).'/general/closeDB.php';
?> 