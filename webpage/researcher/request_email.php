<?php     
    use PHPMailer\PHPMailer\PHPMailer;

    function generateRandomString($length = 8) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    session_start();
    include dirname(__DIR__).'/general/openDB.php';
    $id = $_SESSION["id"];
    $code = generateRandomString();
    $hashed_code = md5($code);
    $sql = "UPDATE researcher SET data_access_code = '$hashed_code' WHERE researcher_id = $id;";
    mysqli_query($link, $sql)
    or 
    die("Could not issue MySQL query"); 
    $denied ="denied";
    
    require_once(dirname(__DIR__).'/PHPMailer/PHPMailer.php');
    require_once(dirname(__DIR__).'/PHPMailer/SMTP.php');
    require_once(dirname(__DIR__).'/PHPMailer/Exception.php');
    
    $researcher_email = $_POST['email'];
    $motivation = htmlspecialchars($_POST['motivation']);
    $subject = 'A data request has been made by '.$researcher_email;
    $email = "trackzheimers@gmail.com";
    
    
    $body ='<html>
                <div class="background" style="background-color:#eee;background-image:none;background-repeat:repeat;background-position:top left;background-attachment:scroll;padding-top:10px;padding-bottom:10px;padding-right:10px;padding-left:10px;" >
                    <div class="content" style="max-width:800px;background-color:ghostwhite;background-image:none;background-repeat:repeat;background-position:top left;background-attachment:scroll;font-family:sans-serif;margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;overflow:hidden;border-radius:5px;" >
                        <h1 style="margin-top:20px;margin-bottom:20px;margin-right:20px;margin-left:20px;font-size:30px;text-align:center;color:rgb(43, 43, 43);" >A data request has been made by '.$researcher_email.'</h1>
                        <div class="motivation">
                            <p style="margin-top:20px;margin-bottom:20px;margin-right:20px;margin-left:20px;font-size:20px;text-align:center;color:rgb(43, 43, 43);line-height:1.5;" > '.$motivation.'</p>
                        </div>
                        <div class="link" style="text-align:center;margin-top:20px;margin-bottom:20px;margin-right:20px;margin-left:20px;" >
                            <a href="http://localhost/real-ims-project/webpage/researcher/verify_data_access.php?email='.$researcher_email.'&&code='.$code.'" style="text-decoration:none;display:inline-block;background-color:#669999;background-image:none;background-repeat:repeat;background-position:top left;background-attachment:scroll;color:white;padding-top:10px;padding-bottom:10px;padding-right:20px;padding-left:20px;border-radius:5px;margin-top:10px;margin-bottom:10px;margin-right:10px;margin-left:10px;" >Give data access</a><br>
                            <a href="http://localhost/real-ims-project/webpage/researcher/verify_data_access.php?email='.$researcher_email.'&&code='.$denied.'" style="text-decoration:none;display:inline-block;background-color:#669999;background-image:none;background-repeat:repeat;background-position:top left;background-attachment:scroll;color:white;padding-top:10px;padding-bottom:10px;padding-right:20px;padding-left:20px;border-radius:5px;margin-top:10px;margin-bottom:10px;margin-right:10px;margin-left:10px;" >Deny acces</a>
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
    $mail->addAddress($email);
    $mail->Subject = $subject;
    $mail->Body = $body;
    $mail->IsHTML(true);   
    if ($mail->send()) {
        $message = "Request is sent";
        header("location: ../general/profile_page.php?message=$message");
        //echo "Email is sent!";
    } else {
        header("location: ../general/profile_page.php?error=$mail->ErrorInfo");
        //echo "Something is wrong: <br><br>" . $mail->ErrorInfo;
    }
?>