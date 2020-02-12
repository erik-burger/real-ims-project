<html>
<meta http-equiv="refresh" content="3600;url=../general/logout.php" /> 
<style>
    table, th, td {
        border: 1px #c2d6d6;
        border-collapse: collapse;
}
</style>

<?php
session_start();
/*if ( isset($_SESSION["user"]) == "P") { // if the user is a patient -> logout
    $_SESSION = array();
    session_destroy();
    header("location: ../general/login.php");
} elseif( isset($_SESSION["user"]) === false) { // if no user is logged in -> login page
    header("location: ../html/php/login.php");
}
*/

?>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="top_menu_style.css">
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
            <li class="active"><a href="doctorstart.php">Home</a></li>
            <li><a href="../general/contact.php">Contact</a></li>
            <li><a href="doctorsearch.php">Patients</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="../general/logout.php">Logout</a></li>
            </ul>
        </div>
    </nav>

        <img src="../general/logo_grey.png" width="400">

        <h1>Information...</h1>
        <p1>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque urna justo, sagittis in bibendum vitae, auctor in ex. Nullam posuere, ex nec condimentum accumsan, sapien erat interdum erat, mattis accumsan tellus erat in tortor. Suspendisse a varius risus. Maecenas consectetur ligula elit, laoreet pharetra eros suscipit eget. Nunc molestie finibus mattis. Mauris quam lorem, placerat nec consequat a, laoreet vitae lorem. Donec a est at neque posuere varius quis consectetur orci. Phasellus justo justo, ornare ac elementum vel, dignissim ac lacus. Nam interdum nisl in neque molestie rutrum.
        </p1>
        <h1>Latest Updates</h1>
            
    <table style="width:70%" align="center">
    <tr>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Total Score</th>
    <th>Test Date</th>
    <th>ID</th>
    </tr>

<?php 
    $id = $_SESSION['id']; 
    include dirname(__DIR__).'../general/openDB.php';
    $result = mysqli_query($link,"select t.patient_id, p.first_name, p.last_name, t.total_score, max(t.test_date) as test_date
    from test as t, patient as p, patient_doctor as p_d
    where p.patient_id = t.patient_id = p_d.patient_id and p_d.doctor_id = '$id' 
    group by t.patient_id")   
    or 
    die("Could not issue MySQL query"); 
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $p_id = $row["patient_id"];
            echo "<tr><td>" . $row["first_name"]. "</td>
            <td>" . $row["last_name"] . "</td>
            <td>" . $row["total_score"] . "</td>
            <td>" . $row["test_date"] . "</td>
            <td><a href ='../patient/patientdoctor.php?id=$p_id'>". $p_id. "</a></td></tr>";
    }
    echo "</table>";
    }   
    
    include dirname(__DIR__).'../general/closeDB.php'; 
    ?>
    </body>
</html>