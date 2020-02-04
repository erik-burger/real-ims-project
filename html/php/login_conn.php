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
include 'C:\wamp64\www\real-ims-project\html\php\openDB.php';

$email = trim($_POST["email"]);
$password = trim($_POST["psw"]);
//$username_err = "";
//$password_err = "";
/*
// Check if username is empty
if(empty(trim($_POST["email"]))){
    $username_err = "Please enter your email address.";
} else{
    $email = trim($_POST["email"]);
}
*/
/*
 // Check if password is empty
 if(empty(trim($_POST["psw"]))){
    $password_err = "Please enter your password.";
} else{
    $password = trim($_POST["psw"]);
}
*/
//If both are filled in (=both error variables are empty) -> check if email and password fit together
//if(empty($username_err) && empty($password_err)){
    $doctorsql = "select doctor_id from doctor where email = '$email' and password_hash= '$password'";
    $result = mysqli_query($link, $doctorsql)
    or die("Coul not issue MySQL query");
    $count1 = mysqli_num_rows($result);

    if($count1 == 1) { //if the query returns 1 result -> login at doctor
        echo "Login successful";
        session_start();
        $_SESSION["loggedin"] = true;
        $_SESSION["email"] = $email;
        header("location: http://localhost/real-ims-project/html/doctorstart.html"); 

    } elseif($count1 == 0) { //if it gives no result try the patient table
        $patientsql = "select patient_id from patient where email = '$email' and password_hash = $password'";
        $result = mysqli_query($link, $patientsql)
        or die("Coul not issue MySQL query");
        $count2 = mysqli_num_rows($result);

        if($count2 == 1) { //returns 1 column -> login at patient
            echo "Login successful";
            session_start();
            $_SESSION["loggedin"] = true;
            $_SESSION["email"] = $email;
            header("location:../patientstart.html"); 

        } else{ //if it does not return anything here either, email or password are wrong
            echo "Email adress or password invalid";
        }
        */
    } else{ //if it returns something else than 0 or 1 ...?
        echo "Something is really really wrong";}
} else{//if there is something in the error variables username or password are empty
    echo "Please fill in both username and password";
}
include 'C:\wamp64\www\real-ims-project\html\php\closeDB.php';

?>
</body>
</html>