<html>
<meta http-equiv="refresh" content="3600;url=../general/logout.php" />
<?php
session_start();
/*if ( isset($_SESSION["user"]) == "R") { // if the user is a patient -> logout
    $_SESSION = array();
    session_destroy();
    header("location: ../general/login.php");
} elseif( isset($_SESSION["user"]) === false) { // if no user is logged in -> login page
    header("location: ../html/php/login.php");
}
*/
?>

<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="top_menu_style.css">
        <link rel="stylesheet" href="../general/IMS_Style.css">
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
            hr {
                border: 10px solid ghostwhite;
            }
        </style>
    </head>

    <body>

        <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <img class="logo" src="../general/logo_small.png" width = 50>
                <ul class="nav navbar-nav">
                <li class="active"><a href="researcherstart.php">Home</a></li> 
                <li><a href="researcherprofile.php">Profile</a></li>            
                </ul>
                <ul class="nav navbar-nav navbar-right">
                <li><a href="../general/logout.php">Logout</a></li>
            </ul>
        </div>
    </nav>


        <h1>TRACKZHEIMERS LOGO</h1>

        <h2>Information...</h2>
        <p1>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque urna justo, sagittis in bibendum vitae, auctor in ex. Nullam posuere, ex nec condimentum accumsan, sapien erat interdum erat, mattis accumsan tellus erat in tortor. Suspendisse a varius risus. Maecenas consectetur ligula elit, laoreet pharetra eros suscipit eget. Nunc molestie finibus mattis. Mauris quam lorem, placerat nec consequat a, laoreet vitae lorem. Donec a est at neque posuere varius quis consectetur orci. Phasellus justo justo, ornare ac elementum vel, dignissim ac lacus. Nam interdum nisl in neque molestie rutrum.
        </p1>
        <h2>News</h2>
        <p1>
            Nullam blandit ut enim a ornare. Etiam laoreet, elit at euismod euismod, dui turpis lobortis nisi, eget accumsan felis nunc ac turpis. Aenean vitae blandit lorem. Sed tempor quam a tempus varius. Pellentesque feugiat, eros ac eleifend hendrerit, tellus sapien tempus dui, non aliquam elit ex ac odio. Donec sapien est, laoreet at tincidunt aliquam, accumsan quis est. Vestibulum vestibulum ultrices nisi. Nullam tristique finibus risus, ut luctus enim consectetur non.
        </p1>

    </body>
</html>