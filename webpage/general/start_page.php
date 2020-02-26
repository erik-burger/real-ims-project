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
                <!--Doctor-->
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
                                <li class="active"><a href="../general/start_page.php">Home</a></li>
                                <li><a href="../general/contact.php">Contact</a></li>
                                <li><a href="../general/profile_page.php">Profile</a></li>
                                <li><a href="../doctor/doctorsearch.php">Patients</a></li>
                                <li><a href="../general/chat_home.php">Messages</a></li>
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
                        
                        $result = mysqli_query($link,"SELECT t.patient_id, p.first_name, p.last_name, t.total_score, max(t.test_date) as test_date
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
                                <td><a href ='../general/profile_statistics.php?id=$p_id'>". $p_id. "</a></td></tr>";
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
                <!--Patient-->
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
                        <button onclick="location.href='../patient/Question_sheet.php'"
                        type="button" 
                        style="font-size: 100px;height: 480px;width: 500px; position:absolute; top: 15%;left:41%;" 
                        value="Test">
                        TEST
                        </button>
                        </div>
                        <div class="btn-group" style = "height:10x;width:10px;">
                        <button onclick="location.href='../patient/patient_sudoku.php'"
                            type="button" 
                            style="padding: 40px 46px;font-size: 20px;width: 200px;height: 100px; position:absolute;top: 15%; left: 22%;" 
                            value="Test"> 
                            GAMES
                        </button>
                        <div class ="btn-group"></div>  
                        <button onclick="location.href='../general/profile_page.php'" 
                            type="button" 
                            style="padding: 40px 46px;font-size: 20px;width: 200px;height: 100px; position:absolute;top: 35%; left: 22%;" 
                            value="Test">
                            PROFILE
                        </button>
                        <div class ="btn-group"></div>
                        <button onclick="location.href='../patient/patient_statistics.php'" 
                            type="button" 
                            style="padding: 40px 46px;font-size: 20px;width: 200px;height: 100px;position:absolute;top: 55%; left: 22%;" 
                            value="Test">
                            STATISTICS
                        </button>
                        <div class ="btn-group"></div>
                        <button onclick="location.href='../general/chat_home.php'" 
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
                <!--Caregiver-->
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
                                    <li class="active"><a href="../general/start_page.php">Home</a></li> 
                                    <li><a href="../general/contact.php">Contact</a></li>
                                    <li><a href="../general/profile_page.php">Profile</a></li>
                                    <li><a href="../general/chat_home.php">Messages</a></li>            
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
                <!--Researcher-->
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
                            hr {
                                border: 10px solid ghostwhite;
                            }
                            .my_buttons {
                                background-color: #669999; 
                                border: none;
                                color: white;
                                padding: 14px 10px;
                                text-align: center;
                                text-decoration: none;
                                display: inline-block;
                                font-size: 16px;   
                                margin-top: 10px;
                                margin-bottom: 10px; 
                                margin-left: 1px;              
                            }     
                            table {
                                width: 100%; 
                            }
                            table th {
                                padding-top: 12px;
                                padding-bottom: 12px;
                                text-align: center;
                                background-color: #669999;
                                color: black;
                            }
                            table tr {
                                text-align: center;
                            }
                            table tr:nth-child(even){background-color: rgb(190,216,215);}

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
                                <ul class="nav navbar-nav">
                                <li class="active"><a href="../general/start_page.php">Home</a></li> 
                                <li><a href="../general/contact.php">Contact</a></li> 
                                <li><a href="../general/profile_page.php">Profile</a></li>            
                                </ul>
                                <ul class="nav navbar-nav navbar-right">
                                <li><a href="../general/logout.php">Logout</a></li>
                                </ul>
                        </div>
                    </nav>
                        
                        <div class = "page">

                        <img id="b" src="../general/logo_grey.png" width="400">

                        <h2>Information</h2>
                        <div class = "container">
                        <p1>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque urna justo, sagittis in bibendum vitae, auctor in ex. Nullam posuere, ex nec condimentum accumsan, sapien erat interdum erat, mattis accumsan tellus erat in tortor. Suspendisse a varius risus. Maecenas consectetur ligula elit, laoreet pharetra eros suscipit eget. Nunc molestie finibus mattis. Mauris quam lorem, placerat nec consequat a, laoreet vitae lorem. Donec a est at neque posuere varius quis consectetur orci. Phasellus justo justo, ornare ac elementum vel, dignissim ac lacus. Nam interdum nisl in neque molestie rutrum.
                        </p1>
                        </div>
                        <h1>Download</h1>
                        <?php
                            include dirname(__DIR__).'/general/openDB.php';
                            $access_sql = mysqli_query($link, "SELECT data_access FROM researcher WHERE researcher_id = $_SESSION[id]")
                            or 
                            die("Could not issue MySQL query"); 
                            while ($row = $access_sql->fetch_assoc()) {
                                $data_access = $row['data_access'];
                            }
                            if ($data_access == 1) {
                        ?>
                        <div class="container">
                        <p>Test data</p>
                        <form method='post' action='../researcher/download.php'>
                        <input type='submit' value='Download' name='Export' class='my_buttons'>
                        <button type="button" onclick="disp_preview('data1')" class='my_buttons'>Show/hide preview</button>       
                        <div id='data1' style="display:none;">
                        
                        <table  border='1' width: 100%; style='border-collapse:collapse;'>
                            <tr>
                            <th>ID</th>
                            <th>Date</th>
                            <th>Total Score</th>
                            <th>Q 1</th>
                            <th>Q 2</th>
                            <th>Q 3</th>
                            <th>Q 4</th>
                            <th>Q 5</th>
                            <th>Q 6</th>
                            <th>Q 7</th>
                            <th>Q 8</th>
                            <th>Q 9</th>
                            <th>Q 10</th>
                            <th>Q 11</th>
                            <th>Q 12</th>
                            <th>Q 13</th>
                            <th>Q 14</th>
                            </tr>
                            <?php 
                            
                            $sql = "SELECT t.patient_id, t.test_date, t.total_score, t.score_1, t.score_2, t.score_3, t.score_4, t.score_5, t.score_6, t.score_7, t.score_8, t.score_9, t.score_10, t.score_11, t.score_12, t.score_13, t.score_14 FROM test as t 
                            INNER JOIN patient as p ON t.patient_id = p.patient_id WHERE p.share_data = 1";
                            $result = mysqli_query($link, $sql)   
                            or 
                            die("Could not issue MySQL query"); 
                            $test_arr[] = array('patient_id','test_date','total_score','score_1','score_2','score_3','score_4','score_5','score_6','score_7','score_8','score_9','score_10','score_11','score_12','score_13','score_14');
                            $i = 0;
                            $length = mysqli_num_rows($result);
                            while($row = mysqli_fetch_array($result)){
                            $patient_id = MD5($row['patient_id']);
                            $test_date = $row['test_date'];
                            $total_score = $row['total_score'];
                            $score_1 = $row['score_1'];
                            $score_2 = $row['score_2'];
                            $score_3 = $row['score_3'];
                            $score_4 = $row['score_4'];
                            $score_5 = $row['score_5'];
                            $score_6 = $row['score_6'];
                            $score_7 = $row['score_7'];
                            $score_8 = $row['score_8'];
                            $score_9 = $row['score_9'];
                            $score_10 = $row['score_10'];
                            $score_11 = $row['score_11'];
                            $score_12 = $row['score_12'];
                            $score_13 = $row['score_13'];
                            $score_14 = $row['score_14'];
                            $i += 1;
                            $test_arr[] = array($patient_id, $test_date, $total_score, $score_1, $score_2, $score_3, $score_4, $score_5, $score_6, $score_7, $score_8, $score_9, $score_10, $score_11, $score_12, $score_13, $score_14);
                            if ($i>$length-15){
                        ?>
                            <tr>
                            <td><?php echo $patient_id; ?></td>
                            <td><?php echo $test_date; ?></td>
                            <td><?php echo $total_score; ?></td>
                            <td><?php echo $score_1; ?></td>
                            <td><?php echo $score_2; ?></td>
                            <td><?php echo $score_3; ?></td>
                            <td><?php echo $score_4; ?></td>
                            <td><?php echo $score_5; ?></td>
                            <td><?php echo $score_6; ?></td>
                            <td><?php echo $score_7; ?></td>
                            <td><?php echo $score_8; ?></td>
                            <td><?php echo $score_9; ?></td>
                            <td><?php echo $score_10; ?></td>
                            <td><?php echo $score_11; ?></td>
                            <td><?php echo $score_12; ?></td>
                            <td><?php echo $score_13; ?></td>
                            <td><?php echo $score_14; ?></td>
                            </tr>
                        <?php
                            }
                            }
                        ?>
                        </table>

                        </div>
                        <?php 
                            $serialize_test_arr = serialize($test_arr);
                        ?>
                        <textarea name='export_data' style='display: none;'><?php echo $serialize_test_arr; ?></textarea>
                        </form>

                        <br>
                        
                        <p>Patient data</p>
                        <form method='post' action='../researcher/download.php'>
                        <input type='submit' value='Download' name='Export' class='my_buttons'>
                        <button type="button" onclick="disp_preview('data2')" class='my_buttons'>Show/hide preview</button>       
                        <div id='data2' style="display:none;">
                        <table  border='1' width: 100%; style='border-collapse:collapse;'>
                            <tr>
                            <th>ID</th>
                            <th>Date of birth</th>
                            <th>Gender</th>
                            <th>Education</th>
                            <th>Stage</th>
                            </tr>
                            <?php 
                            
                            $sql = "SELECT patient_id, date_of_birth, gender, education, stage FROM patient WHERE share_data = 1";
                            $result = mysqli_query($link, $sql)   
                            or 
                            die("Could not issue MySQL query"); 
                            $user_arr[] = array('patient_id','date_of_birth','gender','education', 'stage');
                            $i = 0;
                            $length = mysqli_num_rows($result);
                            while($row = mysqli_fetch_array($result)){
                            $patient_id = MD5($row['patient_id']);
                            $date_of_birth = $row['date_of_birth'];
                            $gender = $row['gender'];
                            $education = $row['education'];
                            $stage = $row['stage'];
                            $i += 1;
                            $user_arr[] = array($patient_id, $date_of_birth, $gender, $education, $stage);
                            if ($i>$length-15){
                        ?>
                            <tr>
                            <td><?php echo $patient_id; ?></td>
                            <td><?php echo $date_of_birth; ?></td>
                            <td><?php echo $gender; ?></td>
                            <td><?php echo $education; ?></td>
                            <td><?php echo $stage; ?></td>
                            </tr>
                        <?php
                            }
                            }
                        ?>
                        </table>




                        </div>
                        <?php 
                            $serialize_user_arr = serialize($user_arr);
                        ?>
                        <textarea name='export_data' style='display: none;'><?php echo $serialize_user_arr; ?></textarea>
                        </form>
                        </div>
                        <?php
                            }
                            else {
                                ?>
                                <p1>You do not have acces to patient data</p1>
                                <?php
                            }
                        ?>

                        <script>
                        function disp_preview(data) {
                                var data = document.getElementById(data);
                                if (data.style.display === "none") {
                                    data.style.display = "block";
                                } else {
                                    data.style.display = "none";
                                }
                            }
                        </script>
                    </div>
                    </body>
                </html>
                <?php
                break;
            default:
                echo "<script>window.location.href = '../general/login.php';</script>";
            }
    } else {
        echo "<script>window.location.href = '../general/login.php';</script>";
    }
}else {
    echo "<script>window.location.href = '../general/login.php';</script>";
}