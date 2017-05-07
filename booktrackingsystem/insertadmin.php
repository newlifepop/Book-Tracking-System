<?php
session_start();

$_SESSION['admin_name'] = $_POST['admin_name'];
$admin_name = $mysqli->escape_string($_POST['admin_name']);
// then insert teacher
$sql = "INSERT INTO admin (admin_name) "."VALUES ('$admin_name')";
if($mysqli->query($sql)){
	$_SESSION['message'] = 'Insert an admin successful!';
	header("location: success.php");
}
else{
	$_SESSION['message'] = 'Insert an admin failed! Try again later!';
	header("location: dberror.php");
}
?>