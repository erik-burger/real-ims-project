<html>
<meta http-equiv="refresh" content="3600;url=../general/logout.php" />
<?php
session_start();

/*if ( isset($_SESSION["user"]) == "C") { // if the user is a patient -> logout
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
            
            table, th, td {
                padding: 15px; 
                border: 1px white;
                border-collapse: collapse;
                border-bottom: 1px solid #ddd;
                border-top: 1px solid #ddd;
                Text-align: center;
            }
           .page{
                margin-left: auto; 
                margin-right: auto; 
                padding: 10px;
                width: 95%; 
                margin-bottom: 50px;   
            }
            .container {
 		 	border-radius: 10px;
  			background-color: #f2f2f2;
  			padding-left: 20px;
  			width:95%;
  			margin-right: auto;
  			margin-left:auto;
            margin-bottom: 20px; 
            margin-top: 20px;
		} 
        </style>
    </head>

    <body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <img class="logo" src="../general/logo_small.png" width = 50>
                <ul class="nav navbar-nav">
                <li class="active"><a href="caregiverstart.php">Home</a></li> 
                <li><a href="caregiverprofile.php">Profile</a></li>
                <li><a href="chat_home_caregiver.php">Messages</a></li>            
                </ul>
                <ul class="nav navbar-nav navbar-right">
                <li><a href="../general/logout.php">Logout</a></li>
            </ul>
        </div>
    </nav>
    <img id="b" src="../general/logo_grey.png" width="400">

    <div class = "page">
        <h2>Information</h2>
        <div class = "container">
        <p1>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque urna justo, sagittis in bibendum vitae, auctor in ex. Nullam posuere, ex nec condimentum accumsan, sapien erat interdum erat, mattis accumsan tellus erat in tortor. Suspendisse a varius risus. Maecenas consectetur ligula elit, laoreet pharetra eros suscipit eget. Nunc molestie finibus mattis. Mauris quam lorem, placerat nec consequat a, laoreet vitae lorem. Donec a est at neque posuere varius quis consectetur orci. Phasellus justo justo, ornare ac elementum vel, dignissim ac lacus. Nam interdum nisl in neque molestie rutrum.
        </p1>
        </div>
        <h2>Latest Updates</h2>
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
    include dirname(__DIR__).'/general/openDB.php';
    
    $result = mysqli_query($link,"select t.patient_id, p.first_name, p.last_name, t.total_score, max(t.test_date) as test_date
    from test as t, patient as p, patient_caregiver as p_c
    where p.patient_id = t.patient_id and p.patient_id = p_c.patient_id and p_c.caregiver_id = '$id' and p_c.both_accept = true
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
            <td><a href ='../caregiver/patient_caregiver.php?id=$p_id'>". $p_id. "</a></td></tr>";
    }
    echo "</table>";
    }   
    
    include dirname(__DIR__).'/general/closeDB.php'; 
    ?>
     </div>   
    </body>
</html>