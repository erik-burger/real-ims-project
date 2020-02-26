<html>
<meta charset="UTF-utf-8">
<meta name="description" content="Statistics page for patients">
<title>Trackzheimers</title>
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
    .newbutton{
        background-color: #669999; 
        border: none;
        color: white;
        padding: 14px 10px;
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
p{font-size:1em}
</style>
</html>
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
                        $chat_message = htmlspecialchars($_POST["message"]);
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
                    <meta charset="UTF-8">
                            <meta name="viewport" content="width=device-width, initial-scale=1">
                            <link rel="stylesheet" href="top_menu_style.css">
                            <link href="IMS_Style.css" rel="stylesheet">
                        <body>
                        <nav class="navbar navbar-inverse">
                            <div class="container-fluid">
                                <div class="navbar-header">
                                    <img class="logo" src="../general/logo_small.png" width = 50>
                                </div>
                                <ul class="nav navbar-nav">
                                <li class="active"><a href="doctorstart.php">Home</a></li>
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
                        <br><br>
                    <?php
                    $chat_message_id = $_GET["chat_id"];
                    include dirname(__DIR__).'/general/openDB.php';

                    $update = mysqli_query($link, "update chat set message_status = 1 where chat_message_id = $chat_message_id")
                    or die("Could not issue 1");

                    $sql =  "select c.from_user_id, c.from_user_type, c.chat_message, c.date_time, p.first_name, p.last_name 
                    from chat c join patient p on c.from_user_id = p.patient_id where chat_message_id = $chat_message_id"; //change status to read and fetch data 
                    $result = mysqli_query($link, $sql)
                    or die("Could not issue MySQL query");

                    include dirname(__DIR__).'/general/closeDB.php';

                    while($row = $result->fetch_assoc()) {
                        $from_user_id = $row["from_user_id"];
                        $first_name = $row["first_name"];
                        $last_name = $row["last_name"];
                        echo "<label style = 'position:absolute;left:13%'><b>From:</b></label><br><p style = 'position:absolute;left:13%'>" . $first_name . " " . $last_name . "</p><br><br>
                        <label style = 'position:absolute;left:13%'><b>Date and Time:</b></label><br><p style = 'position:absolute;left:13%'> ". $row["date_time"] . "</p><br><br>
                        <label style = 'position:absolute;left:13%'><b>Message: </b></label><br><p style = 'position:absolute;left:13%'>". $row["chat_message"] . "</p><br>";
                    }
                    ?>
                    <br>
                    <div class="center">
                        <form action="" method="post">
                        <label for="send_to" style = "position:absolute;left:13%"><b>Reply to:</b></label><br>
                        <select name = "send_to" style = "position:absolute;left:13%" required>
                            <?php print "<option value='$from_user_id'>" . $first_name . " " . $last_name . "</option>";?>
                            </select><br><br<><br><br><br>
                            <textarea name="message" id="message" style = "height:200px;width:1000px;position:absolute;left:13%"></textarea><br />
                            <button class = newbutton type="submit"  name="submit" value="submit">Reply</button>
                        </form>
                    </div>
                    </div>
                    </body>
                    </html>
                <?php
                break;
            case 'P':
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
                        <body><br><br>
                        <?php
                        if(isset($_POST["submit"])){
                        include dirname(__DIR__).'/general/openDB.php';

                        $from_user_id = $_SESSION["id"];
                        $from_user_type = $_SESSION["user"];
                        $previous_chat_id = htmlspecialchars($_POST["send_to"]);
                        $previous_chat_id = mysqli_real_escape_string($link, $previous_chat_id);
                        $chat_message = htmlspecialchars($_POST["message"]);
                        $chat_message = mysqli_real_escape_string($link, $chat_message);
                        $date_time = gmdate('Y-m-d h:i:s \G\M\T');
                        $message_status = 0;

                        $sql = "select from_user_id, from_user_type from chat where chat_message_id = $previous_chat_id";
                        $result = mysqli_query($link, $sql)
                        or die("Could not issue MySQL query");
                        while($row = $result->fetch_assoc()) {
                            $to_user_id = $row["from_user_id"];
                            $to_user_type = $row["from_user_type"];
                        }
                        $sendchat = mysqli_query($link, "insert into chat 
                        (from_user_id, from_user_type, to_user_id, to_user_type, chat_message, date_time, message_status) values 
                        ($from_user_id, '$from_user_type', $to_user_id, '$to_user_type', '$chat_message', '$date_time', '$message_status')")
                        or die("Could not issue MySQL query");

                        include dirname(__DIR__).'/general/closeDB.php';

                        header("location: chat_home.php");}

                        ?>
                        <?php
                        $chat_message_id = $_GET["chat_id"];
                        include dirname(__DIR__).'/general/openDB.php';

                        $update = mysqli_query($link, "update chat set message_status = 1 where chat_message_id = $chat_message_id")
                        or die("Could not issue 1");
                        $typesql = mysqli_query($link, "select from_user_type from chat where chat_message_id = $chat_message_id")
                        or die("Could not issue 2");
                        $from_user_type = mysqli_fetch_assoc($typesql)["from_user_type"];

                        if($from_user_type == "D"){
                            $sql =  "select c.from_user_id, c.from_user_type, c.chat_message, c.date_time, d.first_name, d.last_name 
                            from chat c join doctor d on c.from_user_id = d.doctor_id where chat_message_id = $chat_message_id"; //change status to read and fetch data 
                            $result = mysqli_query($link, $sql)
                            or die("Could not issue MySQL query");
                        }elseif($from_user_type == "C"){
                            $sql =  "select c.from_user_id, c.from_user_type, c.chat_message, c.date_time, ca.first_name, ca.last_name 
                            from chat c join caregiver ca on c.from_user_id = ca.caregiver_id where chat_message_id = $chat_message_id"; //change status to read and fetch data 
                            $result = mysqli_query($link, $sql)
                            or die("Could not issue MySQL query");
                        }
                        include dirname(__DIR__).'/general/closeDB.php';

                        while($row = $result->fetch_assoc()) {
                            $first_name = $row["first_name"];
                            $last_name = $row["last_name"];
                            echo "<label style = 'position:absolute;left:13%'><b>From:</b></label><br><p style = 'position:absolute;left:13%'>" . $first_name . " " . $last_name . "</p><br><br>
                            <label style = 'position:absolute;left:13%'><b>Date and Time:</b></label><br><p style = 'position:absolute;left:13%'> ". $row["date_time"] . "</p><br><br>
                            <label style = 'position:absolute;left:13%'><b>Message: </b></label><br><p style = 'position:absolute;left:13%'>". $row["chat_message"] . "</p><br>";
                        }
                        ?>
                        <br>
                        <div class="center">
                            <form action="" method="post">
                            <label for="send_to" style = "position:absolute;left:13%"><b>Reply to:</b></label><br>
                            <select name = "send_to" style = "position:absolute;left:13%" required>
                                <?php print "<option value='$chat_message_id'>" . $first_name . " " . $last_name . "</option>";?>
                            </select><br><br<><br><br><br>
                                <textarea name="message" id="message" style = "height:200px;width:1000px;position:absolute;left:13%"></textarea><br />
                                <button class = newbutton type="submit" value="submit" name = "submit">Reply</button>
                            </form>
                        </div>
                        </div>
                        </body>
                        </html>
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
                    $chat_message = htmlspecialchars($_POST["message"]);
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
                    <?php
                    /*Restrict access for other users or not logged*/ 
                    if (isset($_SESSION["user"]) or isset($_SESSION["loggedin"])) {
                        if ($_SESSION["user"] !== "C" or $_SESSION["loggedin"] == false){ // if the user is a patient -> logout
                        echo "<script>window.location.href = '../general/login.php';</script>";
                        }
                    } 
                    ?>

                    <html>
                    <meta charset="UTF-8">
                            <meta name="viewport" content="width=device-width, initial-scale=1">
                            <link rel="stylesheet" href="top_menu_style.css">
                            <link rel="stylesheet" href="../general/IMS_Style.css">
                            
                            <nav class="navbar navbar-inverse">
                            <div class="container-fluid">
                                <div class="navbar-header">
                                    <img class="logo" src="../general/logo_small.png" width = 50>
                                    <ul class="nav navbar-nav">
                                    <li><a href="caregiverstart.php">Home</a></li> 
                                    <li><a href="../general/contact.php">Contact</a></li>
                                    <li><a href="caregiverprofile.php">Profile</a></li>
                                    <li class="active"><a href="chat_home.php">Messages</a></li>            
                                    </ul>
                                    <ul class="nav navbar-nav navbar-right">
                                    <li><a href="../general/logout.php">Logout</a></li>
                                </ul>
                            </div>
                        </nav>
                    <body><br><br>
                    <?php
                    $chat_message_id = $_GET["chat_id"];
                    include dirname(__DIR__).'/general/openDB.php';

                    $update = mysqli_query($link, "update chat set message_status = 1 where chat_message_id = $chat_message_id")
                    or die("Could not issue 1");

                    $sql =  "select c.from_user_id, c.from_user_type, c.chat_message, c.date_time, p.first_name, p.last_name 
                    from chat c join patient p on c.from_user_id = p.patient_id where chat_message_id = $chat_message_id"; //change status to read and fetch data 
                    $result = mysqli_query($link, $sql)
                    or die("Could not issue MySQL query");

                    include dirname(__DIR__).'/general/closeDB.php';

                    while($row = $result->fetch_assoc()) {
                        $from_user_id = $row["from_user_id"];
                        $first_name = $row["first_name"];
                        $last_name = $row["last_name"];
                        echo "<label style = 'position:absolute;left:13%'><b>From:</b></label><br><p style = 'position:absolute;left:13%'>" . $first_name . " " . $last_name . "</p><br><br>
                        <label style = 'position:absolute;left:13%'><b>Date and Time:</b></label><br><p style = 'position:absolute;left:13%'> ". $row["date_time"] . "</p><br><br>
                        <label style = 'position:absolute;left:13%'><b>Message: </b></label><br><p style = 'position:absolute;left:13%'>". $row["chat_message"] . "</p><br>";
                    }
                    ?>
                    <br>
                    <div class="center">
                        <form action="" method="post">
                        <label for="send_to" style = "position:absolute;left:13%"><b>Reply to:</b></label><br>
                        <select name = "send_to" style = "position:absolute;left:13%" required>
                            <?php print "<option value='$from_user_id'>" . $first_name . " " . $last_name . "</option>";?>
                            </select><br><br<><br><br><br>
                            <textarea name="message" id="message" style = "height:200px;width:1000px;position:absolute;left:13%"></textarea><br />
                            <button class = newbutton type="submit" name = "submit" value="submit">Reply</button>
                        </form>
                    </div>
                    </div>
                    </body>
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
