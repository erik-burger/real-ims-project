<html>
<?php
session_start();
$logedin = $_SESSION["loggedin"];
$user = $_SESSION["user"];

use PHPMailer\PHPMailer\PHPMailer; 
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

                        //Get information for email 
                        $sql_from = "SELECT last_name, first_name FROM doctor WHERE doctor_id = '$d_id'";
                        
                        $sql_to = "SELECT email FROM users WHERE user_id = '$p_id'"; 

                        $result1 = mysqli_query($link,  $sql_from); 
                        while($row = $result1->fetch_assoc()) {
                            $f_name = $row["first_name"]; 
                            $l_name = $row["last_name"]; 
                        }

                        $result2 = mysqli_query($link,  $sql_to); 
                        while($row = $result2->fetch_assoc()) {
                            $email = $row["email"]; 
                        }

                        echo sendEmail($f_name, $l_name, $d_id, $email); 

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
                $conn_to = $_GET["con"]; 

                switch ($conn_to){
                    case 'D':
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
                                //Information for email 
                                $sql_from = "SELECT last_name, first_name FROM patient WHERE patient_id = '$p_id'";
                                $sql_to = "SELECT email FROM users WHERE user_id = '$d_id'"; 

                                $result1 = mysqli_query($link,  $sql_from); 
                                while($row = $result1->fetch_assoc()) {
                                    $f_name = $row["first_name"]; 
                                    $l_name = $row["last_name"]; 
                                }

                                $result2 = mysqli_query($link,  $sql_to); 
                                while($row = $result2->fetch_assoc()) {
                                    $email = $row["email"]; 
                                }

                                echo sendEmail($f_name, $l_name, $d_id, $email);   

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
                        $p_id = $_SESSION["id"];
                        $c_id = $_POST["caregiver_id"];
                        $c_id = mysqli_real_escape_string($link, $c_id);

                        //Query to check if the patient doctor connection exists 
                        $result = mysqli_query($link, "select *
                                                from patient_caregiver 
                                                where patient_id = '$p_id' 
                                                and caregiver_id = '$c_id'"); 

                        
                        if ($result->num_rows == 0){
                            //If the patient doctor connection does not exists - make conection 
                            $sql = "insert into patient_caregiver(patient_id, caregiver_id, patient_accept) 
                            values ('$p_id', '$c_id', true);";  
                            
                            if (mysqli_query($link, $sql)) {   
                               //Information for email 
                                $sql_from = "SELECT last_name, first_name FROM patient WHERE patient_id = '$p_id'";
                                $sql_to = "SELECT email FROM users WHERE user_id = '$c_id'"; 

                                $result1 = mysqli_query($link,  $sql_from); 
                                while($row = $result1->fetch_assoc()) {
                                    $f_name = $row["first_name"]; 
                                    $l_name = $row["last_name"]; 
                                }

                                $result2 = mysqli_query($link,  $sql_to); 
                                while($row = $result2->fetch_assoc()) {
                                    $email = $row["email"]; 
                                }

                                echo sendEmail($f_name, $l_name, $d_id, $email);   
                                
                                $message = "You have linked your account to the caregiver with id $c_id";
                                echo "<script>alert('$message'); window.location.href = '../general/profile_page.php';</script>";
                            } else {
                                $message = "Connection failed"; 
                                echo "<script>alert('$message'); window.location.href = '../general/profile_page.php';</script>";
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
                                echo "<script>alert('$message'); window.location.href = '../general/profile_page.php';</script>";
                            } else {
                                $message = "Connection failed"; 
                                echo "<script>alert('$message'); window.location.href = '../general/profile_page.php';</script>";
                            }
                        }
                    break; 
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
                        //Get information for email 
                        $sql_from = "SELECT last_name, first_name FROM caregiver WHERE caregiver_id = '$c_id'";                       
                        $sql_to = "SELECT email FROM users WHERE user_id = '$p_id'"; 

                        $result1 = mysqli_query($link,  $sql_from); 
                        while($row = $result1->fetch_assoc()) {
                            $f_name = $row["first_name"]; 
                            $l_name = $row["last_name"]; 
                        }

                        $result2 = mysqli_query($link,  $sql_to); 
                        while($row = $result2->fetch_assoc()) {
                            $email = $row["email"]; 
                        }

                        echo sendEmail($f_name, $l_name, $c_id, $email); 
                        
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

//Function to send email when a user connects to another user for the first time 
function sendEmail($from_f_name, $from_l_name, $from_id, $to_email){
    require_once(dirname(__DIR__).'/PHPMailer/PHPMailer.php');
    require_once(dirname(__DIR__).'/PHPMailer/SMTP.php');
    require_once(dirname(__DIR__).'/PHPMailer/Exception.php');
       
    $subject = "Trackzheimers - Request to Connect"; 

    $message = "A request to connect has been sent from $from_f_name $from_l_name with id $from_id.\n
                Logg in to Trackzheimers to answer request."; 

    $body ='<html>
        <div class="background" style="background-color:#eee;background-image:none;background-repeat:repeat;background-position:top left;background-attachment:scroll;padding-top:10px;padding-bottom:10px;padding-right:10px;padding-left:10px;" >
            <div class="content" style="max-width:800px;background-color:ghostwhite;background-image:none;background-repeat:repeat;background-position:top left;background-attachment:scroll;font-family:sans-serif;margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;overflow:hidden;border-radius:5px;" >
                <h1 style="margin-top:20px;margin-bottom:20px;margin-right:20px;margin-left:20px;font-size:30px;text-align:center;color:rgb(43, 43, 43);" >'.$subject.'</h1>
                <div class="motivation">
                    <p style="margin-top:20px;margin-bottom:20px;margin-right:20px;margin-left:20px;font-size:20px;text-align:center;color:rgb(43, 43, 43);line-height:1.5;" > '.$message.'</p>
                </div>
            </div>
        </div>
    </html>';
    
    $mail = new PHPMailer();   
    
    //SMTP Settings
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = "trackzheimers@gmail.com";
    $mail->Password = '123trackzheimers';
    $mail->Port = 465; //587
    $mail->SMTPSecure = "ssl"; //tls

    //Email Settings
    $mail->isHTML(true);
    $mail->setFrom("trackzheimers@gmail.com");
    $mail->addAddress($to_email);
    $mail->Subject = $subject;
    $mail->Body = $body;
    if ($mail->send()) {
        $_POST = array_filter($_POST);
    } else { 
        $_POST = array_filter($_POST);
    }
} 


?> 

