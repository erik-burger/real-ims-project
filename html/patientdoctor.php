<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="top_menu_style.css">
</head>

<body>
    <div class="navbar">
        <a href="doctorstart.html">Home</a>
        <a href="contact.html">Contact</a>
        <a href="../html/doctorprofile.php">Profile</a>
        <a href="../html/doctorsearch.php">Patients</a>
        <a href="login.html">Logout</a>          
    </div>

<img src="logo.jpg" width = "250" height = "133" alt = "Trackzheimers logo"><br>

<h1>Patient Profile</h1>

<?php
        include "../html/php/openDB.php";
        $result = mysqli_query($link,"select * 
        from patient
        where patient_id = 1")   
        or 
        die("Could not issue MySQL query"); 
        
        while ($row = $result->fetch_assoc()) {
            $first_name = $row["first_name"];
            $last_name = $row["last_name"];
            $patient_id = $row["patient_id"];
            $street = $row["street"];
            $street_no = $row["street_no"];
            $zip = $row["zip"]; 
            $city = $row["city"];
            $country = $row["country"];
            $phone = $row["phone"]; 
            $desc = $row["diagnosis_description"]; 
            $gender = $row["gender"]; 
            $stage = $row["stage"]; 
     
            echo '<b>'."Name: ".'</b>'.$first_name." ".$last_name.'<br/>';
            echo '<b>'."ID: ".'</b>' .$patient_id.'<br/>';
            echo '<b>'."Telephone: ".'</b>'.$phone.'<br/>';
            echo '<b>'."Adress: ".'</b>'.$street. " ".$street_no." ".$zip." ".$city." ".$country.'<br />';
            echo '<h3>'."About".'</h3>';
            echo $desc.'<br/>';
            echo '<b>'."Stage: ".'</b>' .$stage.'<br/>';
        }
 ?>

<h3>Statistics</h3>
<p>Aenean vel fermentum arcu. Duis dignissim varius rutrum. Suspendisse sit amet vehicula mauris. Suspendisse quis rhoncus lectus, id posuere augue. Quisque eget interdum ante, eu volutpat turpis. Morbi ac diam vitae mi hendrerit tempus. Phasellus laoreet nisi ut lobortis venenatis. Nullam ac rhoncus erat, et scelerisque turpis. Nulla vestibulum est in quam mollis gravida. Duis tincidunt ultricies euismod. In posuere nunc a lobortis dapibus. Integer ornare imperdiet auctor. Sed eu semper massa. Curabitur ac ante odio. </p>

</body>
</html>