
<?php
    session_start();
    $d_id = $_SESSION["id"];

    include dirname(__DIR__).'../general/openDB.php';
    $p_id = $_POST["patient_id"]; 

    $sql = "insert into patient_doctor(patient_id, doctor_id) 
    values ('$p_id', '$d_id')";  
    
    if (mysqli_query($link, $sql)) {
        $message = "You have linked your account to the patient with id $p_id";
        echo "<script>alert('$message'); window.location.href = 'doctorsearch.php';</script>";
    } else {
        $message = "Connection failed"; 
        echo "<script>alert('$message'); window.location.href = 'doctorsearch.php';</script>";
    }
    
    include dirname(__DIR__).'../general/openDB.php';
?> 