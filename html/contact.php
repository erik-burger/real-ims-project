<html>

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
            <a href="doctorstart.php">Home</a>
            <a class="active" href="contact.php">Contact</a>
            <a href="../html/doctorprofile.php">Profile</a>
            <a href="../html/doctorsearch.php">Patients</a>
            <a href="../html/php/logout.php">Logout</a>          
        </div>

        <h1>TRACKZHIMERS LOGO</h1>
        
        <p>Some text...</p>
        
        <p>email: email@email.com</p>
        <p>telephone: 123456789</p>
        <p>adress: project room ITC</p>

</html>