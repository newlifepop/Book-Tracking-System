<?php
session_start();

$_SESSION['parent_name'] = $_POST['parent_name'];
$_SESSION['phone'] = $_POST['phone'];

$parent_name = $mysqli->escape_string($_POST['parent_name']);
$phone = $mysqli->escape_string($_POST['phone']);

// then insert teacher
$sql = "INSERT INTO parent (parent_name, phone_number) "
			."VALUES ('$parent_name', '$phone')";
// then check if phone number is duplicate
$phone_result1 = $mysqli->query("SELECT * FROM student WHERE phone_number = $phone") or die($mysqli->error());
$phone_result2 = $mysqli->query("SELECT * FROM teacher WHERE phone_number = $phone") or die($mysqli->error());
$phone_result3 = $mysqli->query("SELECT * FROM parent WHERE phone_number = $phone") or die($mysqli->error());
if($phone_result1->num_rows > 0 or $phone_result2->num_rows > 0 or $phone_result3->num_rows > 0){
	$_SESSION['message'] = 'Duplicate phone number';
	header("location: dberror.php");
}
else{
	if($mysqli->query($sql)){
		$_SESSION['message'] = 'Insert a parent successful!';
		header("location: success.php");
	}
	else{
		$_SESSION['message'] = 'Insert a parent failed! Try again later!';
		header("location: dberror.php");
	}
}

?>