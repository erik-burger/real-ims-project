
<?php 
session_start();
$id = $_SESSION["id"];

$f_name = $m_name = $l_name = $phone = $street = $street_no = $city = $country = $zip = $email = $psw = '';
$errors = array('f_name' =>'', 'm_name' => '', 'l_name'=>'', 'phone'=>'', 'street' => '', 'street_no' => '', 
'city' => '', 'country' => '', 'zip' => '', 'email' => '', 'psw' => '');

if(isset($_POST["submit"])){
    include dirname(__DIR__).'/general/openDB.php';
			
	if (empty($_POST["f_name"])){
		$errors['f_name'] = "First name is required";
	}else{
		$f_name = $link->real_escape_string($_POST["f_name"]);	
		$f_name = htmlspecialchars($f_name); 	
		if(!preg_match('/^[a-z A-Z -]+$/', $f_name)){
			$errors['f_name'] = "Name can be letters and dashes only";
		}
	}
	
	if(!empty($_POST["m_name"])){	
		if(!preg_match('/[a-z A-Z - \s]+/', $_POST["m_name"])){
			$errors['m_name'] = "Middle can must be letters, spacing and dashes only";
		}else{
			$m_name = $link->real_escape_string($_POST["m_name"]);
			$m_name = htmlspecialchars($m_name); 
		}
	}

	if (empty($_POST["l_name"])){
		$errors['l_name'] = "Last name is required";
	}else{
		$l_name = $link->real_escape_string($_POST["l_name"]);
		$l_name = htmlspecialchars($l_name); 
		if(!preg_match('/^[a-z A-Z -]+$/', $l_name)){
			$errors['l_name']= "Last name can be letters and dashes only";
		}
	}
		
	if (empty($_POST["phone"])){
		$errors['phone'] = "Phone number is required";
	}else{
		$phone = $_POST["phone"];
	}

	if (empty($_POST["street"])){
		$errors['street'] = "Street is required";
	}else{
		$street = $link->real_escape_string($_POST["street"]);
		$street = htmlspecialchars($street); 
		if(!preg_match('/^[a-z A-Z]+$/', $street)){
			$errors['street'] = "Street can be letters only";
		}
	}		

	if (empty($_POST["street_no"])){
		$errors['street_no'] = "Street number is required";
	}else{
		$street_no = $link->real_escape_string($_POST["street_no"]);
		$street_no = htmlspecialchars($street_no); 
		if(!preg_match('/^[0-9]+[a-z A-Z]?/', $street_no)){
			$errors['street_no'] = "Must be number and can contain a letter";
		}
	}

	if (empty($_POST["city"])){
		$errors['city'] = "City is required";
	}else{
		$city = $link->real_escape_string($_POST["city"]);
		$city = htmlspecialchars($city); 
		if(!preg_match('/^[a-z A-Z]+$/', $city)){
			$errors['city'] = "Must contain letters only";
		}
	}

	if (empty($_POST["country"])){
		$errors['country'] = "Country is required";
	}else{
		$country = $link->real_escape_string($_POST["country"]);
		$country = htmlspecialchars($country); 
		if(!preg_match('/^[a-z A-Z]+$/', $country)){
			$errors['country'] = "Must contain letters only";
		}		
	}

	if (empty($_POST["zip"])){
		$errors['zip'] = "Zip is required";
	}else{
		$zip = $link->real_escape_string($_POST["zip"]);
		$zip = htmlspecialchars($zip); 
		if(!preg_match('/^[0-9]+$/', $zip)){
			$errors['zip'] = "Must be numbers only";
		}
	}

	if (empty($_POST["email"])){
		$errors['email'] = "Email is required";
	}else{
		$email = $link->real_escape_string($_POST["email"]);
		$email = filter_var($email, FILTER_SANITIZE_EMAIL);
		$email = htmlspecialchars($email); 
		
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$errors['email'] = "Not a valid email";
		
		}else{			
			$sql_email = "SELECT * FROM doctor WHERE email = '$email'";
			$result = mysqli_query($link, $sql_email);
			
			if(mysqli_num_rows($result)>0){
				$errors['email'] = "Email adress already registered, please use another email";
			}
		}
	}
$psw = $_POST["psw"];

//get the hashed password
$psw_result = mysqli_query($link, "select password_hash from caregiver where caregiver_id = $id");
$psw_row = mysqli_fetch_row($psw_result);
$password_hash = $psw_row[0];

if(password_verify($psw, $password_hash)){

    $sql = "update caregiver set first_name = '$f_name', 
        middle_name = '$m_name', 
        last_name = '$l_name', 
        email = '$email',  
        street = '$street', 
        street_no = '$street_no', 
        city = '$city', 
        country = '$country', 
        zip = '$zip', 
        phone = '$phone_no'
        where caregiver_id = '$id'";  

    if (mysqli_query($link, $sql)) {
        echo "New record created successfully";
        include dirname(__DIR__).'/general/closeDB.php';
        header("location: caregiverprofile.php");

    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($link);
    }
}else{
    echo "Password incorrect.";
    include dirname(__DIR__).'/general/closeDB.php';
    header("location: change_info_caregiver.php");
}

include dirname(__DIR__).'/general/closeDB.php';
}
?> 