<!DOCTYPE html>
<html>
<meta http-equiv="refresh" content="3600;url=../general/logout.php" />
  <head>
    <meta charset="UTF-utf-8">
    <meta name="description" content="Statistics page for patients">
    <title>Trackzheimers</title>
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

            .newbutton{
                background-color: #669999; 
                border: none;
                color: white;
                padding: 14px 20px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px; 
                position:absolute;
                right:13%;
                top: 90%;        
            }      
            * {
            box-sizing: border-box;
            }

            .column {
            float: left;
            width: 50%;
            padding: 10px;
            height: 300px; 
            }

            .page:after {
            content: "";
            display: table;
            clear: both;
            }  

            input[type = text], select , textarea{
    		padding: 15px;
    		border: 1px solid #ccc;
    		border-radius; 4px;
      }

        </style>
        <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <img class="logo" src="../general/logo_small.png" width = 50>
            </div>
            <ul class="nav navbar-nav">
            <li class="active"><a href="patientstart.php">Home</a></li>            
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="../general/logout.php">Logout</a></li>
            </ul>
        </div>
    </nav>
<h1>Send a message</h1>

<form id="send-message" action="chat_send_patient.php" method="post">
<label for="send_to" style = "position:absolute;left:13%"><b>To:</b></label><br>
      <select name = "send_to" style = "position:absolute;left:13%" form = "send-message" required>
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
        ?> </select><br><br<><br><br><br>
    <label for="sendie" style = "position:absolute;left:13%"><b>Your message:</b></label><br>
    <textarea name="sendie" style = "height:300px;width:1000px;position:absolute;left:13%"></textarea><br>
    <button type="submit" class = newbutton>Send</button>
        </div>
</form>
    

</html>