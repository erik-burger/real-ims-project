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
        
        <p>Some text...</p>
        
        <p>email: email@email.com</p>
        <p>telephone: 123456789</p>
        <p>adress: project room ITC</p>

</html>