<!DOCTYPE html>
<html>
<body>

<?php
//Initialize the session
session_start();

//Check if the user is already logged in

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    if ($_SESSION["user"] == "D") {
        header("location:../doctor/doctorstart.php");
    }elseif($_SESSION["user"] == "P"){
        header("location:../patient/patientstart.php");
    }
    exit;}

//Connect to database
include dirname(__DIR__).'/general/openDB.php';

$email = trim($_POST["email"]);
$password = trim($_POST["psw"]);
$username_err = "";
$password_err = "";

// Check if username is empty
if(empty(trim($_POST["email"]))){
    $username_err = "Please enter your email address.";
} else{
    $email = trim($_POST["email"]);}

 // Check if password is empty
 if(empty(trim($_POST["psw"]))){
    $password_err = "Please enter your password.";
} else{
    $password = trim($_POST["psw"]);}

$email = mysqli_real_escape_string($link, $email);

//If both are filled in (=both error variables are empty) -> check if email is from doctor
if(empty($username_err) && empty($password_err)){   
    $doctorsql = "select doctor_id from doctor where email = '$email'";
    $doctorresult = mysqli_query($link, $doctorsql)
    or die("Could not issue doctor MySQL query");
    $count1 = mysqli_num_rows($doctorresult);

    if($count1 == 1) { //if the query returns 1 result -> login at doctor
        //Get the password_hash from the database
        $psw_result = mysqli_query($link, "select password_hash from doctor where email = '$email'");
        $psw_row = mysqli_fetch_row($psw_result);
        $password_hash = $psw_row[0];

        if(password_verify($password, $password_hash) === true) {//Verify the string password with the hashed password
            //Set all the necessary session variables
            $_SESSION["loggedin"] = true;
            $_SESSION["email"] = $email;
            $result = mysqli_query($link, "select doctor_id from doctor where email = '$email'")
            or die("Could not issue doctor session MySQL query"); //get the doctor id from unique email
            $row = mysqli_fetch_assoc($result);
            $_SESSION["id"] = $row["doctor_id"];
            $_SESSION["user"] = "D"; //for automatic logout if wrong user type acceses a page
            $_SESSION["timestamp"] = time(); //needed for logout after inactivity
            header("location: ../doctor/doctorstart.php"); //redirect to doctor start page
        } else {
            echo "<script>alert('Password or email is invalid'); window.location.href = 'login.php';</script>";
        }
    }else{ //if it doctor table gives no result try the patient table
        $patientsql = "select patient_id from patient where email = '$email'";
        $patientresult = mysqli_query($link, $patientsql)
        or die("Coul not issue patient MySQL query");
        $count2 = mysqli_num_rows($patientresult);

        if($count2 == 1) { //returns 1 column -> login at patient
            //Get the password_hash from the database
            $psw_result = mysqli_query($link, "select password_hash from patient where email = '$email'");
            $psw_row = mysqli_fetch_row($psw_result);
            $password_hash = $psw_row[0];
            
            if(password_verify($password, $password_hash)) {//Verify the string password with the hashed password
                //Set all the necessary session variables
                $_SESSION["loggedin"] = true;
                $_SESSION["email"] = $email;
                $result = mysqli_query($link, "select patient_id from patient where email = '$email'")
                or die("Could not issue patient session MySQL query"); //get the patient id from unique email
                $row = mysqli_fetch_assoc($result);
                $_SESSION["id"] = $row["patient_id"];
                $_SESSION["user"] = "P"; //for automatic logout if wrong user type acceses a page
                $_SESSION["timestamp"] = time(); //needed for logout after inactivity
                header("location: ../patient/patientstart.php"); //redirect to patient start page

            }else{
                echo "<script>alert('Password or email is invalid'); window.location.href = 'login.php';</script>";
            }

        } else{ 
            $researchersql = "select researcher_id from researcher where email = '$email'";
            $researcherresult = mysqli_query($link, $researchersql)
            or die("Coul not issue researcher MySQL query");
            $count3 = mysqli_num_rows($researcherresult);

            if($count3 == 1) { //returns 1 column -> login at researcher
                //Get the password_hash from the database
                $psw_result = mysqli_query($link, "select password_hash from researcher where email = '$email'");
                $psw_row = mysqli_fetch_row($psw_result);
                $password_hash = $psw_row[0];
               
                if(password_verify($password, $password_hash)){//Verify the string password with the hashed password
                    //Set all the necessary session variables
                    $_SESSION["loggedin"] = true;
                    $_SESSION["email"] = $email;
                    $result = mysqli_query($link, "select researcher_id from researcher where email = '$email'")
                    or die("Could not issue researcher session MySQL query"); //get the patient id from unique email
                    $row = mysqli_fetch_assoc($result);
                    $_SESSION["id"] = $row["researcher_id"];
                    $_SESSION["user"] = "R"; //for automatic logout if wrong user type acceses a page
                    $_SESSION["timestamp"] = time(); //needed for logout after inactivity
                    header("location: ../researcher/researcherstart.php"); //redirect to patient start page

                }else{
                    echo "<script>alert('Password or email is invalid'); window.location.href = 'login.php';</script>";}

            }else{ //if it does not return anything here either, email or password are wrong
                $caregiversql = "select caregiver_id from caregiver where email = '$email'";
                $caregiverresult = mysqli_query($link, $caregiversql)
                or die("Coul not issue caregiver MySQL query");
                $count4 = mysqli_num_rows($caregiverresult);

                if($count4 == 1){
                    $psw_result = mysqli_query($link, "select password_hash from caregiver where email = '$email'");
                    $psw_row = mysqli_fetch_row($psw_result);
                    $password_hash = $psw_row[0];

                    if(password_verify($password, $password_hash)){//Verify the string password with the hashed password
                        //Set all the necessary session variables
                        $_SESSION["loggedin"] = true;
                        $_SESSION["email"] = $email;
                        $result = mysqli_query($link, "select caregiver_id from caregiver where email = '$email'")
                        or die("Could not issue caregiver session MySQL query"); //get the patient id from unique email
                        $row = mysqli_fetch_assoc($result);
                        $_SESSION["id"] = $row["caregiver_id"];
                        $_SESSION["user"] = "C"; //for automatic logout if wrong user type acceses a page
                        $_SESSION["timestamp"] = time(); //needed for logout after inactivity
                        header("location: ../caregiver/caregiverstart.php"); //redirect to patient start page
    
                    }else{
                        echo "<script>alert('Password or email is invalid'); window.location.href = 'login.php';</script>";}
                }
        }
        }}
}else{//if there is something in the error variables username or password are empty
    echo "<script>alert('Password or email is invalid'); window.location.href = 'login.php';</script>";;}


include dirname(__DIR__).'/general/closeDB.php';

?>
</body>
</html>