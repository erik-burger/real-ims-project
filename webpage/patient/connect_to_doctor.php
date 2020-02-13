
<?php
    session_start();
    $p_id = $_SESSION["id"];
    $d_id = $_POST["doctor_id"];

    include dirname(__DIR__).'/general/openDB.php';

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
            echo "<script>alert('$message'); window.location.href = 'patientprofile.php';</script>";
        } else {
            $message = "Connection failed"; 
            echo "<script>alert('$message'); window.location.href = 'patientprofile.php';</script>";
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
            echo "<script>alert('$message'); window.location.href = 'patientprofile.php';</script>";
        } else {
            $message = "Connection failed"; 
            echo "<script>alert('$message'); window.location.href = 'patientprofile.php';</script>";
        }
    }

    include dirname(__DIR__).'/general/openDB.php';
?> 