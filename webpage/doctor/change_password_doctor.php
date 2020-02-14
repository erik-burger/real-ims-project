
<html>
<head>
<link rel="stylesheet" href="top_menu_style.css">
<link rel="stylesheet" href="../general/IMS_Style.css">
</head>
<style>
    	*{
    	box-sizing: border-box;
		}
		.logo {
                display: inline-block;
                float: left; 
            }
    	    
    	label {
    		padding: 20px 20px 20px 20px;
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
      	height: 100%;
  		margin-right: auto;
		margin-left:auto;
		align: center;
		}
  		
    	.error {
    		color: #FF0000;
    	}
    </style>
<body>
<div class="navbar">
<div class="navbar-header">
                <img class="logo" src="../general/logo_small.png" width = 50>
</div>
<a href="info.html">About</a>
</div>
<section class="container grey-text"> 
    <h1>Change your password</h1>    
    <form action="update_password_doctor.php" method="POST">
      
      <p>Please fill in this form to change your password.</p>
      
      <label for="oldpsw"><b>Old Password</b></label>
      <input type="password" value= "" name="oldpsw"><br>

      <label for="newpsw"><b>New Password</b></label>
      <input type="password" value= "" name="newpsw"><br>

      <label for="repeatpsw"><b>Repeat New Password</b></label>
      <input type="password" value= "" name="repeatpsw"><br>
        
      <button type="Submit Changes">Change Password</button>
    
    </form>

    
</body>

</html>
