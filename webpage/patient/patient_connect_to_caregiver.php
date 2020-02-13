<?php
    session_start();
    $p_id = $_SESSION["id"];
    $c_id = $_POST["caregiver_id"];

    include dirname(__DIR__).'/general/openDB.php';

    $result = mysqli_query($link, "select *
                            from patient_caregiver 
                            where patient_id = '$p_id' 
                            and caregiver_id = '$c_id'"); 

    
    if ($result->num_rows == 0){
        $sql = "insert into patient_caregiver(patient_id, caregiver_id, patient_accept) 
        values ('$p_id', '$c_id', true);";  
        
        if (mysqli_query($link, $sql)) {           
            $message = "You have linked your account to the caregiver with id $c_id";
            echo "<script>alert('$message'); window.location.href = 'patientprofile.php';</script>";
        } else {
            $message = "Connection failed"; 
            echo "<script>alert('$message'); window.location.href = 'patientprofile.php';</script>";
        }
    }
    //If the conection alreday exists 
    elseif($result->num_rows > 0){
        $sql1 = "update patient_caregiver
        set patient_accept = true
        where patient_id = '$p_id' and caregiver_id = '$c_id';";

        $sql2 = "update patient_caregiver
        set both_accept = true 
        where patient_id = '$p_id' 
        and caregiver_id = '$c_id' 
        and patient_accept = true 
        and caregiver_accept = true;"; 

        if (mysqli_query($link, $sql1)) {
            mysqli_query($link, $sql2); 
            $message = "You have linked your account to the caregiver with id $c_id";
            echo "<script>alert('$message'); window.location.href = 'patientprofile.php';</script>";
        } else {
            $message = "Connection failed"; 
            echo "<script>alert('$message'); window.location.href = 'patientprofile.php';</script>";
        }
    }

    include dirname(__DIR__).'/general/openDB.php';
?> 