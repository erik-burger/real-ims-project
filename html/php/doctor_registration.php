<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="top_menu_style.css">
    <style>
    	.error {color: #FF0000;}
    </style>
  </head>

<body>

<div class="navbar">
    <a href="login.html">Login</a>
    <a href="info.html">About</a>  
    <div class="dropdown">
        <button class="dropbtn">Register
          <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
          <a href="registration.html">Patient</a>
          <a href="doctor_registration.html">Doctor</a>
        </div>
      </div>       
</div>

<img src="logo.jpg" width = "250" height = "133" alt = "Trackzheimers logo">

<h1>Register as a Doctor</h1>

<form metod = "POST" action = "doctor_connect.php" autocomplete="false"> 

      <h3>Register</h3>
      <p>Please fill in this form to create an account.</p>
            
     	<label for="f_name"><b>First name</b></label>
      	<input type="text" placeholder="Enter first name" name="f_name" value = "<?php echo $f_name; ?>">
      	<span class="error"> <?php echo $f_nameErr; ?> </span><br>
		
      	<label for="m_name"><b>Middle name</b></label>
      	<input type="text" placeholder="Enter middle name" name="m_name"><br>

      	<label for="l_name"><b>Last name</b></label>
      	<input type="text" placeholder="Enter last name" name="l_name" value = "<?php echo $l_name; ?>">
      	<span class="error"> <?php echo $l_nameErr; ?> </span><br><br>

      	<label for="phone"><b>Phone number</b></label>
      	<input type="number" placeholder="Enter Phone number" name="phone" value ="<?php echo $phone;?>">
      	<span class="error"> <?php echo $phoneErr; ?> </span><br><br>

      	<label for="street"><b>Street</b></label>
      	<input type="text" placeholder="Enter Street" name="street" value = "<?php echo $street; ?>">
       	<span class="error"> <?php echo $streetErr; ?> </span><br><br>


      	<label for="street_no"><b>Street number</b></label>
      	<input type="text" placeholder="Enter Street number" name="street_no" value ="<?php echo $street_no; ?>">
      	<span class="error"> <?php echo $street_noErr; ?> </span><br><br>

  	    <label for="city"><b>City</b></label>
   	    <input type="text" placeholder="Enter city" name="city" value = "<?php echo $city; ?>">
      	<span class="error"> <?php echo $cityErr; ?> </span><br><br>

      	<label for="country"><b>Country</b></label>
      	<input type="text" placeholder="Enter country" name="country" value = "<?php echo $country; ?>">
      	<span class="error"> <?php echo $countryErr; ?> </span><br><br>

      	<label for="zip"><b>Zip</b></label>
      	<input type="text" placeholder="Enter Zip" name="zip" value = "<?php echo $zip;?>">
      	<span class="error"> <?php echo $zipErr; ?> </span><br><br>
  
      	<label for="email"><b>Email</b></label>
      	<input type="text" placeholder="Enter Email" name="email" value = "<?php echo $email; ?>">
      	<span class="error"> <?php echo $emailErr; ?> </span><br><br>
  
      	<label for="psw"><b>Password</b></label>
      	<input type="password" placeholder="Enter Password" name="psw" >
  
      	<label for="psw_repeat"><b>Repeat Password</b></label>
      	<input type="password" placeholder="Repeat Password" name="psw_repeat" >
            
      	<p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
      	<button type="submit">Register</button>  
    
      	<p>Already have an account? <a href="#">Sign in</a>.</p>    

   
</form> 
</body>
</html>
