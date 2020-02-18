<!DOCTYPE html>
<html>
<h1>Send a message</h1>

<form id="send-message" action="sendchat.php" method="post">
<label for="send_to"><b>To:</b></label><br>
      <select name = "send_to" form = "send-message" required>
        <?php
        session_start();
        include dirname(__DIR__).'/general/openDB.php';
        $sql = "select pd.doctor_id as id, d.first_name, d.last_name, d.email from patient_doctor pd
        join doctor d on d.doctor_id = pd.doctor_id
        where pd.patient_id = $_SESSION[id]
        union
        select pc.caregiver_id as id, c.first_name, c.last_name, c.email from patient_caregiver pc
        join caregiver c on c.caregiver_id = pc.caregiver_id
        where pc.patient_id = $_SESSION[id]";///two queries for doctor and caregiver I guess
        $result = mysqli_query($link, $sql) 
        or die("Could not issue MySQL query");

        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row["id"];
            $first_name = $row["first_name"];
            $last_name = $row["last_name"];
            $email = $row["email"];
            print "<option value='$email'>$first_name $last_name</option>";}
        include dirname(__DIR__).'/general/closeDB.php';
        ?> </select><br><br<>
    <p>Your message: </p>
    <textarea name="sendie" maxlength = '100'></textarea>
    <button type="submit">Send</button>
        </div>
</form>
    

</html>