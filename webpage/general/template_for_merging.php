<html>
<?php
session_start();
$logedin = $_SESSION["loggedin"];
$user = $_SESSION["user"];
if (isset($logedin) or isset($user)) {
    if ($logedin == 1) {
        switch ($user) {
            case 'D':
                ?>
                <!--Code-->
                <?php
                break;
            case 'P':
                ?>
                <!--Code-->
                <?php
                break;
            case 'C':
                ?>
                <!--Code-->
                <?php
                break;
            case 'R':
                ?>
                <!--Code-->
                <?php
                break;
        }
    } else {
    echo "<script>window.location.href = '../general/login.php';</script>";
    }
    
}
