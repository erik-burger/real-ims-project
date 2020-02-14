<!DOCTYPE html>
<html>

        <meta charset="UTF-utf-8">
        <meta name="description" content="page to change change medication">
        <title>Trackzheimers</title>  
        <link rel="stylesheet" href="top_menu_style.css">
        <link rel="stylesheet" href="../general/IMS_Style.css">
        <style>
        *{
    	box-sizing: border-box;
		}
		.logo {
                display: inline-block;
                float: left; 
            }
    	
    	input[type = text], select , textarea{
    		width: 100%;
    		padding: 12px;
    		border: 1px solid #ccc;
    		border-radius; 4px;
    		resize: vertical;
    	}
    	
    	input[type = number], select , textarea{
    		width: 100%;
    		padding: 12px;
    		border: 1px solid #ccc;
    		border-radius; 4px;
    		resize: vertical;
    	}
    	
    	label {
    		padding: 12px 12px 12px 0;
    		display: inline-block;
    	}
    	
    	button[type = "submit"]{
    		background-color: #c2d6d6;
  			color: black;
  			padding: 12px 20px;
 		 	border: none;
  			border-radius: 4px;
  			cursor: pointer;
  			float: right;
  		}
  		
  		button[type = "submit"] {
  			background-color: #b3cccc;
		}
		
		.container {
 		 	border-radius: 5px;
  			background-color: #f2f2f2;
  			padding: 20px;
  			width:80%;
  			margin-right: auto;
			margin-left:auto;
			align: center;
		}
  		
    	.error {
    		color: #FF0000;
    	}
    </style>
<body>
    <h1>Add Medication Information</h1>    
      
    <form action="update_medication.php" method="POST" id = "meds">
    <section class="container grey-text">
      
      <p id="a">Please fill in this form to add medication</p>

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
