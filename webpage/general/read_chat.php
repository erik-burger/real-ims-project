<!DOCTYPE html>
<html>
<body>
<?php
$chat_message_id = $_GET["chat_id"];
include dirname(__DIR__).'/general/openDB.php';

$update = mysqli_query($link, "update chat set message_status = 1 where chat_message_id = $chat_message_id")
or die("Could not issue 1");
$typesql = mysqli_query($link, "select from_user_type from chat where chat_message_id = $chat_message_id")
or die("Could not issue 2");
$from_user_type = mysqli_fetch_assoc($typesql)["from_user_type"];

if($from_user_type == "D"){
    $sql =  "select c.from_user_id, c.from_user_type, c.chat_message, c.date_time, d.first_name, d.last_name 
    from chat c join doctor d on c.from_user_id = d.doctor_id where chat_message_id = $chat_message_id"; //change status to read and fetch data 
    $result = mysqli_query($link, $sql)
    or die("Could not issue MySQL query");
}elseif($from_user_type == "C"){
    $sql =  "select c.from_user_id, c.from_user_type, c.chat_message, c.date_time, ca.first_name, ca.last_name 
    from chat c join caregiver ca on c.from_user_id = ca.caregiver_id where chat_message_id = $chat_message_id"; //change status to read and fetch data 
    $result = mysqli_query($link, $sql)
    or die("Could not issue MySQL query");
}
include dirname(__DIR__).'/general/closeDB.php';

while($row = $result->fetch_assoc()) {
    $first_name = $row["first_name"];
    $last_name = $row["last_name"];
    echo "From: " . $first_name . " " . $last_name . "<br>
    Date and Time: ". $row["date_time"] . "<br>
    Message: <br>". $row["chat_message"];
}
?>
<br>
<div class="center">
    <form action="reply_chat.php" method="post">
    <label for="send_to"><b>Reply to:</b></label><br>
    <select name = "send_to" required>
        <?php print "<option value='$chat_message_id'>" . $first_name . " " . $last_name . "</option>";?>
    </select><br><br<>
        <label for="message" class="center">Answer</label><br />
        <textarea cols="40" rows="5" name="message" id="message"></textarea><br />
        <input type="submit" value="Send" />
    </form>
</div>
</div>
</body>
</html>