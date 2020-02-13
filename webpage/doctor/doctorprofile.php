<html>
<meta http-equiv="refresh" content="3600;url=../general/logout.php" />
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="top_menu_style.css">
        <link href="IMS_Style.css" rel="stylesheet">
    </head>

    <body>
        <div class="navbar">
            <a href="doctorstart.php">Home</a>
            <a href="../general/contact.php">Contact</a>
            <a class="active" href="doctorprofile.php">Profile</a>
            <a href="doctorsearch.php">Patients</a>
            <a href="../general/logout.php">Logout</a>          
        </div>

        <h1>Profile</h1>
   

    <?php
        session_start();
       /*if ( isset($_SESSION["id"]) === false) {
        header("location: ../general/login.php");
        }
        */

        include dirname(__DIR__).'../general/openDB.php';
        $result = mysqli_query($link, "select first_name, last_name, doctor_id, phone, street, street_no, zip, city, country 
        from doctor
        where doctor_id = $_SESSION[id]")   
        or 
        die("Could not issue MySQL query"); 
        
        while ($row = $result->fetch_assoc()) {
            $first_name = $row["first_name"];
            $last_name = $row["last_name"];
            $doctor_id = $row["doctor_id"];
            $street = $row["street"];
            $street_no = $row["street_no"];
            $zip = $row["zip"]; 
            $city = $row["city"];
            $country = $row["country"];
            $phone = $row["phone"]; 
     
            echo '<b>'."Name: ".'</b>'.$first_name." ".$last_name.'<br />';
            echo '<b>'."ID: ".'</b>' .$doctor_id.'<br />';
            echo '<b>'."Telephone: ".'</b>'.$phone.'<br />';
            echo '<b>'."Adress: ".'</b>'.$street. " ".$street_no." ".$zip." ".$city." ".$country.'<br />';
        }
        
        include dirname(__DIR__).'../general/closeDB.php';

    ?>

    <p>Change your information <a href="change_info_doctor.php">here</a>.</p>
    <p>Change your password <a href="change_password_doctor.php">here</a>.</p>


    </body>

</html>
