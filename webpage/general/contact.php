
<?php
    session_start();
?>

<html>
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="top_menu_style.css">
        <link href="IMS_Style.css" rel="stylesheet">
        <style>
            * {
            box-sizing: border-box;
            }
            ul{
                
                list-style-type: none;
                margin: 0;
                padding: 0;
            }
            .logo {
                display: inline-block;
                float: left; 
            }
            
            .column {
            float: left;
            width: 50%;
            padding: 10px; 
            }

            .page:after {
            content: "";
            display: table;
            clear: both;
            }

            textarea{
              height: 200px;     
                      
            }
            input, label{
                display:block;
            }

            .button {
                background-color: #669999; 
                border: none;
                color: white;
                padding: 14px 32px;
                text-align: center;
                text-decoration: none;
                display: block;
                font-size: 16px;  
                margin-top: 10px;                            
            }

            input[type = text], textarea{
    		width: 70%;
    		padding: 12px;
    		border: 1px solid #ccc;
    		border-radius; 4px;
    		resize: vertical;
    		font-size: 14px;
            font-family:"Arial";     
            }
        
            .message_form{
                margin-right: auto;
                margin-left: auto;
            }    
            .center {
                display: block;
                margin-left: auto;
                margin-right: auto;
                width: 400px;
            }
            .container {
                border-radius: 10px;
                background-color: #f2f2f2;
                padding-left: 20px;
                width:95%;
                margin-right: auto;
                margin-left:auto;
                margin-bottom: 20px; 
                margin-top: 20px;
            } 
            .page{
                    margin-left: auto; 
                    margin-right: auto; 
                    padding: 10px;
                    width: 95%; 
                    margin-bottom: 50px;   
                }
        </style>  
</head>
    <body>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <img class="logo" src="../general/logo_small.png" width = 50>
                    <script>
                        var loged_in = <?php echo json_encode($_SESSION["loggedin"]);?>;
                        var user = <?php echo json_encode($_SESSION["user"]);?>;
                        
                     if (loged_in) {
                                switch(user){
                                    case "D":
                                        document.write(
                                        '<ul class="nav navbar-nav">'+
                                            '<li class="active"><a href="../general/start_page.php">Home</a></li>'+
                                            '<li><a href="../general/contact.php">Contact</a></li>'+
                                            '<li><a href="../general/profile_page.php">Profile</a></li>'+
                                            '<li><a href="../doctor/doctorsearch.php">Patients</a></li>'+
                                            '<li><a href="../general/chat_home.php">Messages</a></li>'+
                                        '</ul>'+
                                        '<ul class="nav navbar-nav navbar-right">'+
                                            '<li><a href="../general/logout.php">Logout</a></li>'+
                                        '</ul>');
                                    break;
                                    case "P":
                                        document.write(
                                        '<ul class="nav navbar-nav">'+
                                            '<li class="active"><a onclick= go_back("../general/start_page.php")>Home</a></li>'+        
                                        '</ul>'+
                                        '<ul class="nav navbar-nav navbar-right">'+
                                            '<li><a onclick= go_back("../general/logout.php")>Logout</a></li>'+
                                        '</ul>');
                                    break;
                                    case "R":
                                        document.write(
                                        '<ul class="nav navbar-nav">'+
                                            '<li class="active"><a href="../general/start_page.php">Home</a></li> '+
                                            '<li><a href="../general/contact.php">Contact</a></li>'+
                                            '<li><a href="../general/profile_page.php">Profile</a></li>'+
                                        '</ul>'+
                                        '<ul class="nav navbar-nav navbar-right">'+
                                            '<li><a href="../general/logout.php">Logout</a></li>'+
                                        '</ul>');
                                    break;
                                    case "C":
                                        document.write(
                                        '<ul class="nav navbar-nav">'+
                                            '<li class="active"><a href="../general/start_page.php">Home</a></li>'+ 
                                            '<li><a href="../general/contact.php">Contact</a></li>'+
                                            '<li><a href="../general/profile_page.php">Profile</a></li>'+
                                            '<li><a href="../general/chat_home.php">Messages</a></li>'+            
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
                                    '<a class = "active" href="../general/contact.php">Contact</a>'+
                                    '<div class="dropdown">'+
                                        '<button class="dropbtn">Register'+
                                        '<i class="fa fa-caret-down"></i>'+
                                        '</button>'+
                                        '<div class="dropdown-content">'+
                                        '<a href="../general/register.php?user=P">Patient</a>'+
				                        '<a href="../general/register.php?user=D">Doctor</a>'+
                                        '<a href="../general/register.php?user=R">Researcher</a>'+
                                        '<a href="../general/register.php?user=C">Caregiver</a>'+
                                        '</div>');
                        }
                    </script>
                </div>
                
            </div>
        </nav>

        <div class = "page">        
            <div class = "column left">
                <h1>Contact Information</h1> 

                <div class = "container">
                
                <p><b>email:</b> trackzheimers@gmail.com</p>
                <p><b>telephone:</b> 123456789</p>
                <p><b>adress:</b> project room ITC</p>
                </div>
                </div>
            
            <div class = "column right" id = "message_form">
                <h1>Write Us a Message</h1>
                <div class = "container">
                <div class = "form">
                <form action="send_email.php" method = "post" id = "message_form" name = "message_form">
                    <label for="email"><b>Email address</b></label>
                    <input name="email" class = "email" type="text" placeholder="Enter your email address" required><br>  
                    <label for="subject"><b>Subject</b></label>
                    <input name="subject" class = "email" type="text" placeholder="Enter subject" required><br>  
                    <label for="message"><b>Message</b></label>
                    <textarea name="message" id = "message" cols=auto rows=auto placeholder="Enter message here..." required></textarea>
                    <button class = "button" type = "submit" name = "submit">Send</button>
                </form>  
                </div>
                </div>
            </div>     
            </div>
        </div> 

         
    </body>

</html>