<?php
session_start();
include dirname(__DIR__).'/general/openDB.php';
$result = mysqli_query($link, "SELECT data_access_code FROM researcher WHERE researcher_id = $_SESSION[id]")   
or 
die("Could not issue MySQL query"); 
while ($row = $result->fetch_assoc()) {
    $code = $row["data_access_code"];
}
if ($_POST['verification_code'] == $code) {
    mysqli_query($link, "UPDATE researcher SET data_access = 1 WHERE researcher_id = $_SESSION[id]")
    or 
    die("Could not issue MySQL query");     
    header("location: researcherstart.php");
}
else {
    header("location: researcherprofile.php");
}
?>