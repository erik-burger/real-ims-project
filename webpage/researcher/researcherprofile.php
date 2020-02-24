<html>
   
<?php
session_start();
/*Restrict access for other users or not logged*/ 
if (isset($_SESSION["user"]) or isset($_SESSION["loggedin"])) {
    if ($_SESSION["user"] !== "R" or $_SESSION["loggedin"] == false){ // if the user is a patient -> logout
    echo "<script>window.location.href = '../general/login.php';</script>";
    }
} 
?>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="top_menu_style.css">
        <link rel="stylesheet" href="../general/IMS_Style.css">
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
            hr {
                border: 10px solid ghostwhite;
            }
            .prof_button, .pass_button, .patient_button, .request_button{
                background-color: #669999; 
                border: none;
                color: white;
                padding: 14px 10px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;   
                margin-top: 10px;
                margin-bottom: 10px; 
                margin-left: 1px;              
            } 
            .profile{
                display: inline-block;  
            }
            * {
            box-sizing: border-box;
            }

            .column {
            float: left;
            width: 50%;
            padding: 10px;
            height: 300px; 
            }
            textarea {
                width: 100%;
                height: 300px;
                -webkit-box-sizing: border-box; /* Safari/Chrome, other WebKit */
                -moz-box-sizing: border-box;    /* Firefox, other Gecko */
                box-sizing: border-box;         /* Opera/IE 8+ */
                font-size: 18px;   
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
            textarea{
    		width: 95%;
    		padding: 12px;
    		border: 1px solid #ccc;
    		border-radius; 4px;
    		resize: vertical;
    		font-size: 14px;
            font-family:"Arial";     
        }
        textarea, button{
            display: block; 
        }
        </style> 
    </head>

    <body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <img class="logo" src="../general/logo_small.png" width = 50>
                <ul class="nav navbar-nav">
                <li><a href="researcherstart.php">Home</a></li> 
                <li><a href="../general/contact.php">Contact</a></li> 
                <li class="active"><a href="researcherprofile.php">Profile</a></li>            
                </ul>
                <ul class="nav navbar-nav navbar-right">
                <li><a href="../general/logout.php">Logout</a></li>
            </ul>
        </div>
    </nav>
    <div class = "page">
    <div class='column'>
        <h1>Profile</h1>
    <div class = "container">
    <?php
       

        include dirname(__DIR__).'/general/openDB.php';
        $result = mysqli_query($link, "select first_name, last_name, researcher_id, phone, street, street_no, zip, city, country, email
        from researcher
        where researcher_id = $_SESSION[id]")   
        or 
        die("Could not issue MySQL query"); 
        
        while ($row = $result->fetch_assoc()) {
            $first_name = $row["first_name"];
            $last_name = $row["last_name"];
            $researcher_id = $row["researcher_id"];
            $street = $row["street"];
            $street_no = $row["street_no"];
            $zip = $row["zip"]; 
            $city = $row["city"];
            $country = $row["country"];
            $phone = $row["phone"]; 
            $email = $row["email"];
     
            echo '<b>'."Name: ".'</b>'.$first_name." ".$last_name.'<br />';
            echo '<b>'."ID: ".'</b>' .$researcher_id.'<br />';
            echo '<b>'."Telephone: ".'</b>'.$phone.'<br />';
            echo '<b>'."Adress: ".'</b>'.$street. " ".$street_no." ".$zip." ".$city." ".$country.'<br />';
        }
        
        include dirname(__DIR__).'/general/closeDB.php';

    ?>

    <form action="change_info_researcher.php" class = "profile">
        <button type = "submit" class = "prof_button">Change Information</button>
    </form>
    <form action="change_password_researcher.php" class = "profile">
        <button type = "submit" class = "pass_button">Change Password</button>
    </form></br>
    </div>
    </div>

    <div class='column'>
        <h1>Request data access</h1>

        <div class = "container">
        <form action="request_email.php" method='post'>
        <textarea name="motivation" cols=auto rows=auto placeholder="Enter your motivation here..."></textarea>
        <input type="hidden" name="email" value="<?php echo $email; ?>">
        <input type="submit" value='Submit motivation' class='request_button'>
        <p id='message' style="display:inline;color:green">
        <p id='error' style="display:inline;color:red">
        </form>

        </div>
    </div>
    </div>
    </body>
    <script>
        window.onload = function() {
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        const message = urlParams.get('message')
        document.getElementById('message').innerHTML = message;
        const error = urlParams.get('error')
        document.getElementById('error').innerHTML = error;
        }
        
    </script>


</html>
