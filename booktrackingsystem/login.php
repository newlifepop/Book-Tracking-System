<?php
$email = $mysqli->escape_string($_POST['email']);
$result = $mysqli->query("SELECT * FROM account WHERE email='$email'");

if($result->num_rows == 0){	// User doesn't exist
	$_SESSION['message'] = "Account doesn't exist!";
	header("location: error.php");
}
else{
	$user = $result->fetch_assoc();

	if(password_verify($_POST['password'], $user['password'])){
		$_SESSION['email'] = $user['email'];
		$_SESSION['firstname'] = $user['firstname'];
		$_SESSION['lastname'] = $user['lastname'];

		// This is how we'll know the user is logged in
		$_SESSION['logged_in'] = true;
		header("location: profile.php");
	}
	else{
		$_SESSION['message'] = "Wrong password!";
		header("location: error.php");
	}
}
?>