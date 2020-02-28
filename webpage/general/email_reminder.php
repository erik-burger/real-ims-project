<?php
session_start();
include dirname(__DIR__).'/general/openDB.php';

use PHPMailer\PHPMailer\PHPMailer;

// Check if the user is already logged in
$logedin = $_SESSION["loggedin"];
$user = $_SESSION["user"];
if (isset($logedin) or isset($user)) {
    if ($logedin == 1 and $user == 'D') {
    	$doctor_id = $_SESSION["id"]; //Get doctor id to get patinets later
                    	
		$weekAgo = date('Y-m-d', strtotime("-7 days")); //Get the date that was a week ago
						
		//$sql_emails = "SELECT email FROM patient WHERE patient_id = (SELECT patient_id FROM patient_doctor WHERE doctor_id='$doctor_id' AND both_accept = '1')";
		$patient_ids = "SELECT patient_id FROM patient_doctor WHERE doctor_id='$doctor_id' AND both_accept = '1'";
		$result_patient_ids = mysqli_query($link, $patient_ids) or die("Could not issue sql_email query select patinet for email reminder");
		$no_rows = mysqli_num_rows($result_patient_ids);
					
		//Check if they have taken the test the last 7 days
		if ($no_rows > 0){
			$all_patients = mysqli_fetch_assoc($result_patient_ids); //Create an array with all emails
			
			foreach($all_patients as $patient_id){ //Go through each email and check if a reminder needs to be sent
				$sql_test_date = "SELECT test_date FROM test WHERE patient_id = '$patient_id'"; // Check last testdate;				
				$test_date = mysqli_query($link, $sql_test_date) or die("Could not issue test_date query for email reminder test_date");
				
				if(mysqli_num_rows($test_date)>0){
					//Convert result to an array with dates	
					$dates = array();
					while($row = mysqli_fetch_assoc($test_date)){
						$dates[] = $row;
					}
										
					$last_testdate = max($dates); //Get the last test date
					$last_testdate = date('Y-m-d',strtotime($last_testdate[test_date])); //Converts the string to date format
					
					echo $last_testdate;
					if($weekAgo >= $last_testdate){// If the last test date was 7 days ago from today check last date reminder was sent						
						//Get email reminder date
						$sql_reminder_date = "SELECT last_reminder FROM patient WHERE patient_id = '$patient_id'";
						$result = mysqli_query($link, $sql_reminder_date) or die("Could not issue last_reminder query in emailreminder");
						$result_row = mysqli_fetch_array($result);
						$last_reminder = $result_row['last_reminder'];
												
						if($last_reminder == NULL || $weekAgo > $last_reminder){
							//Send email
							require_once(dirname(__DIR__).'/PHPMailer/PHPMailer.php');
							require_once(dirname(__DIR__).'/PHPMailer/SMTP.php');
							require_once(dirname(__DIR__).'/PHPMailer/Exception.php');
							
							$sql_email = "SELECT email FROM patient WHERE patient_id='$patient_id";
							$email = mysqli_query($link, $sql_email) or die("Could not issue email query");
					
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
							$mail->Port = 465; //587
							$mail->SMTPSecure = "ssl"; //tls
														
							//Email Settings
							$mail->isHTML(true);
							$mail->setFrom("trackzheimers@gmail.com");
							$mail->addAddress($email);
							$mail->Subject = $subject;
							$mail->Body = $body;

							if ($mail->send()) {
								// Set last_reminder to todays date
								$today = date('Y-m-d');
								$sql_update = "UPDATE patient SET last_reminder = '$today' WHERE email = '$email'";
								$update = mysqli_query($link, $sql_update) or die("Could not issue update query");
							} else {
    							echo 'Nononono'; $_POST = array_filter($_POST);
							}		
						}				
					}
				}	
			}
		}
	}
}

header("location: ../general/start_page.php");

include dirname(__DIR__).'/general/closeDB.php';
            	            	
?>





