<html>

<?php
session_start();
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  if ($_SESSION["user"] == "D") {
      header("location:../doctorstart.php");
  }elseif($_SESSION["user"] == "P"){
      header("location: ../patientstart.php");}
}
?>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="top_menu_style.css">
    </head>

    <body>   
        <div class="navbar">
            <a class="active" href="login.php">Login</a>
            <a href="../info.html">About</a>
            <div class="dropdown">
                <button class="dropbtn">Register
                  <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                  <a href="../registration.html">Patient</a>
                  <a href="../doctor_registration.html">Doctor</a>
                </div>
              </div>       
        </div>

        <h1>TRACKZHEIMERS LOGO</h1>

        <form action="login_conn.php" method="post">
          
            <div class="container">
              <label for="email"><b>Email address</b></label>
              <input type="text" placeholder="Enter Email address" name="email" required><br>
          
              <label for="psw"><b>Password</b></label>
              <input type="password" placeholder="Enter Password" name="psw" required><br>
          
              <button type="submit">Login</button>
              <label>
                <input type="checkbox" checked="checked" name="remember"> Remember me
              </label>
            </div>
          
            <div class="container">
              <span class="psw">Forgot <a href="#">password?</a></span>
            </div>
          </form> 
      
      

    </body>
</html>