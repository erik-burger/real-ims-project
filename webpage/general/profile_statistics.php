<html>
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
<link rel="stylesheet" href="top_menu_style.css">
<link href="IMS_Style.css" rel="stylesheet">

<?php
session_start();
$logedin = $_SESSION["loggedin"];
$user = $_SESSION["user"];
if (isset($logedin) or isset($user)) {
    if ($logedin == 1) {
        switch ($user) {
            case 'D':
                ?>
                <body>
                    <nav class="navbar navbar-inverse">
                            <div class="container-fluid">
                                <div class="navbar-header">
                                    <img class="logo" src="../general/logo_small.png" width = 50>
                                </div>
                                <ul class="nav navbar-nav">
                                <li><a href="../general/start_page.php">Home</a></li>
                                <li><a href="../general/contact.php">Contact</a></li>
                                <li><a href="../general/profile_page.php">Profile</a></li>
                                <li class="active"><a href="../doctor/doctorsearch.php">Patients</a></li>
                                <li><a href="chat_home.php">Messages</a></li>
                            </ul>
                                <ul class="nav navbar-nav navbar-right">
                                    <li><a href="../general/logout.php">Logout</a></li>
                                </ul>
                            </div>
                        </nav>
                        <?php include dirname(__DIR__).'/general/patient_statistics.php'; ?> 
                    </body>
                <?php
                break;
            case 'C':
                ?>
                <body>
                <nav class="navbar navbar-inverse">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <img class="logo" src="../general/logo_small.png" width = 50>
                                <ul class="nav navbar-nav">
                                <li><a href="../general/start_page.php">Home</a></li> 
                                <li><a href="../general/contact.php">Contact</a></li>
                                <li class="active"><a href="../general/profile_page.php">Profile</a></li>            
                                <li><a href="chat_home.php">Messages</a></li>    
                              </ul>
                                <ul class="nav navbar-nav navbar-right">
                                <li><a href="../general/logout.php">Logout</a></li>
                            </ul>
                        </div>
                    </nav>                    
                  <?php include dirname(__DIR__).'/general/patient_statistics.php'; ?> 
                </body>
                <?php
            break;
        }
    } else {
    echo "<script>window.location.href = '../general/login.php';</script>";
    }
    
}
