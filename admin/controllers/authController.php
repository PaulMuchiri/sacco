<?php



require 'config/db.php';

$errors = array();

$fname = "";
$lname = "";
$email = "";
//if user clicks on the sin up button
if (isset($_POST['signup-btn'])) {
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$confpassword = $_POST['confpassword'];
//validation
	if (empty($fname)) {
		$errors['fname'] = "First Name required";
	}
	if (empty($lname)) {
		$errors['lname'] = "Last Name required";
	}
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$errors['email'] = "Email is invalid";
	}

	if (empty($email)) {
		$errors['email'] = "Email required";
	}

	if (empty($password)) {
		$errors['password'] = "Password required";
	}

	if ($password !==$confpassword) {
		$errors['password'] = "The two password do not match";
	}

	$emailQuery = "SELECT * FROM users WHERE email=? LIMIT 1";
	$stmt = $conn->prepare($emailQuery);
	$stmt->bind_param('s',$email);
	$stmt->execute();
	$result = $stmt->get_result();
	$userCount = $result->num_rows;
	$stmt->close();

	if ($userCount>0) {
		$errors['email'] = "Email already Exists";
	}


	if (count($errors)===0) {
		$password = password_hash($password, PASSWORD_DEFAULT);
		$token = bin2hex(random_bytes(50));
		$verified = false;
}

if (count($errors)===0) {
	$sql = "INSERT INTO user_register(fname, lname, email, verified, token, password) VALUES (?, ?, ?, ?, ?, ?)";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param('sssbss', $fname, $lname, $email, $verified, $token, $password);
		if($stmt->execute()){
			// login user
			$id = $conn->insert_id;
			$_SESSION['id'] = $id;
			$_SESSION['fname'] = $fname;
			$_SESSION['lname'] = $lname;
			$_SESSION['email'] = $email;
			$_SESSION['verified'] = $verified;
			//set flash message
			$_SESSION['message'] = "Yeah! You are now loged in!";
			$_SESSION['alert-class'] = "alert-success";
			header('location: register.php');
			exit();
		}else{
			$errors['db_error'] = "Database error: failed to register";
		}
	}
}


