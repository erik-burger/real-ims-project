<?php 

session_start();
use PHPMailer\PHPMailer\PHPMailer; 

/*if ( isset($_SESSION["id"]) === false) {
    header("location: ../html/php/login.php");
}
*/

	if(isset($_POST['submit'])){ 
        $email = $_POST['email']; 
        $email = htmlspecialchars($email); 
		$email = filter_var($email, FILTER_SANITIZE_EMAIL);
		
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			echo '<script>alert("Email is not valid! Please enter a valid email adress"); window.location.href = "contact.php";</script>'; 
            $_POST = array_filter($_POST);
		}else{
            require_once(dirname(__DIR__).'/PHPMailer/PHPMailer.php');
        	require_once(dirname(__DIR__).'/PHPMailer/SMTP.php');
        	require_once(dirname(__DIR__).'/PHPMailer/Exception.php');

            $subject = $_POST['subject']; 
            $subject = htmlspecialchars($subject); 

            $message = $_POST["message"];
            $message = htmlspecialchars($message);

            $body ='<html>
                <div class="background" style="background-color:#eee;background-image:none;background-repeat:repeat;background-position:top left;background-attachment:scroll;padding-top:10px;padding-bottom:10px;padding-right:10px;padding-left:10px;" >
                    <div class="content" style="max-width:800px;background-color:ghostwhite;background-image:none;background-repeat:repeat;background-position:top left;background-attachment:scroll;font-family:sans-serif;margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;overflow:hidden;border-radius:5px;" >
                        <h1 style="margin-top:20px;margin-bottom:20px;margin-right:20px;margin-left:20px;font-size:30px;text-align:center;color:rgb(43, 43, 43);" >'.$subject.'</h1>
                        <div class="motivation">
                            <p style="margin-top:20px;margin-bottom:20px;margin-right:20px;margin-left:20px;font-size:20px;text-align:center;color:rgb(43, 43, 43);line-height:1.5;" > '.$message.'</p>
                            <p style="margin-top:20px;margin-bottom:20px;margin-right:20px;margin-left:20px;font-size:20px;text-align:center;color:rgb(43, 43, 43);line-height:1.5;" > From: '.$email.'</p>
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
        	$mail->addAddress("trackzheimers@gmail.com");
        	$mail->Subject = $subject;
        	$mail->Body = $body;

        	if ($mail->send()) {
                echo '<script>alert("Message was sent!"); window.location.href = "contact.php";</script>'; 
                $_POST = array_filter($_POST);
        	} else {
                echo '<script>alert("Something is wrong!");</script>'; 
                $_POST = array_filter($_POST);
        	}
        }
    }
      
?>