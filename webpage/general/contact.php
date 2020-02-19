
<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer; 
/*if ( isset($_SESSION["id"]) === false) {
    header("location: ../html/php/login.php");
}
*/
?>

<?php 

    if(isset($_POST['submit'])){ 

            require_once(dirname(__DIR__).'/PHPMailer/PHPMailer.php');
        	require_once(dirname(__DIR__).'/PHPMailer/SMTP.php');
        	require_once(dirname(__DIR__).'/PHPMailer/Exception.php');

            $subject = $_POST['subject']; 
            $subject = real_escape_string($subject); 
            $subject = strip_tags($subject); 

            $message = $_POST["message"];
            $message = real_escape_string($message); 
            $message = strip_tags($message);

            $email = $_POST['email']; 
            $email = real_escape_string($email); 
            $email = strip_tags($email); 
            
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
        	$mail->Body = $message;

        	if ($mail->send()) {
            	echo '<script>alert("Message was sent!");</script>'; 
        	} else {
                echo '<script>alert("Something is wrong!");</script>'; 
        	}
		}     
?>


<html>
<meta http-equiv="refresh" content="3600;url=logout.php" />

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="top_menu_style.css">
        <link href="IMS_Style.css" rel="stylesheet">

        <style>
            ul{
                list-style-type: none;
                margin: 0;
                padding: 0;
            }
            .logo {
                display: inline-block;
                float: left; 
            }
            * {
            box-sizing: border-box;
            }

            .column {
            float: left;
            width: 50%;
            padding: 10px;
            height: 00px; 
            }

            .page:after {
            content: "";
            display: table;
            clear: both;
            }  
        
           .email{
              width: 70%;
    		  padding: 12px;
    		  border: 1px solid #ccc;
    		  border-radius; 4px;
    		  resize: vertical;
            
            }
            textarea{
              width: 70%;
              height: 200px; 
    		  padding: 12px;
    		  border: 1px solid #ccc;
    		  border-radius; 4px;
    		  resize: vertical;
              font-family:"Arial";   
              font-size: 12px; 
              color: "black";  
        
            }
            input, label {
                display:block;

            }
            .form{
                padding: 20px;  
            }
            
        </style>
    </head>

    <body>
        <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <img class="logo" src="../general/logo_small.png" width = 50>
            </div>
            <ul class="nav navbar-nav">
            <li><a href="../doctor/doctorstart.php">Home</a></li>
            <li class="active"><a href="../general/contact.php">Contact</a></li>
            <li><a href="../doctor/doctorprofile.php">Profile</a></li>
            <li><a href="../doctor/doctorsearch.php">Patients</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="../general/logout.php">Logout</a></li>
            </ul>
        </div>
    </nav>

    <img src="logo_grey.png" width="400">
        <div class = "page"> 
        <div class = "column left">
        
        
        <h1>Contact Information</h1> 
        
        <p><b>email:</b> trackzheimers@gmail.com</p>
        <p><b>telephone:</b> 123456789</p>
        <p><b>adress:</b> project room ITC</p>
        </div>
    
    <div class = "column right" id = "message_form">
        <h1>Write Us a Message</h1>
        <form action="" method = "post" id = "message_form">
            <label for="email"><b>Email address</b></label>
            <input name="email" class = "email" type="text" placeholder="Enter your email address" required><br>  
            <label for="subject"><b>Subject</b></label>
            <input name="subject" class = "email" type="text" placeholder="Enter subject" required><br>  
            <label for="message"><b>Message</b></label>
            <textarea name="message" id = "message" cols=auto rows=auto placeholder="Enter message here..."></textarea>
            <button type = "submit" name = "submit">Send</button>
        </form>  
     </div>     
    </div>
 </div> 
</html>


