<?php
use PHPMailer\PHPMailer\PHPMailer;
include dirname(__DIR__).'/general/openDB.php';

if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['code']) && !empty($_GET['code'])){
	// Verify data
	$email = $link->real_escape_string($_GET['email']);
    $code = $link->real_escape_string($_GET['code']);
}



if  ($code == "denied") {
    $subject = 'Denied data access';
    require_once(dirname(__DIR__).'/PHPMailer/PHPMailer.php');
    require_once(dirname(__DIR__).'/PHPMailer/SMTP.php');
    require_once(dirname(__DIR__).'/PHPMailer/Exception.php');
    
    
    $body ='<html>
                <div class="background" style="background-color:#eee;background-image:none;background-repeat:repeat;background-position:top left;background-attachment:scroll;padding-top:10px;padding-bottom:10px;padding-right:10px;padding-left:10px;" >
                    <div class="content" style="max-width:800px;background-color:ghostwhite;background-image:none;background-repeat:repeat;background-position:top left;background-attachment:scroll;font-family:sans-serif;margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;overflow:hidden;border-radius:5px;" >
                        <h1 style="margin-top:20px;margin-bottom:20px;margin-right:20px;margin-left:20px;font-size:30px;text-align:center;color:rgb(43, 43, 43);" >Your data access request on trackzheimers has been denied</h1>
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
    $mail->Port = 587; //587
    $mail->SMTPSecure = "ssl"; //tls

    //Email Settings
    $mail->isHTML(true);
    $mail->setFrom("trackzheimers@gmail.com");
    $mail->addAddress($email);
    $mail->Subject = $subject;
    $mail->Body = $body;
    //$mail->IsHTML(true);
    if ($mail->send()) {
        echo "Email is sent!";
    } else {
        echo "Something is wrong: <br><br>" . $mail->ErrorInfo;
    }

}

$find_id = mysqli_query($link, "SELECT user_id FROM users WHERE email = '$email'")
or 
die("Could not issue MySQL query"); 

while ($row = $find_id->fetch_assoc()) {
    $user_id = $row["user_id"];
}


$result = mysqli_query($link, "SELECT data_access_code FROM researcher WHERE researcher_id = '$user_id'")
or 
die("Could not issue MySQL query"); 

while ($row = $result->fetch_assoc()) {
    $db_code = $row["data_access_code"];
}
$code = MD5($code);
if ($db_code == $code) {
    mysqli_query($link, "UPDATE researcher SET data_access = 1 WHERE researcher_id = '$user_id'")
    or 
    die("Could not issue MySQL query");     
    $subject = 'Accepted data access';
    require_once(dirname(__DIR__).'/PHPMailer/PHPMailer.php');
    require_once(dirname(__DIR__).'/PHPMailer/SMTP.php');
    require_once(dirname(__DIR__).'/PHPMailer/Exception.php');
    
    
    $body ='<html>
                <div class="background" style="background-color:#eee;background-image:none;background-repeat:repeat;background-position:top left;background-attachment:scroll;padding-top:10px;padding-bottom:10px;padding-right:10px;padding-left:10px;" >
                    <div class="content" style="max-width:800px;background-color:ghostwhite;background-image:none;background-repeat:repeat;background-position:top left;background-attachment:scroll;font-family:sans-serif;margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;overflow:hidden;border-radius:5px;" >
                        <h1 style="margin-top:20px;margin-bottom:20px;margin-right:20px;margin-left:20px;font-size:30px;text-align:center;color:rgb(43, 43, 43);" >Your data access request on trackzheimers has been accepted</h1>
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
    $mail->addAddress($email);
    $mail->Subject = $subject;
    $mail->Body = $body;
    //$mail->IsHTML(true);
    if ($mail->send()) {
        echo "Email is sent!";
    } else {
        echo "Something is wrong: <br><br>" . $mail->ErrorInfo;
    }

}
else {
}
include dirname(__DIR__).'/general/closeDB.php';
?>