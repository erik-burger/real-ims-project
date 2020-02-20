<html>
<meta http-equiv="refresh" content="3600;url=logout.php" />
<?php
session_start();
/*if ( isset($_SESSION["id"]) === false) {
    header("location: ../html/php/login.php");
}
*/
?>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="top_menu_style.css">
        <link href="IMS_Style.css" rel="stylesheet">

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
            * {
            box-sizing: border-box;
            }

            .column {
            float: left;
            width: 50%;
            padding: 10px;
            height: 00px; 
            }

            .page:after {
            content: "";
            display: table;
            clear: both;
            }  
        
           .email{
              width: 70%;
    		  padding: 12px;
    		  border: 1px solid #ccc;
    		  border-radius; 4px;
    		  resize: vertical;
            
            }
            textarea{
              width: 70%;
              height: 200px; 
    		  padding: 12px;
    		  border: 1px solid #ccc;
    		  border-radius; 4px;
    		  resize: vertical;
              font-family:"Arial";   
              font-size: 12px; 
              color: "black";  
        
            }
            input, label {
                display:block;

            }
            .form{
                padding: 20px;  
            }
            
        </style>
    </head>

    <body>
        <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <img class="logo" src="../general/logo_small.png" width = 50>
            </div>
            <ul class="nav navbar-nav">
            <li><a href="../doctor/doctorstart.php">Home</a></li>
            <li class="active"><a href="../general/contact.php">Contact</a></li>
            <li><a href="../doctor/doctorprofile.php">Profile</a></li>
            <li><a href="../doctor/doctorsearch.php">Patients</a></li>
            <li><a href="chat_home_doctor.php">Messages</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="../general/logout.php">Logout</a></li>
            </ul>
        </div>
    </nav>

    <img src="logo_grey.png" width="400">
        <div class = "page"> 
        <div class = "column left">
        
        
        <h1>Contact Information</h1> 
        
        <p><b>email:</b> trackzheimers@gmail.com</p>
        <p><b>telephone:</b> 123456789</p>
        <p><b>adress:</b> project room ITC</p>
        </div>
    
    <div class = "column right" id = "message_form">
        <h1>Write Us a Message</h1>
        <form action="" method = "POST">
            <label for="email"><b>Email address</b></label>
            <input class = "email" type="text" placeholder="Enter Your Email Address" name="email" required><br>  
            
            <label for="message"><b>Message</b></label>
            <textarea rows="4" cols="50" name="comment" form="message_form">
                Enter message here...</textarea>
        </form>
        
    </div>
 </div> 
</html>