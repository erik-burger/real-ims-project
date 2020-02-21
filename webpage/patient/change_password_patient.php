<?php
session_start();
/*Restrict access for other users or not logged*/ 
if (isset($_SESSION["user"]) or isset($_SESSION["loggedin"])) {
    if ($_SESSION["user"] !== "P" or $_SESSION["loggedin"] == false){ // if the user is a patient -> logout
    echo "<script>window.location.href = '../general/login.php';</script>";
    }
} 
?>
<html>
<head>
<link rel="stylesheet" href="../general/IMS_Style.css">
</head>

<body>
    <h1>Change your password</h1>    
    <form action="update_password_patient.php" method="POST">
      
      <p>Please fill in this form to change your password.</p>
      
      <label for="oldpsw"><b>Old Password</b></label>
      <input type="password" value= "" name="oldpsw"><br>

      <label for="newpsw"><b>New Password</b></label>
      <input type="password" value= "" name="newpsw"><br>

      <label for="repeatpsw"><b>Repeat New Password</b></label>
      <input type="password" value= "" name="repeatpsw"><br>
        
      <button type="Submit Changes">Change Password</button>
    
    </form>
    
</body>

</html>
