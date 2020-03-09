<?php 
session_start();
include('incoporate/connect.php');

if (isset($_POST['registerbtn'])) {
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$cpassword = $_POST['confpassword'];

	if ($password === $cpassword) {
	//$query = "INSERT INTO users(username, email,verified,token, password) VALUES ($username, $email, ?, ?, $password)";
	$query = "INSERT INTO register (username,email,password) VALUES ('$username','$email','$password')";
	$run_query = mysqli_query($connection, $query);
	if ($run_query) {
		//echo("Saved");
		$_SESSION['success'] = "Admin profile added successfully";
		header('location: register.php');
	}else{
		//echo("Not saved");
		$_SESSION['status'] = "Admin profile failed to added";
		header('location: register.php');
	}
}else{
	$_SESSION['status'] = "the two passwords don't match";
		header('location: register.php');
	}
}

if (isset($_POST['update_btn'])) {
	$id = $_POST['edit_id'];
	$username = $_POST['edit_username'];
	$email = $_POST['edit_email'];
	$password = $_POST['edit_password'];

	$sql =" UPDATE register SET username='$username', email='$email',password='$password' WHERE id='$id'";
	$sql_run = mysqli_query($connection, $sql);

	if ($sql_run) {
		$_SESSION['success'] = "Data Updated!";
		header('location:register.php');
	}else{
		$_SESSION['status'] = "Data not Updated!";
		header('location:register.php');
	}
}

if (isset($_POST['delete_btn'])) {
	$id = $_POST['delete_id'];
	$sql = "DELETE FROM register WHERE id='$id'";
	$sql_run = mysqli_query($connection, $sql);
	if ($sql_run) {
		$_SESSION['success'] = "Data Deleted successfully!";
		header('location: register.php');
	}else{
		$_SESSION['status'] = " Data fails to delete!";
		header('location: register.php');
	}
}

if (isset($_POST['login_btn'])) {
	$emai_login = $_POST['email'];
	$password_login = $_POST['password'];

	$sql = "SELECT * FROM register WHERE email='$emai_login' AND password='$password_login'";
	$stmt = $connection->prepare($sql);
	$stmt->bind_param('s', $emai_login);
	$stmt->excecute();
	$result= $stmt->get_result();
	$user = $result_>fetch_assoc();


	$sql_run =mysql_query($connection, $sql);
	if (mysqli_fetch_array($sql_run)) {
		$_SESSION['username'] = $emai_login;
		header('location: index.php');
	}else{
		$_SESSION['status'] ="Invalid Email or password";
		header('location: loginadmin.php');
	}
}
?>