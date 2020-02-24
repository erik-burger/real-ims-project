<html>

<?php
session_start();
?>
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
       <nav class="navbar navbar-inverse">
           <div class="container-fluid">
               <div class="navbar-header">
                    <img class="logo" src="../general/logo_small.png" width = 50>
                    <script>
                        var logged_in = <?php echo json_encode($_SESSION["loggedin"]);?>;
                        var user = <?php echo json_encode($_SESSION["user"]);?>;
                        if (logged_in !== 'undefined' && user !== 'undefined') {
                            if (logged_in == 1 ) {
                                switch(user){
                                    case "D":
                                        document.write(
                                        '<ul class="nav navbar-nav">'+
                                            '<li class="active"><a href="../doctor/doctorstart.php">Home</a></li>'+
                                            '<li><a href="../general/contact.php">Contact</a></li>'+
                                            '<li><a href="../doctor/doctorprofile.php">Profile</a></li>'+
                                            '<li><a href="../doctor/doctorsearch.php">Patients</a></li>'+
                                            '<li><a href="../doctor/chat_home_doctor.php">Messages</a></li>'+
                                        '</ul>'+
                                        '<ul class="nav navbar-nav navbar-right">'+
                                            '<li><a href="../general/logout.php">Logout</a></li>'+
                                        '</ul>');
                                    break;
                                    case "P":
                                        document.write(
                                        '<ul class="nav navbar-nav">'+
                                            '<li class="active"><a onclick= go_back("../patient/patientstart.php")>Home</a></li>'+        
                                        '</ul>'+
                                        '<ul class="nav navbar-nav navbar-right">'+
                                            '<li><a onclick= go_back("../general/logout.php")>Logout</a></li>'+
                                        '</ul>');
                                    break;
                                    case "R":
                                        document.write(
                                        '<ul class="nav navbar-nav">'+
                                            '<li class="active"><a href="../researcher/researcherstart.php">Home</a></li> '+
                                            '<li><a href="../general/contact.php">Contact</a></li>'+
                                            '<li><a href="../researcher/researcherprofile.php">Profile</a></li>'+
                                        '</ul>'+
                                        '<ul class="nav navbar-nav navbar-right">'+
                                            '<li><a href="../general/logout.php">Logout</a></li>'+
                                        '</ul>');
                                    break;
                                    case "C":
                                        document.write(
                                        '<ul class="nav navbar-nav">'+
                                            '<li class="active"><a href="../caregiver/caregiverstart.php">Home</a></li>'+ 
                                            '<li><a href="../general/contact.php">Contact</a></li>'+
                                            '<li><a href="../caregiver/caregiverprofile.php">Profile</a></li>'+
                                            '<li><a href="../caregiver/chat_home_caregiver.php">Messages</a></li>'+            
                                        '</ul>'+
                                        '<ul class="nav navbar-nav navbar-right">'+
                                            '<li><a href="../general/logout.php">Logout</a></li>'+
                                        '</ul>');
                                    break;
                                }
                        } else{
                            //not logged in user
                            document.write(
                                '</div>'+  
                                    '<a href="../general/login.php">Login</a>'+
                                    '<a href="../general/info.html">About</a>'+
                                    '<a href="../general/contact.php">Contact</a>'+
                                    '<div class="dropdown">'+
                                        '<button class="dropbtn">Register'+
                                        '<i class="fa fa-caret-down"></i>'+
                                        '</button>'+
                                        '<div class="dropdown-content">'+
                                        '<a href="../patient/patient_registration.php">Patient</a>'+
                                        '<a href="../doctor/doctor_registration.php">Doctor</a>'+
                                        '<a href="../researcher/researcher_registration.php">Researcher</a>'+
                                        '<a href="../caregiver/caregiver_registration.php">Caregiver</a>'+
                                        '</div>');
                        }
                    }
                    </script>
                </div>
                
            </div>
        </nav>

    <body>
    <h1>Change your information</h1>    
    <?php
        
        $id = $_SESSION["id"];
        include dirname(__DIR__).'/general/openDB.php';

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
        include dirname(__DIR__).'/general/closeDB.php';
         
    ?> 
    <form action="update_caregiver.php" method="POST">
      <h3>Register</h3>
      <p>Please fill in this form to change your profile information.</p>
      
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
      <input type="password" value= "" name="psw">
        
      <button type="Submit Changes">Change Information</button>
    
    </form>
    
</body>

</html>



