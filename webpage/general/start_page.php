<html>
<?php
session_start();
$logedin = $_SESSION["loggedin"];
$user = $_SESSION["user"];
if (isset($logedin) or isset($user)) {
    if ($logedin == 1) {
        switch ($user) {
            case 'D':
                ?>
                <!--Doctor
            
            
            
            
            -->
                <html>
                    <meta http-equiv="refresh" content="3600;url=../general/logout.php" /> 
                    <style>
                        table, th, td {
                            border: 1px #c2d6d6;
                            border-collapse: collapse;
                    }
                    </style>
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
                            .page{
                                margin-left: auto; 
                                margin-right: auto; 
                                padding: 10px;
                                width: 95%; 
                                margin-bottom: 50px;   
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
                                <li><a href="../doctor/doctor_contact.php">Contact</a></li>
                                <li><a href="doctorprofile.php">Profile</a></li>
                                <li><a href="doctorsearch.php">Patients</a></li>
                                <li><a href="chat_home_doctor.php">Messages</a></li>
                                </ul>
                                <ul class="nav navbar-nav navbar-right">
                                    <li><a href="../general/logout.php">Logout</a></li>
                                </ul>
                            </div>
                        </nav>

                            <img id="b" src="../general/logo_grey.png" width="400">
                        <div class = "page">
                            <h1>Information</h1>
                            <div class = "container">
                            <p1>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque urna justo, sagittis in bibendum vitae, auctor in ex. Nullam posuere, ex nec condimentum accumsan, sapien erat interdum erat, mattis accumsan tellus erat in tortor. Suspendisse a varius risus. Maecenas consectetur ligula elit, laoreet pharetra eros suscipit eget. Nunc molestie finibus mattis. Mauris quam lorem, placerat nec consequat a, laoreet vitae lorem. Donec a est at neque posuere varius quis consectetur orci. Phasellus justo justo, ornare ac elementum vel, dignissim ac lacus. Nam interdum nisl in neque molestie rutrum.
                            </p1>
                            </div>

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
                        include dirname(__DIR__).'/general/openDB.php';
                        
                        $result = mysqli_query($link,"select t.patient_id, p.first_name, p.last_name, t.total_score, max(t.test_date) as test_date
                        from test as t, patient as p, patient_doctor as p_d
                        where p.patient_id = t.patient_id and p.patient_id = p_d.patient_id and p_d.doctor_id = '$id' and p_d.both_accept = true
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
                        
                        include dirname(__DIR__).'/general/closeDB.php'; 
                        ?>
                        </div>
                        </body>
                    </html>
                <?php
                break;
            case 'P':
                ?>
                <!--Patient
            
            
            
            
            
            -->
                <html>
                    <meta http-equiv="refresh" content="3600;url=../general/logout.php" />
                    <?php
                    $_SESSION["timestamp"] = time();
                    ?>
                    <head>
                        <meta charset="UTF-utf-8">
                        <meta name="description" content="Start page for patients">
                        <title>Trackzheimers</title>
                        <link rel="stylesheet" href="top_menu_style.css">
                        <link rel="stylesheet" href="../general/IMS_Style.css">
                        <style>
                                body{
                                    background-color: ghostwhite;
                                }
                                ul{
                                    list-style-type: none;
                                    margin: 0;
                                    padding: 0;
                                }
                                .logo {
                                    display: inline-block;
                                    float: left; 
                                }
                                hr {
                                    border: 10px solid ghostwhite;
                                }
                                button {
                                    background-color: #669999;
                                    border: none;
                                    color: black;
                                    text-align: center;
                                    text-decoration: none;
                                
                                }   
                            .bigbutton{
                                padding: 10px 10px;
                                }
                                .btn-group{
                                display: block;
                                padding: 10px 10px;
                                }
                                .all_buttons{
                                display: inline-block;
                                padding: 10px 10px;}
                            </style>
                    </head>

                    <body>
                    <nav class="navbar navbar-inverse">
                            <div class="container-fluid">
                                <div class="navbar-header">
                                    <img class="logo" src="../general/logo_small.png" width = 50>
                                <ul class="nav navbar-nav navbar-right">
                                    <li><a href="../general/logout.php">Logout</a></li>
                                </ul>
                            </div>
                        </nav>
                        <hr>
                        
                        <div class = "all_buttons" style="align:center;">
                        <div class="bigbutton">
                        <button onclick="location.href='Question_sheet.php'"
                        type="button" 
                        style="font-size: 100px;height: 480px;width: 500px; position:absolute; top: 15%;left:41%;" 
                        value="Test">
                        TEST
                        </button>
                        </div>
                        <div class="btn-group" style = "height:10x;width:10px;">
                        <button onclick="location.href='patient_sudoku.php'"
                            type="button" 
                            style="padding: 40px 46px;font-size: 20px;width: 200px;height: 100px; position:absolute;top: 15%; left: 22%;" 
                            value="Test"> 
                            GAMES
                        </button>
                        <div class ="btn-group"></div>  
                        <button onclick="location.href='patientprofile.php'" 
                            type="button" 
                            style="padding: 40px 46px;font-size: 20px;width: 200px;height: 100px; position:absolute;top: 35%; left: 22%;" 
                            value="Test">
                            PROFILE
                        </button>
                        <div class ="btn-group"></div>
                        <button onclick="location.href='patient_statistics.php'" 
                            type="button" 
                            style="padding: 40px 46px;font-size: 20px;width: 200px;height: 100px;position:absolute;top: 55%; left: 22%;" 
                            value="Test">
                            STATISTICS
                        </button>
                        <div class ="btn-group"></div>
                        <button onclick="location.href='chat_home_patient.php'" 
                            type="button" 
                            style="padding: 40px 46px;font-size: 20px;width: 200px;height: 100px;position:absolute;top: 75%; left: 22%;" 
                            value="Test">
                        MESSAGES</button>
                    </body>
                </html>
                <?php
                break;
            case 'C':
                ?>
                <!--Caregiver
            
            
            
            
            -->
                <html>
                    <meta http-equiv="refresh" content="3600;url=../general/logout.php" />
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
                                    <li><a href="../general/contact.php">Contact</a></li>
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
                <?php
                break;
            case 'R':
                ?>
                <!--Researcher
            
            
            
            
            -->
                <?php
                break;
        }
    } else {
    echo "<script>window.location.href = '../general/login.php';</script>";
    }
    
}
