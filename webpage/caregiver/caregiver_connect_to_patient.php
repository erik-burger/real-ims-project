<?php
    session_start();
    $c_id = $_SESSION["id"];
    $p_id = $_POST["patient_id"];

    include dirname(__DIR__).'/general/openDB.php';
    $p_id = mysqli_real_escape_string($p_id);
    

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
            echo "<script>alert('$message'); window.location.href = 'caregiverprofile.php';</script>";
        } else {
            $message = "Connection failed"; 
            echo "<script>alert('$message'); window.location.href = 'caregiverprofile.php';</script>";
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
            echo "<script>alert('$message'); window.location.href = 'caregiverprofile.php';</script>";
        } else {
            $message = "Connection failed"; 
            echo "<script>alert('$message'); window.location.href = 'caregiverprofile.php';</script>";
        }
    }

    include dirname(__DIR__).'/general/openDB.php';
?> 