<?php 

use PHPMailer\PHPMailer\PHPMailer; 

require_once(dirname(__DIR__).'/PHPMailer/PHPMailer.php');
require_once(dirname(__DIR__).'/PHPMailer/SMTP.php');
require_once(dirname(__DIR__).'/PHPMailer/Exception.php');

$subject = "Reminder: Have you taken a trackzheimers test lately?"; 

$message = "Dear user, we have noticed that you have not taken a trackzheimers test in a while. Take one now! YAY!"; 

$body ='<html>
    <div class="background" style="background-color:#eee;background-image:none;background-repeat:repeat;background-position:top left;background-attachment:scroll;padding-top:10px;padding-bottom:10px;padding-right:10px;padding-left:10px;" >
        <div class="content" style="max-width:800px;background-color:ghostwhite;background-image:none;background-repeat:repeat;background-position:top left;background-attachment:scroll;font-family:sans-serif;margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;overflow:hidden;border-radius:5px;" >
            <h1 style="margin-top:20px;margin-bottom:20px;margin-right:20px;margin-left:20px;font-size:30px;text-align:center;color:rgb(43, 43, 43);" >'.$subject.'</h1>
            <div class="motivation">
                <p style="margin-top:20px;margin-bottom:20px;margin-right:20px;margin-left:20px;font-size:20px;text-align:center;color:rgb(43, 43, 43);line-height:1.5;" > '.$message.'</p>
                <p style="margin-top:20px;margin-bottom:20px;margin-right:20px;margin-left:20px;font-size:20px;text-align:center;color:rgb(43, 43, 43);line-height:1.5;" > From: trackzheimers@gmail.com</p>
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
$mail->Port = 587; //465
$mail->SMTPSecure = "tls"; //

//Email Settings
$mail->isHTML(true);
$mail->setFrom("trackzheimers@gmail.com");
$mail->addAddress("rar.pensch@gmail.com");
$mail->Subject = $subject;
$mail->Body = $body;

if ($mail->send()) {
    echo 'Sent'; 
} else {
    echo 'Nononono'; $_POST = array_filter($_POST);
}

?>