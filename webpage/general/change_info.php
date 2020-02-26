<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
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
    	
    	button[type = "Submit Changes"]{
    		background-color: #c2d6d6;
  			color: black;
  			padding: 12px 20px;
 		 	border: none;
  			border-radius: 4px;
  			cursor: pointer;
  			float: right;
  		}
  		
  		button[type = "Submit Changes"] {
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
</head>
<body>
<div class="navbar">
<div class="navbar-header">
                <img class="logo" src="../general/logo_small.png" width = 50>
            </div>
            <a href="../general/info.html">About</a>
            </div>
    <?php
     session_start();
     $logedin = $_SESSION["loggedin"];
     $user = $_SESSION["user"];
     $id = $_SESSION["id"];
     include dirname(__DIR__).'/general/openDB.php';

     if (isset($logedin) or isset($user)) {
         if ($logedin == 1){
                switch ($user) {
                 case 'D':
                        $result = mysqli_query($link,"select *
                        from doctor 
                        where doctor_id = '$id'") 
                        or 
                        die("Could not issue MySQL query");  
              
                        while ($row = $result->fetch_assoc()) {
                             $first_name = $row["first_name"];
                             $middle_name = $row["middle_name"]; 
                             $last_name = $row["last_name"];
                             $doctor_id = $row["doctor_id"];
                             $street = $row["street"];
                             $street_no = $row["street_no"];
                             $zip = $row["zip"]; 
                             $email = $row["email"]; 
                             $city = $row["city"];
                             $country = $row["country"];
                             $phone = $row["phone"];  
                            }
                            ?>  
                        <form action="update_doctor.php" method="POST">
                        
                        <?php 
                        break;
                 case 'P':
                        $result = mysqli_query($link,"select *
                        from patient 
                        where patient_id = '$id'")
                        or 
        die("Could not issue MySQL query");   
                     
                        while ($row = $result->fetch_assoc()) {
                            $first_name = $row["first_name"];
                            $middle_name = $row["middle_name"]; 
                            $last_name = $row["last_name"];
                            $patient_id = $row["patient_id"];
                            $street = $row["street"];
                            $street_no = $row["street_no"];
                            $zip = $row["zip"]; 
                            $email = $row["email"]; 
                            $city = $row["city"];
                            $country = $row["country"];
                            $phone = $row["phone"];
                            }
                            ?>
                        <form action="update_patient.php" method="POST">  
                        <?php
                        break;
                 case 'C':
                        $result = mysqli_query($link,"select *
                        from caregiver 
                        where caregiver_id = '$id'")
                        or 
        die("Could not issue MySQL query");
                     
                        while ($row = $result->fetch_assoc()) {
                            $first_name = $row["first_name"];
                            $middle_name = $row["middle_name"]; 
                            $last_name = $row["last_name"];
                            $caregiver_id = $row["caregiver_id"];
                            $street = $row["street"];
                            $street_no = $row["street_no"];
                            $zip = $row["zip"]; 
                            $email = $row["email"]; 
                            $city = $row["city"];
                            $country = $row["country"];
                            $phone = $row["phone"];  
                            }
                        ?>
                        <form action="update_caregiver.php" method="POST">  
                        <?php
                        break;
                 case 'R':
                        $result = mysqli_query($link,"select *
                        from researcher 
                        where researcher_id = '$id'")
                        or 
        die("Could not issue MySQL query");

                        while ($row = $result->fetch_assoc()) {
                            $first_name = $row["first_name"];
                            $middle_name = $row["middle_name"]; 
                            $last_name = $row["last_name"];
                            $researcher_id = $row["researcher_id"];
                            $street = $row["street"];
                            $street_no = $row["street_no"];
                            $zip = $row["zip"]; 
                            $email = $row["email"]; 
                            $city = $row["city"];
                            $country = $row["country"];
                            $phone = $row["phone"];
                            }  
                        ?>
                            <form action="update_researcher.php" method="POST">
                            <?php
                            break;
             }
         } else {
         echo "<script>window.location.href = '../general/login.php';</script>";
         }
         
     } 
     include dirname(__DIR__).'/general/closeDB.php';  
    ?> 
    
    <section class="container grey-text"> 
    <h1 class="center">Change your information</h1>  
      <p id="a">Please fill in this form to change your account information</p>
      
      <label for="f_name"><b>First name</b></label>
      <input type="text" value= "<?php echo $first_name;?>" name="f_name" >

      <label for="m_name"><b>Middle name</b></label>
      <input type="text" value= "<?php echo $middle_name;?>" name="m_name">

      <label for="l_name"><b>Last name</b></label>
      <input type="text" value= "<?php echo $last_name;?>" name="l_name" ><br>
      
      <label for="phone_no"><b>Phone number</b></label>
      <input type="number" value= "<?php echo $phone;?>" name="phone_no"><br>

      <label for="street"><b>Street</b></label>
      <input type="text" value= "<?php echo $street;?>" name="street">

      <label for="street_no"><b>Street number</b></label>
      <input type="text" value= "<?php echo $street_no;?>" name="street_no">

      <label for="city"><b>City</b></label>
      <input type="text" value= "<?php echo $city;?>" name="city">

      <label for="country"><b>Country</b></label>
      <input type="text" value= "<?php echo $country;?>" name="country">

      <label for="zip"><b>Zip</b></label>
      <input type="text" value= "<?php echo $zip;?>" name="zip"><br>
  
      <label for="email"><b>Email</b></label>
      <input type="text" value= "<?php echo $email;?>" name="email"><br>
  
      <label for="psw"><b>Password</b></label>
      <input type="password" value= "" name="psw"><br>
        
      <button type="Submit Changes">Submit changes</button>
    
    </form>
    
</body>

</html>
