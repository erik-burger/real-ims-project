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
    <a href="doctorprofile.html">Profile</a>
    <a class="active" href="http://localhost/real-ims-project/html/doctorsearch.php">Patients</a>
    <a href="login.html">Logout</a>          
</div>

<div class="c">
<h1>Trackzimers</h1>
<p>Search for a patient</p>

<form class="example" action="/action_page.php" style="margin:auto;max-width:300px">
  <input type="text" placeholder="Search.." name="search2">
  <button type="submit"><i class="fa fa-search"></i></button>
</form>

<?php
include "/wamp/www/real-ims-project/html/php/openDB.php";
$result = mysqli_query($link,"select first_name, last_name, doctor_id from doctor")   
or 
die("Could not issue MySQL query"); 
include "/wamp/www/real-ims-project/html/php/closeDB.php";

echo '<table>';
echo '<tr><td>First Name</td> <td>Last Name</td> <td>ID</td></tr>';
 
while ($row = mysqli_fetch_array($result)) 
{
	echo '<tr> <td>' . $row['last_name'] . '</td> <td>' . $row['first_name'] . '</td> </tr>'  . $row['doctor_id'] . '</td> </tr>';
}
echo '</table>';
?> 

<table style="width:70%" align="center">
  <tr>
    <th>Firstname</th>
    <th>Lastname</th>
    <th>Patient id</th>

  </tr>
</table>

<p>Temporary button to view patient page from doctor side!</p>
<button onclick="location.href='patientdoctor.html'" 
type="button" 
value="Test">
VIEW PATIENT
</button>

</body>
</html>
