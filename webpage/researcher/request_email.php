<?php     
    function generateRandomString($length = 8) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    session_start();
    include dirname(__DIR__).'/general/openDB.php';
    $id = $_SESSION["id"];
    $code = generateRandomString();
    $sql = "UPDATE researcher SET data_access_code = '$code' WHERE researcher_id = $id;";
    mysqli_query($link, $sql)
    or 
    die("Could not issue MySQL query"); 
    $to_email ="e@mail.com";
    $subject = "Wanting data access";
    $message = $_POST['motivation']."Here is the provided code:".$code."here is the email:".$_POST["email"];
    $headers = 'From: noreply @ company . com';
    mail($to_email,$subject,$message,$headers);
    header("location: researcherprofile.php");
?>