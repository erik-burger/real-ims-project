
<?php
    session_start();
    $d_id = $_SESSION["id"];

    include dirname(__DIR__).'/general/openDB.php';
    $p_id = $_POST["patient_id"]; 

    $sql1 = "insert into patient_doctor(patient_id, doctor_id, doctor_accept) 
    values ('$p_id', '$d_id', true);";  
    $sql2 = "update patient_doctor
    set both_accept = true 
    where patient_id = '$p_id' and doctor_id = '$d_id' and patient_accept = true and doctor_accept = true;"; 
    
    if (mysqli_query($link, $sql1)) {
        mysqli_query($link, $sql2); 
        $message = "You have linked your account to the patient with id $p_id";
        echo "<script>alert('$message'); window.location.href = 'doctorsearch.php';</script>";
    } else {
        $message = "Connection failed"; 
        echo "<script>alert('$message'); window.location.href = 'doctorsearch.php';</script>";
    }
    
    include dirname(__DIR__).'../general/openDB.php';
?> 