<!DOCTYPE html>
<?php
session_start();
$id = $_SESSION["id"]; 
/*Restrict access for other users or not logged*/ 
if (isset($_SESSION["user"]) or isset($_SESSION["loggedin"])) {
    if ($_SESSION["user"] !== "D" or $_SESSION["loggedin"] == false){ // if the user is a patient -> logout
    echo "<script>window.location.href = '../general/login.php';</script>";
    }
}  
?> 

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="top_menu_style.css">
<link href="IMS_Style.css" rel="stylesheet">

<!Create a search button>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
body {
  font-family: Arial;
}

* {
  box-sizing: border-box;
}

form.example input[type=text] {
  padding: 10px;
  font-size: 17px;
  border: 1px solid grey;
  float: left;
  width: 80%;
  background: #f1f1f1;
}

form.example button {
  float: left;
  width: 20%;
  padding: 10px;
  background: #a6a6a6;
  color: white;
  font-size: 17px;
  border: 1px solid grey;
  border-left: none;
  cursor: pointer;
}

form.example button:hover {
  background: #0b7dda;
}

form.example::after {
  content: "";
  clear: both;
  display: table;
}
/*remove the number arrows*/
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
            input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
            }

            /* Firefox */
            input[type=number] {
            -moz-appearance:textfield;
            }
</style>

<!Center text>
<style>
div.c {
Text-align: center;
}
</style>

<!Create a table>
<style>
table, th, td {
                padding: 15px; 
                border: 1px white;
                border-collapse: collapse;
                border-bottom: 1px solid #ddd;
                border-top: 1px solid #ddd;
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

          .sideBySide{
        display: inline-block;
        padding: 20px
        }
    
    	input[type = text], select , textarea{
    		padding: 15px;
    		border: 1px solid #ccc;
    		border-radius; 4px;
      }
      input[type = number], select , textarea{
    		padding: 15px;
    		border: 1px solid #ccc;
    		border-radius; 4px;
      }
      .button {
      background-color: #669999; 
      border: none;
      color: white;
      padding: 14px 32px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      
    }
    .page{
                margin-left: auto; 
                margin-right: auto; 
                padding: 20px;
                width: 90%; 
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
            <li><a href="../general/start_page.php">Home</a></li>
            <li><a href="../general/contact.php">Contact</a></li>
            <li><a href="../general/profile_page.php">Profile</a></li>
            <li class="active"><a href="doctorsearch.php">Patients</a></li>
            <li><a href="../general/chat_home.php">Messages</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="../general/logout.php">Logout</a></li>
            </ul>
        </div>
    </nav>

<div class = "page">
<div class="c">
<h1>Your Patients</h1>

<div class="container">
<form id = "form_search" class = sideBySide action="" method = "post" style="margin:auto;">
  <input type="text" placeholder="Search..." name="search_text">
  <button type="submit" class = "button" name = "submit"><i class="fa fa-search"></i></button>
</form>

<form id = "form_connect" class = sideBySide action="../general/connect.php" method = "post" style="margin:auto;">
  <input type="number" placeholder="Patient ID" name="patient_id" >
  <button type="submit" class = "button" name = "connect">Connect</button>
</form>

<form id = "form_connect" class = sideBySide action="../general/disconnect.php" method = "post" onsubmit="return confirm('Are you sure you want to disconnect from this patient');" style="margin:auto;">
  <input type="number" placeholder="Patient ID" name="patient_id" >
  <button type="submit" class = "button" name = "connect">Disconnect</button>
</form>
</div>

<?php 
  if(isset($_POST['submit'])){
    if(isset($_POST['search_text'])){
      include dirname(__DIR__).'/general/openDB.php';
      $search = $_POST['search_text']; 
      $search = $link->real_escape_string($_POST["search_text"]);
      $search = htmlspecialchars($search);
      $result = mysqli_query($link,"SELECT p.first_name, p.last_name, p.patient_id 
                                    from patient as p, patient_doctor as p_d
                                    where p.patient_id = p_d.patient_id   
                                    and p_d.doctor_id = '$id'
                                    and p_d.both_accept = true
                                    and (p.patient_id = '$search' 
                                    or last_name like '%$search%' 
                                    or first_name like '%$search%')")   
      or 
      die("Could not issue MySQL query");
      
      echo "<table style='width:70%' align='center'>
      <tr>
      <th>First Name</th>
      <th>Last Name</th>
      <th>ID</th>
      </tr>"; 

      if ($result->num_rows > 0) {       
        while($row = $result->fetch_assoc()) {
            $p_id = $row["patient_id"];
            echo "<tr><td>" . $row["first_name"]. "</td>
            <td>" . $row["last_name"] . "</td>
            <td><a href ='../general/profile_statistics.php?id=$p_id'>". $p_id. "</a></td></tr>";
    }
    echo "</table>";
    } 
    include dirname(__DIR__).'/general/closeDB.php'; 
  }
}
  else{ 
    include dirname(__DIR__).'/general/openDB.php';
    $result = mysqli_query($link,"select p.first_name, p.last_name, p.patient_id 
                                  from patient as p, patient_doctor as p_d
                                  where p.patient_id = p_d.patient_id 
                                  and p_d.doctor_id = '$id'
                                  and p_d.both_accept = true")   
    or 
    die("Could not issue MySQL query"); 

    echo "<table style='width:70%' align='center'>
    <tr>
    <th>First Name</th>
    <th>Last Name</th>
    <th>ID</th>
    </tr>"; 
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $p_id = $row["patient_id"];
            echo "<tr><td>" . $row["first_name"]. "</td>
            <td>" . $row["last_name"] . "</td>
            <td><a href ='../general/profile_statistics.php?id=$p_id'>". $p_id. "</a></td></tr>";
    }
    echo "</table>";
    }     
    include dirname(__DIR__).'/general/closeDB.php';   
  }  
?> 

</div>
</div>
</div>
</body>
  <script>
    function delete_confirmation(link){
        var r = confirm("Are you sure you want to delete this patient");
        if (r == true){
            window.location.replace(link);
        }
    }
  </script>
</html>