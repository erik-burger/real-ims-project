<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="top_menu_style.css">
    <link rel="stylesheet" href="../general/IMS_Style.css">
</head>

<body>

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
        *{
    	box-sizing: border-box;
		}

		body{
			background-color: ghostwhite;
        }
       
    	label {
    		display: inline-block;
            font-size: 20px;
    	}

        #Password{
            font-size: 20px;

        }
		input[type = password], select , textarea{
    		width: 100%;
    		padding: 12px;
    		border: 1px solid #ccc;
    		border-radius; 4px;
    		resize: vertical;
    		font-size: 10px;
    	}
		
    	input[type = submit]{
    		background-color: #c2d6d6;
  			color: black;
  			padding: 12px 20px;
 		 	border: none;
  			border-radius: 4px;
  			cursor: pointer;
  			float: right;
  		}
  		
  		input[type=submit]:hover {
  			background-color: #b3cccc;
		}
  		
        .container {
 		 	border-radius: 5px;
  			background-color: #f2f2f2;
  			padding: 20px;
  			width:100%;
  			margin-right: auto;
			margin-left:auto;
			align: center;
		}
  		
    	.error {
    		color: #FF0000;
    		font-size: 14px;
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
        .page{
                margin-left: auto; 
                margin-right: auto; 
                padding: 20px;
                width: 80%; 
                margin-bottom: 50px;   
            }
</style>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <img class="logo" src="../general/logo_small.png" width = 50>
        </div>
        <ul class="nav navbar-nav">
        <li><a href="../general/profile_page.php">Back</a></li>
        </ul>
    </div>
</nav>
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
                        ?>  
                        <form action="update_password_doctor.php" method="POST">
                        <?php 
                        break;
                 case 'P':
                        ?>
                        <form action="update_password_patient.php" method="POST"> 
                        <?php
                        break;
                 case 'C':
                        ?>
                        <form action="update_password_caregiver.php" method="POST">  
                        <?php
                        break;
                 case 'R':
                        ?>
                        <form action="update_password_researcher.php" method="POST">
                        <?php
                        break;
             }
         } else {
         echo "<script>window.location.href = '../general/login.php';</script>";
         }
         
     } 
     include dirname(__DIR__).'/general/closeDB.php';  
?> 

    <div class = "page">
      <h1>Change your password</h1>
      <div class = "container">
    
      <p id="Password" >Please fill in this form to change your password</p>
      
      <label for="oldpsw"><b>Old Password</b></label>
      <input type="password" value= "" name="oldpsw"><br><br>

      <label for="newpsw"><b>New Password</b></label>
      <input type="password" value= "" name="newpsw"><br><br>

      <label for="repeatpsw"><b>Repeat New Password</b></label>
      <input type="password" value= "" name="repeatpsw"><br><br>
        
      <input class = "button" type="submit" name="Change password" value="Change password" style = "font-size: 14px"><br> 
    
    </form>
    </div>
    </div>
    </div> 
</body>

</html>