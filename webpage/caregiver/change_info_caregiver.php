
<html>

<body>
    <h1>Change your information</h1>    
    <?php
        session_start();
        $id = $_SESSION["id"];
        include dirname(__DIR__).'../general/openDB.php';

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
            $psw = $row["password_hash"]; 
        }  
        include dirname(__DIR__).'../general/closeDB.php';
         
    ?> 
    <form action="update_caregiver.php" method="POST">
      <h3>Register</h3>
      <p>Please fill in this form to create an account.</p>
      
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
      <input type="password" value= "<?php echo $psw;?>" name="psw">
        
      <button type="Submit Changes">Change Information</button>
    
    </form>
    
</body>

</html>
