<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="top_menu_style.css">
    </head>

    <body>
        <div class="navbar">
            <a href="doctorstart.html">Home</a>
            <a href="contact.html">Contact</a>
            <a class="active" href="../html/doctorprofile.php">Profile</a>
            <a href="../html/doctorsearch.php">Patients</a>
            <a href="login.html">Logout</a>          
        </div>

        <h1>Profile</h1>

    <?php
        include dirname(__DIR__).'\php\openDB.php';
        $result = mysqli_query($link,"select first_name, last_name, doctor_id, phone, street, street_no, zip, city, country 
        from doctor
        where doctor_id = 1")   
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
        
        include dirname(__DIR__).'\php\closeDB.php';

    ?>

    <p>Change your information <a href="#">here</a>.</p>

    </body>

</html>
