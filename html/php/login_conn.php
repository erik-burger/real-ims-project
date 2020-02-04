<!DOCTYPE html>
<html>
<body>

<?php
//Initialize the session
session_start();

//Check if the user is already logged in
/*
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location:../doctorstart.html"); //!!!This has to go to either patienr or doctor
    exit;
}
*/
//Connect to database
<<<<<<< HEAD
include dirname(__DIR__).'\php\openDB.php';
=======
include '../real-ims-project/html/php/openDB.php';
>>>>>>> 3287fdea633dcfcff77051aabab7eed5eb805284

$email = trim($_POST["email"]);
$password = trim($_POST["psw"]);
$username_err = "";
$password_err = "";

// Check if username is empty
if(empty(trim($_POST["email"]))){
    $username_err = "Please enter your email address.";
} else{
    $email = trim($_POST["email"]);
}

 // Check if password is empty
 if(empty(trim($_POST["psw"]))){
    $password_err = "Please enter your password.";
} else{
    $password = trim($_POST["psw"]);
}

//If both are filled in (=both error variables are empty) -> check if email and password fit together
if(empty($username_err) && empty($password_err)){
    $doctorsql = "select doctor_id from doctor where email = '$email' and password_hash= '$password'";
    $doctorresult = mysqli_query($link, $doctorsql)
    or die("Coul not issue doctor MySQL query");
    $count1 = mysqli_num_rows($doctorresult);

    if($count1 == 1) { //if the query returns 1 result -> login at doctor
        session_start();
        $_SESSION["loggedin"] = true;
        $_SESSION["email"] = $email;
        header("location: ../doctorstart.html"); 

    }else { //if it gives no result try the patient table
        $patientsql = "select patient_id from patient where email = '$email' and password_hash = '$password'";
        $patientresult = mysqli_query($link, $patientsql)
        or die("Coul not issue patient MySQL query");
        $count2 = mysqli_num_rows($patientresult);

        if($count2 == 1) { //returns 1 column -> login at patient
            session_start();
            $_SESSION["loggedin"] = true;
            $_SESSION["email"] = $email;
            header("location: ../patientstart.html"); 

        } else{ //if it does not return anything here either, email or password are wrong
            echo "Email adress or password invalid";}
        }
} else{//if there is something in the error variables username or password are empty
    echo "Please fill in both username and password";
}

<<<<<<< HEAD
include dirname(__DIR__).'\php\closeDB.php';
=======
include '../real-ims-project/html/php/closeDB.php';
>>>>>>> 3287fdea633dcfcff77051aabab7eed5eb805284

?>
</body>
</html>