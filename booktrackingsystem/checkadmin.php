<?php
session_start();
$message = $_SESSION['message'];
$_SESSION['admin_id'] = $_POST['admin_id'];
$_SESSION['admin_name'] = $_POST['admin_name'];

$admin_name = $mysqli->escape_string($_POST['admin_name']);
$admin_id = $mysqli->escape_string($_POST['admin_id']);

if(empty($admin_name) AND empty($admin_id)){
	$_SESSION['message'] = 'Cannot search for an admin without any information!';
	header("location: dberror.php");
}
else{
	$_SESSION['admin_id'] = $admin_id;
	$_SESSION['admin_name'] = $admin_name;
	$_SESSION['message'] = $message;
	header("location: displayadmin.php");
}
?>