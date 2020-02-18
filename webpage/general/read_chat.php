<!DOCTYPE html>
<html>
<body>
<?php
$chat_message_id = $_GET["chat_id"];
include dirname(__DIR__).'/general/openDB.php';
$update = mysqli_query($link, "update chat set message_status = 1 where chat_message_id = $chat_message_id")
or die("Could not issue 1");
$sql =  "select c.chat_message_id, c.from_user_id, c.from_user_type, c.chat_message, c.date_time, d.first_name, d.last_name 
from chat c join doctor d on c.from_user_id = d.doctor_id"; //change status to read and fetch data 
$result = mysqli_query($link, $sql)
or die("Could not issue MySQL query");

include dirname(__DIR__).'/general/closeDB.php';

while($row = $result->fetch_assoc()) {
    echo "From: " . $row["first_name"] . " " . $row["last_name"] . "<br>
    Date and Time: ". $row["date_time"] . "<br>
    Message: <br>". $row["chat_message"];
}
?>
<div class="center">
    <form action="sendchat.php" method="post">
        <label for="message" class="center">Answer</label><br />
        <textarea cols="40" rows="5" name="message" id="message"></textarea><br />
        <input type="submit" value="Send" />
    </form>
</div>
</div>
</body>
</html>