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
  border: 1px solid black;
  border-collapse: collapse;
}
</style>
</head>
<body>

  <div class="navbar">
    <a href="doctorstart.html">Home</a>
    <a href="contact.html">Contact</a>
    <a href="../html/doctorprofile.php">Profile</a>
    <a class="active" href="../html/doctorsearch.php">Patients</a>
    <a href="../html/php/logout.php">Logout</a>          
  </div>

<div class="c">
<h1>Trackzimers</h1>
<p>Search for a patient</p>

<form class="example" action="/action_page.php" style="margin:auto;max-width:300px">
  <input type="text" placeholder="Search.." name="search2">
  <button type="submit"><i class="fa fa-search"></i></button>
</form>


<table style="width:70%" align="center">
<tr>
<th>First Name</th>
<th>Last Name</th>
<th>ID</th>
</tr>
<?php

include dirname(__DIR__).'\php\openDB.php';
$result = mysqli_query($link,"select first_name, last_name, patient_id from patient")   
or 
die("Could not issue MySQL query"); 

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["first_name"]. "</td>
        <td>" . $row["last_name"] . "</td>
        <td><a href ='../html/patientdoctor.php'>". $row["patient_id"]. "</a></td></tr>";
}
echo "</table>";
} 

include dirname(__DIR__).'\php\closeDB.php';

?>
</table>

<p>Temporary button to view patient page from doctor side!</p>
<button onclick="location.href='patientdoctor.html'" 
type="button" 
value="Test">
VIEW PATIENT
</button>

</body>
</html>
