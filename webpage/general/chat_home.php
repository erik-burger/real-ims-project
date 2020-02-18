<!DOCTYPE html>
<html>
<h1>My Messages</h1>
<body>
<button onclick="window.location.href = 'chat.php';">Click Here</button>
<table style="width:50%" align="center">
    <tr>
    <th>Time</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Status</th>
    </tr>

<?php
session_start();
include dirname(__DIR__).'/general/openDB.php';
$sql = "select c.chat_message_id, d.first_name, d.last_name, c.from_user_id, c.from_user_type, c.date_time, c.message_status from chat c 
join doctor d on c.from_user_id = d.doctor_id
where to_user_id = $_SESSION[id] and to_user_type = '$_SESSION[user]'"; //check if query is working
$result = mysqli_query($link, $sql) 
or die("Could not issue MySQL query");

include dirname(__DIR__).'/general/closeDB.php';
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
    $chat_id = $row["chat_message_id"];
    if ($row["message_status"] == 0){$status = "New";}else{$status = "";}
    echo "<tr><td><a href ='../general/read_chat.php?chat_id=$chat_id'>".$row["date_time"]."</td>
    <td>" . $row["first_name"]. "</td>
    <td>" . $row["last_name"] . "</td>
    <td>" . $status . "</a></td></tr>";
    
}
echo "</table>";
} 
////<td><a href ='../patient/patientdoctor.php?id=$p_id'>". $p_id. "</a></td></tr>";//link timestamp to messsage  
?>




</html>