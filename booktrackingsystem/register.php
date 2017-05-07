<?php
$_SESSION['email'] = $_POST['email'];
$_SESSION['firstname'] = $_POST['firstname'];
$_SESSION['lastname'] = $_POST['lastname'];

$firstname = $mysqli->escape_string($_POST['firstname']);
$lastname = $mysqli->escape_string($_POST['lastname']);
$email = $mysqli->escape_string($_POST['email']);
$password = $mysqli->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));
$hash = $mysqli->escape_string(md5(rand(0,1000)));

$result = $mysqli->query("SELECT * FROM account WHERE email = '$email'") or die($mysqli->error());

if($result->num_rows > 0){
	$_SESSION['message'] = 'User with this email already exists!';
	header("location: error.php");
}
else{
	$sql = "INSERT INTO account (firstname, lastname, email, password, hash) "
	. "VALUES ('$firstname', '$lastname', '$email', '$password', '$hash')";

	if($mysqli->query($sql)){
		header("location: profile.php");
	}
	else{
		$_SESSION['message'] = 'Registration failed, try again later!';
		header("location: error.php");
	}
}
?>