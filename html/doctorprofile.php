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
            <a class="active" href="doctorprofile.html">Profile</a>
            <a href="../html/doctorsearch.php">Patients</a>
            <a href="login.html">Logout</a>          
        </div>

    <?php
        include "../html/php/openDB.php";
        $result = mysqli_query($link,"select first_name, 
        last_name, 
        doctor_id, 
        telephone, 
        street, 
        street_no, 
        city, 
        country, 
        from doctor
        where doctor_id = 1")   
        or 
        die("Could not issue MySQL query"); 
        
        while ($row = $result->fetch_assoc()) {
            $field1name = $row["col1"];
            $field2name = $row["col2"];
            $field3name = $row["col3"];
            $field4name = $row["col4"];
            $field5name = $row["col5"];
     
            echo '<b>'.$field1name.$field2name.'</b><br />';
            echo $field5name.'<br />';
            echo $field5name.'<br />';
            echo $field5name;
        }
        
        include "../html/php/closeDB.php";

    ?>
        <h1>Profile</h1>
        <p>Name: Dr Doctor</p>
        <p>Telephone: 12345678</p>
        <p>Adress: Doctorstreet 123</p>

    </body>

</html>
