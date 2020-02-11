<html>
<meta http-equiv="refresh" content="3600;url=logout.php" />
<?php
session_start();
/*if ( isset($_SESSION["id"]) === false) {
    header("location: ../html/php/login.php");
}
*/
?>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="top_menu_style.css">
    </head>
    <body>
        <div class="navbar">
            <a href="../doctor/doctorstart.php">Home</a>
            <a class="active" href="contact.php">Contact</a>
            <a href="../doctor/doctorprofile.php">Profile</a>
            <a href="../doctor/doctorsearch.php">Patients</a>
            <a href="logout.php">Logout</a>          
        </div>

        <img src="logo_grey.png" width="600">
        
        <p>Some text...</p>
        
        <p>email: email@email.com</p>
        <p>telephone: 123456789</p>
        <p>adress: project room ITC</p>

</html>