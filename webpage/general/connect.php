<html>
<?php
session_start();
$logedin = $_SESSION["loggedin"];
$user = $_SESSION["user"];

include dirname(__DIR__).'/general/openDB.php';

if (isset($logedin) or isset($user)) {
    if ($logedin == 1) {
        switch ($user) {
            case 'D':
                $d_id = $_SESSION["id"];
                $p_id = $_POST["patient_id"];
            
                $p_id = mysqli_real_escape_string($link, $p_id);
            
                //Query to check if the patient doctor connection exists 
                $result = mysqli_query($link, "select *
                                        from patient_doctor 
                                        where patient_id = '$p_id' 
                                        and doctor_id = '$d_id'"); 
            
                
                if ($result->num_rows == 0){
                    //If the patient doctor connection does not exists - make conection 
                    $sql = "insert into patient_doctor(patient_id, doctor_id, doctor_accept) 
                    values ('$p_id', '$d_id', true);";  
                    
                    if (mysqli_query($link, $sql)) {           
                        $message = "You have linked your account to the patient with id $p_id";
                        echo "<script>alert('$message'); window.location.href = '../doctor/doctorsearch.php';</script>";
                    } else {
                        $message = "Connection failed"; 
                        echo "<script>alert('$message'); window.location.href = '../doctor/doctorsearch.php';</script>";
                    }
                }
                //If the conection alreday exists 
                elseif($result->num_rows > 0){
                    $sql1 = "update patient_doctor
                    set doctor_accept = true
                    where patient_id = '$p_id' and doctor_id = '$d_id';";
            
                    $sql2 = "update patient_doctor
                    set both_accept = true 
                    where patient_id = '$p_id' 
                    and doctor_id = '$d_id' 
                    and patient_accept = true 
                    and doctor_accept = true;"; 
            
                    if (mysqli_query($link, $sql1)) {
                        mysqli_query($link, $sql2); 
                        $message = "You have linked your account to the patient with id $p_id";
                        echo "<script>alert('$message'); window.location.href = '../doctor/doctorsearch.php';</script>";
                    } else {
                        $message = "Connection failed"; 
                        echo "<script>alert('$message'); window.location.href = '../doctor/doctorsearch.php';</script>";
                    }
                }
                
                break;
            case 'P':
                $p_id = $_SESSION["id"];
                $d_id = $_POST["doctor_id"];
                
                $d_id = mysqli_real_escape_string($link, $d_id);
                //Query to check if the patient doctor connection exists 
                $result = mysqli_query($link, "select *
                                        from patient_doctor 
                                        where patient_id = '$p_id' 
                                        and doctor_id = '$d_id'"); 

                
                if ($result->num_rows == 0){
                    //If the patient doctor connection does not exists - make conection 
                    $sql = "insert into patient_doctor(patient_id, doctor_id, patient_accept) 
                    values ('$p_id', '$d_id', true);";  
                    
                    if (mysqli_query($link, $sql)) {           
                        $message = "You have linked your account to the doctor with id $d_id";
                        echo "<script>alert('$message'); window.location.href = '../general/profile_page.php';</script>";
                    } else { 
                        $message = "Connection failed"; 
                        echo "<script>alert('$message'); window.location.href = '../general/profile_page.php';</script>";
                    }
                }
                //If the conection alreday exists 
                elseif($result->num_rows > 0){
                    $sql1 = "update patient_doctor
                    set patient_accept = true
                    where patient_id = '$p_id' and doctor_id = '$d_id';";

                    $sql2 = "update patient_doctor
                    set both_accept = true 
                    where patient_id = '$p_id' 
                    and doctor_id = '$d_id' 
                    and patient_accept = true 
                    and doctor_accept = true;"; 

                    if (mysqli_query($link, $sql1)) {
                        mysqli_query($link, $sql2); 
                        $message = "You have linked your account to the doctor with id $d_id";
                        echo "<script>alert('$message'); window.location.href = '../general/profile_page.php';</script>";
                    } else {
                        $message = "Connection failed"; 
                        echo "<script>alert('$message'); window.location.href = '../general/profile_page.php';</script>";
                    }
                }
          
                break;
            case 'C':
                $c_id = $_SESSION["id"];
                $p_id = mysqli_real_escape_string($link, $_POST["patient_id"]);
                
            
                //Query to check if the cargiver patient connection exists 
                $result = mysqli_query($link, "select *
                                        from patient_caregiver 
                                        where patient_id = '$p_id' 
                                        and caregiver_id = '$c_id'"); 
            
                
                if ($result->num_rows == 0){
                    //If the caregiver patient connection does not exists - make conection 
                    $sql = "insert into patient_caregiver(patient_id, caregiver_id, caregiver_accept) 
                    values ('$p_id', '$c_id', true);";  
                    
                    if (mysqli_query($link, $sql)) {           
                        $message = "You have linked your account to the patient with id $p_id";
                        echo "<script>alert('$message'); window.location.href = '../general/profile_page.php';</script>";
                    } else {
                        $message = "Connection failed"; 
                        echo "<script>alert('$message'); window.location.href = '../general/profile_page.php';</script>";
                    }
                }
                //If the conection alreday exists 
                elseif($result->num_rows > 0){
                    $sql1 = "update patient_caregiver
                    set caregiver_accept = true
                    where patient_id = '$p_id' and caregiver_id = '$c_id';";
            
                    $sql2 = "update patient_caregiver
                    set both_accept = true 
                    where patient_id = '$p_id' 
                    and caregiver_id = '$c_id' 
                    and patient_accept = true 
                    and caregiver_accept = true;"; 
            
                    if (mysqli_query($link, $sql1)) {
                        mysqli_query($link, $sql2); 
                        $message = "You have linked your account to the patient with id $p_id";
                        echo "<script>alert('$message'); window.location.href = '../general/profile_page.php';</script>";
                    } else {
                        $message = "Connection failed"; 
                        echo "<script>alert('$message'); window.location.href = '../general/profile_page.php';</script>";
                    }
                }                        
            break;
        }
    } else {
    echo "<script>window.location.href = '../general/login.php';</script>";
    }
}else {
echo "<script>window.location.href = '../general/login.php';</script>";
}
include dirname(__DIR__).'/general/openDB.php';
?> 