<!DOCTYPE html>
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
            table, th, td {
                padding: 15px; 
                border: 1px white;
                border-collapse: collapse;
                border-bottom: 1px solid #ddd;
                border-top: 1px solid #ddd;
                Text-align: center;
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
            <li><a href="doctorstart.php">Home</a></li>
            <li><a href="../general/contact.php">Contact</a></li>
            <li><a href="doctorprofile.php">Profile</a></li>
            <li><a href="doctorsearch.php">Patients</a></li>
            <li class="active"><a href="chat_home_doctor.php">Messages</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="../general/logout.php">Logout</a></li>
            </ul>
        </div>
    </nav>
<h1>Send a message</h1>

<form id="send-message" action="chat_send_doctor.php" method="post" align = "center">
<label for="send_to"><b>To:</b></label><br>
      <select name = "send_to" form = "send-message" required>
        <?php
        session_start();
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
        ?> </select><br><br<>
    <label for="sendie"><b>Your message:</b></label><br>
    <textarea name="sendie" maxlength = '100'></textarea>
    <button type="submit">Send</button>
        </div>
</form>
    

</html>