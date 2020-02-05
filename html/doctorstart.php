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
            <a class="active" href="doctorstart.php">Home</a>
            <a href="contact.php">Contact</a>
            <a href="../html/doctorprofile.php">Profile</a>
            <a href="../html/doctorsearch.php">Patients</a>
            <a href="../html/php/logout.php">Logout</a>          
        </div>

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