<!DOCTYPE html>
<html>

        <meta charset="UTF-utf-8">
        <meta name="description" content="page to change change medication">
        <title>Trackzheimers</title>  
        <link rel="stylesheet" href="top_menu_style.css">

<body>
    <h1>Add Medication Information</h1>    
      
    <form action="update_medication.php" method="POST" id = "meds">
      
      <p>Please fill in this form to add medication.</p>

      <label for="medication_id"><b>Medication Name</b></label><br>
      <select name = "medication_id" form = "meds" required>
        <?php
        include dirname(__DIR__).'/general/openDB.php';
        $sql = "select medication_id, medication_name from medication";
        $result = mysqli_query($link, $sql) 
        or die("Could not issue MySQL query");
        while ($row = mysqli_fetch_assoc($result)) {
            $medication_id = $row["medication_id"];
            $medication_name = $row["medication_name"];
            print "<option value='$medication_id'>$medication_name</option>";}
        include dirname(__DIR__).'/general/closeDB.php';
        ?> </select><br>

      <label for="dose"><b>Dose</b></label><br>
      <input type="text" value= "" name="dose" required><br>

      <label for="interval"><b>How often do you take this drug?</b></label><br>
      <input type="text" value= "" name="interval" required><br>
        
      <button type="submit">Add Medication</button>
    
    </form>
    
</body>

</html>
