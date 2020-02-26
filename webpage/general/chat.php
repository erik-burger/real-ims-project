<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="top_menu_style.css">
<link href="IMS_Style.css" rel="stylesheet">
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
    .newbutton{
        background-color: #669999; 
        border: none;
        color: white;
        padding: 14px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px; 
        position:absolute;
        right:13%;
        top: 90%;        
    }      
    * {
    box-sizing: border-box;
    }

    .column {
    float: left;
    width: 50%;
    padding: 10px;
    height: 300px; 
    }

    .page:after {
    content: "";
    display: table;
    clear: both;
    }  

    input[type = text], select , textarea{
    padding: 15px;
    border: 1px solid #ccc;
    border-radius; 4px;
    }
    
</style>
</head>
<?php
session_start();
$logedin = $_SESSION["loggedin"];
$user = $_SESSION["user"];
if (isset($logedin) or isset($user)) {
    if ($logedin == 1) {
        switch ($user) {
            case 'D':
                ?>
                <!DOCTYPE html>
                    <?php
                    /*Restrict access for other users or not logged*/ 
                    if (isset($_SESSION["user"]) or isset($_SESSION["loggedin"])) {
                        if ($_SESSION["user"] !== "D" or $_SESSION["loggedin"] == false){ // if the user is a patient -> logout
                        echo "<script>window.location.href = '../general/login.php';</script>";
                        }
                    } 
                    ?>
                    <?php
                    if(isset($_POST["submit"])){
                        include dirname(__DIR__).'/general/openDB.php';

                        $from_user_id = $_SESSION["id"];
                        $from_user_type = $_SESSION["user"];
                        $to_user_id = htmlspecialchars($_POST["send_to"]);
                        $to_user_id = mysqli_real_escape_string($link, $to_user_id);
                        $to_user_type = "P";
                        $chat_message = htmlspecialchars($_POST["sendie"]);
                        $chat_message = mysqli_real_escape_string($link, $chat_message);
                        $date_time = gmdate('Y-m-d h:i:s \G\M\T');
                        $message_status = 0;

                        $sendchat = mysqli_query($link, "insert into chat 
                        (from_user_id, from_user_type, to_user_id, to_user_type, chat_message, date_time, message_status) values 
                        ($from_user_id, '$from_user_type', $to_user_id, '$to_user_type', '$chat_message', '$date_time', '$message_status')")
                        or die("Could not issue MySQL query");

                        include dirname(__DIR__).'/general/closeDB.php';

                        header("location: chat_home.php");
                    }
                    ?>
                    <html>
                    
                        <body>


                        <nav class="navbar navbar-inverse">
                            <div class="container-fluid">
                                <div class="navbar-header">
                                    <img class="logo" src="../general/logo_small.png" width = 50>
                                </div>
                                <ul class="nav navbar-nav">
                                <li><a href="doctorstart.php">Home</a></li>
                                <li><a href="../general/contact.php">Contact</a></li>
                                <li><a href="doctorprofile.php">Profile</a></li>
                                <li><a href="doctorsearch.php">Patients</a></li>
                                <li class="active"><a href="chat_home.php">Messages</a></li>
                                </ul>
                                <ul class="nav navbar-nav navbar-right">
                                    <li><a href="../general/logout.php">Logout</a></li>
                                </ul>
                            </div>
                        </nav>
                    <h1>Send a message</h1>

                    <form id="send-message" action="" method="post" align = "center">
                    <label for="send_to" style = "position:absolute;left:13%"><b>To:</b></label><br>
                        <select name = "send_to" style = "position:absolute;left:13%" form = "send-message" required>
                            <?php
                        
                            include dirname(__DIR__).'/general/openDB.php';

                            $sql = "select p.patient_id, p.first_name, p.last_name from patient_doctor pd
                            join patient p on p.patient_id = pd.patient_id
                            where pd.doctor_id = $_SESSION[id]";
                            $result = mysqli_query($link, $sql) 
                            or die("Could not issue MySQL query");

                            while ($row = mysqli_fetch_assoc($result)) {
                                $patient_id = $row["patient_id"];
                                $first_name = $row["first_name"];
                                $last_name = $row["last_name"];
                                print "<option value='$patient_id'>$first_name $last_name</option>";}
                            include dirname(__DIR__).'/general/closeDB.php';
                            ?> </select><br><br<><br><br><br>
                        <label for="sendie" style = "position:absolute;left:13%"><b>Your message:</b></label><br>
                        <textarea name="sendie" maxlength = '100' style="height:300px;width:1000px;position:absolute;left:13%"></textarea>
                        <button type="submit" name="submit" value="submit" class = newbutton>Send</button>
                            </div>
                    </form>
                        

                    </html>
                <?php
                break;
            case 'P':
                ?>
                 <?php
                 if(isset($_POST["submit"])){
                        include dirname(__DIR__).'/general/openDB.php';
                            $from_user_id = $_SESSION["id"];
                            $from_user_type = $_SESSION["user"];
                            $email = htmlspecialchars($_POST["send_to"]);
                            $email = mysqli_real_escape_string($link, $email);
                            $chat_message = htmlspecialchars($_POST["sendie"]);
                            $chat_message = mysqli_real_escape_string($link, $chat_message);
                            $date_time = gmdate('Y-m-d h:i:s');
                            $message_status = 0;

                            $doctorsql = "select doctor_id from doctor where email = '$email'";
                            $doctorresult = mysqli_query($link, $doctorsql)
                            or die("Could not issue doctor MySQL query");
                            $count1 = mysqli_num_rows($doctorresult);

                            if($count1 == 1) { //if the query returns 1 result proceed to send to doctor
                                $to_user_id = mysqli_fetch_assoc($doctorresult)["doctor_id"];
                                $to_user_type = "D";
                            }else{
                                $caregiversql = "select caregiver_id from caregiver where email = '$email'";
                                $caregiverresult = mysqli_query($link, $caregiversql)
                                or die("Could not issue MySQL query");
                                $coun2 = mysqli_num_rows($caregiverresult);

                                if($coun2 == 1) {
                                    $to_user_id = mysqli_fetch_assoc($caregiverresult)["caregiver_id"];
                                    $to_user_type = "C";
                                }
                            }
                            $sendchat = mysqli_query($link, "insert into chat 
                            (from_user_id, from_user_type, to_user_id, to_user_type, chat_message, date_time, message_status) values 
                            ($from_user_id, '$from_user_type', $to_user_id, '$to_user_type', '$chat_message', '$date_time', '$message_status')")
                            or die("Could not issue MySQL query");

                            include dirname(__DIR__).'/general/closeDB.php';

                            header("location: chat_home.php");}

                            ?>

                    <!DOCTYPE html>
                    <?php
                    /*Restrict access for other users or not logged*/ 
                    if (isset($_SESSION["user"]) or isset($_SESSION["loggedin"])) {
                        if ($_SESSION["user"] !== "P" or $_SESSION["loggedin"] == false){ // if the user is a patient -> logout
                        echo "<script>window.location.href = '../general/login.php';</script>";
                        }
                    } 
                    ?>

                    <html>
                    <meta http-equiv="refresh" content="3600;url=../general/logout.php" />
                            <nav class="navbar navbar-inverse">
                            <div class="container-fluid">
                                <div class="navbar-header">
                                    <img class="logo" src="../general/logo_small.png" width = 50>
                                </div>
                                <ul class="nav navbar-nav">
                                <li class="active"><a href="../general/start_page.php">Home</a></li>            
                                </ul>
                                <ul class="nav navbar-nav navbar-right">
                                    <li><a href="../general/logout.php">Logout</a></li>
                                </ul>
                            </div>
                        </nav>
                    <h1>Send a message</h1>

                    <form id="send-message" action="" method="post">
                    <label for="send_to" style = "position:absolute;left:13%"><b>To:</b></label><br>
                        <select name = "send_to" style = "position:absolute;left:13%" form = "send-message" required>
                            <?php
                            
                            include dirname(__DIR__).'/general/openDB.php';
                            $sql = "select pd.doctor_id as id, d.first_name, d.last_name, d.email from patient_doctor pd
                            join doctor d on d.doctor_id = pd.doctor_id
                            where pd.patient_id = $_SESSION[id]
                            union
                            select pc.caregiver_id as id, c.first_name, c.last_name, c.email from patient_caregiver pc
                            join caregiver c on c.caregiver_id = pc.caregiver_id
                            where pc.patient_id = $_SESSION[id]";///two queries for doctor and caregiver I guess
                            $result = mysqli_query($link, $sql) 
                            or die("Could not issue MySQL query");

                            while ($row = mysqli_fetch_assoc($result)) {
                                $id = $row["id"];
                                $first_name = $row["first_name"];
                                $last_name = $row["last_name"];
                                $email = $row["email"];
                                print "<option value='$email'>$first_name $last_name</option>";}
                            include dirname(__DIR__).'/general/closeDB.php';
                            ?> </select><br><br<><br><br><br>
                        <label for="sendie" style = "position:absolute;left:13%"><b>Your message:</b></label><br>
                        <textarea name="sendie" style = "height:300px;width:1000px;position:absolute;left:13%"></textarea><br>
                        <button type="submit" value = "submit" name = "submit" class = newbutton>Send</button>
                            </div>
                    </form>
                    </html>
                <!--Code-->
                <?php
                break;
            case 'C':
                ?>
                    <!DOCTYPE html>
                    <?php
                    /*Restrict access for other users or not logged*/ 
                    if (isset($_SESSION["user"]) or isset($_SESSION["loggedin"])) {
                        if ($_SESSION["user"] !== "C" or $_SESSION["loggedin"] == false){ // if the user is a patient -> logout
                        echo "<script>window.location.href = '../general/login.php';</script>";
                        }
                    } 
                    ?>
                    <?php
                    if(isset($_POST["submit"])){
                    include dirname(__DIR__).'/general/openDB.php';

                    $from_user_id = $_SESSION["id"];
                    $from_user_type = $_SESSION["user"];
                    $to_user_id = htmlspecialchars($_POST["send_to"]);
                    $to_user_id = mysqli_real_escape_string($link, $to_user_id);
                    $to_user_type = "P";
                    $chat_message = htmlspecialchars($_POST["sendie"]);
                    $chat_message = mysqli_real_escape_string($link, $chat_message);
                    $date_time = gmdate('Y-m-d h:i:s \G\M\T');
                    $message_status = 0;

                    $sendchat = mysqli_query($link, "insert into chat 
                    (from_user_id, from_user_type, to_user_id, to_user_type, chat_message, date_time, message_status) values 
                    ($from_user_id, '$from_user_type', $to_user_id, '$to_user_type', '$chat_message', '$date_time', '$message_status')")
                    or die("Could not issue MySQL query");

                    include dirname(__DIR__).'/general/closeDB.php';

                    header("location: chat_home.php");
                    }
                    ?>

                    <html>
                    <meta charset="UTF-utf-8">
                        <meta name="description" content="Statistics page for patients">
                        <title>Trackzheimers</title>
                        <link rel="stylesheet" href="top_menu_style.css">
                        <link rel="stylesheet" href="../general/IMS_Style.css">
                        
                            <nav class="navbar navbar-inverse">
                            <div class="container-fluid">
                                <div class="navbar-header">
                                    <img class="logo" src="../general/logo_small.png" width = 50>
                                    <ul class="nav navbar-nav">
                                    <li class="active"><a href="caregiverstart.php">Home</a></li> 
                                    <li><a href="../general/contact.php">Contact</a></li>
                                    <li><a href="caregiverprofile.php">Profile</a></li>
                                    <li><a href="chat_home.php">Messages</a></li>            
                                    </ul>
                                    <ul class="nav navbar-nav navbar-right">
                                    <li><a href="../general/logout.php">Logout</a></li>
                                </ul>
                            </div>
                        </nav>
                    <h1>Send a message</h1>

                    <form id="send-message" action="" method="post">
                    <label for="send_to" style = "position:absolute;left:13%"><b>To:</b></label><br>
                        <select name = "send_to" style = "position:absolute;left:13%" form = "send-message" required>
                            <?php
                            include dirname(__DIR__).'/general/openDB.php';

                            $sql = "select p.patient_id, p.first_name, p.last_name from patient_caregiver pd
                            join patient p on p.patient_id = pd.patient_id
                            where pd.caregiver_id = $_SESSION[id]";
                            $result = mysqli_query($link, $sql) 
                            or die("Could not issue MySQL query");

                            while ($row = mysqli_fetch_assoc($result)) {
                                $patient_id = $row["patient_id"];
                                $first_name = $row["first_name"];
                                $last_name = $row["last_name"];
                                print "<option value='$patient_id'>$first_name $last_name</option>";}
                            include dirname(__DIR__).'/general/closeDB.php';
                            ?> </select><br><br<><br><br><br>
                        <label for="sendie" style = "position:absolute;left:13%"><b>Your message:</b></label><br>
                        <textarea name="sendie" maxlength = '100' style="height:300px;width:1000px;position:absolute;left:13%"></textarea>
                        <button type="submit" value = "submit" name = "submit" class=newbutton>Send</button>
                            </div>
                    </form>        
                    </html>
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
?>

</html>