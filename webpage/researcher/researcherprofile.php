    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="top_menu_style.css">
    </head>

    <body>
        <div class="navbar">
            <a href="researcherstart.php">Home</a>
            <a class="active" href="researcherprofile.php">Profile</a>
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
        $result = mysqli_query($link, "select first_name, last_name, researcher_id, phone, street, street_no, zip, city, country 
        from researcher
        where researcher_id = $_SESSION[id]")   
        or 
        die("Could not issue MySQL query"); 
        
        while ($row = $result->fetch_assoc()) {
            $first_name = $row["first_name"];
            $last_name = $row["last_name"];
            $researcher_id = $row["researcher_id"];
            $street = $row["street"];
            $street_no = $row["street_no"];
            $zip = $row["zip"]; 
            $city = $row["city"];
            $country = $row["country"];
            $phone = $row["phone"]; 
     
            echo '<b>'."Name: ".'</b>'.$first_name." ".$last_name.'<br />';
            echo '<b>'."ID: ".'</b>' .$researcher_id.'<br />';
            echo '<b>'."Telephone: ".'</b>'.$phone.'<br />';
            echo '<b>'."Adress: ".'</b>'.$street. " ".$street_no." ".$zip." ".$city." ".$country.'<br />';
        }
        
        include dirname(__DIR__).'../general/closeDB.php';

    ?>

    <p>Change your information <a href="change_info_researcher.php">here</a>.</p>

    </body>

</html>