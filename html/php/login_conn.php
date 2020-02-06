<!DOCTYPE html>
<html>
<body>

<?php
//Initialize the session
session_start();

//Check if the user is already logged in

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    if ($_SESSION["user"] == "D") {
        header("location:../doctorstart.php");
    }elseif($_SESSION["user"] == "P"){
        header("location: ../patientstart.php");
    }
    exit;
}

//Connect to database
include dirname(__DIR__).'/php/openDB.php';

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
    or die("Could not issue doctor MySQL query");
    $count1 = mysqli_num_rows($doctorresult);

    if($count1 == 1) { //if the query returns 1 result -> login at doctor
        $_SESSION["loggedin"] = true;
        $_SESSION["email"] = $email;
        $result = mysqli_query($link, "select doctor_id from doctor where email = '$email'")
        or die("Could not issue doctor session MySQL query");
        $row = mysqli_fetch_assoc($result);
        $_SESSION["id"] = $row["doctor_id"];
        $_SESSION["user"] = "D";
        $_SESSION["timestamp"] = time();
        header("location: ../doctorstart.php"); 

    }else { //if it gives no result try the patient table
        $patientsql = "select patient_id from patient where email = '$email' and password_hash = '$password'";
        $patientresult = mysqli_query($link, $patientsql)
        or die("Coul not issue patient MySQL query");
        $count2 = mysqli_num_rows($patientresult);

        if($count2 == 1) { //returns 1 column -> login at patient
            $_SESSION["loggedin"] = true;
            $_SESSION["email"] = $email;
            $result = mysqli_query($link, "select patient_id from patient where email = '$email'")
            or die("Could not issue patient session MySQL query");
            $row = mysqli_fetch_assoc($result);
            $_SESSION["id"] = $row["patient_id"];
            $_SESSION["user"] = "P";
            $_SESSION["timestamp"] = time();
            header("location: ../patientstart.php"); 

        } else{ //if it does not return anything here either, email or password are wrong
            echo "Email adress or password invalid";}
        }
} else{//if there is something in the error variables username or password are empty
    echo "Please fill in both username and password";
}


include dirname(__DIR__).'/php/closeDB.php';

?>
</body>
</html>