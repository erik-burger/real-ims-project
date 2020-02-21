
<html>
<meta http-equiv="refresh" content="3600;url=logout.php" />
<?php
session_start();

/*if ( isset($_SESSION["user"]) == "R") { // if the user is a patient -> logout
    $_SESSION = array();
    session_destroy();
    header("location: ../general/login.php");
} elseif( isset($_SESSION["user"]) === false) { // if no user is logged in -> login page
    header("location: ../html/php/login.php");
}
*/
?>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="top_menu_style.css">
        <link rel="stylesheet" href="IMS_Style.css">

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
                <ul class="nav navbar-nav">
                <li class="active"><a href="researcherstart.php">Home</a></li> 
                <li><a href="researcher_contact.php">Contact</a></li> 
                <li><a href="researcherprofile.php">Profile</a></li>            
                </ul>
                <ul class="nav navbar-nav navbar-right">
                <li><a href="../general/logout.php">Logout</a></li>
            </ul>
        </div>
    </nav>

    <img src="logo_grey.png" class="center">
        <?php include dirname(__DIR__).'/general/contact.php'; ?> 
    </body> 
</html>


