<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="top_menu_style.css">

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

</style>
</head>

<body>

<?php 
session_start();
$id = $_SESSION["id"];
 /*if ( isset($_SESSION["id"]) === false) {
        header("location: ../general/login.php");
    }
    */
?> 

<nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <img class="logo" src="../general/logo_small.png" width = 50>
            </div>
            <ul class="nav navbar-nav">
            <li><a href="doctorstart.php">Home</a></li>
            <li><a href="../general/contact.php">Contact</a></li>
            <li class="active"><a href="doctorsearch.php">Patients</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="../general/logout.php">Logout</a></li>
            </ul>
        </div>
    </nav>
  
  <script>
      function update_search(new_search, old_search) {
        var new_ = document.getElementById(new_search);
        var old_ = document.getElementById(old_search);         
        if (new_.style.display === "none") {               
                    new_.style.display = "block";
                    old_.style.display = "none";
        }
      }
  </script>

<div class="c">
<h1>Your Patients</h1>


<form id = "form_search" class = sideBySide action="" method = "post" style="margin:auto;max-width:300px">
  <input type="text" placeholder="Search..." name="search_text">
  <button type="submit" name = "submit"><i class="fa fa-search"></i></button>
</form>

<form id = "form_connect" class = sideBySide action="connect_to_patient.php" method = "post" style="margin:auto;max-width:300px">
  <input type="text" placeholder="Patient ID" name="patient_id">
  <button type="submit" name = "connect">Connect</button>
</form>



<?php 
  if(isset($_POST['submit'])){
    if(isset($_POST['search_text'])){
      include dirname(__DIR__).'../general/openDB.php';
      $search = $_POST['search_text']; 
      
      $result = mysqli_query($link,"select p.first_name, p.last_name, p.patient_id 
                                    from patient as p, patient_doctor as p_d
                                    where p.patient_id = p_d.patient_id   
                                    and p_d.doctor_id = '$id' 
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
            <td><a href ='../patient/patientdoctor.php?id=$p_id'>". $p_id. "</a></td></tr>";
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
                        where p.patient_id = p_d.patient_id and p_d.doctor_id = '$id'")   
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
            <td><a href ='../patient/patientdoctor.php?id=$p_id'>". $p_id. "</a></td></tr>";
    }
    echo "</table>";
    }     
    include dirname(__DIR__).'/general/closeDB.php';   
  }  
?> 




<div id = 'search' style = "display:none;text-align:center;">
<table style="width:70%" align="center">
      <tr>
      <th>First Name</th>
      <th>Last Name</th>
      <th>ID</th>
      </tr>
  <?php
    
?> 
</table> 
</div>

</div>
</body>
</html>