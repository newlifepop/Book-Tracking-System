<?php
$message = $_SESSION['message'];
session_start();
$_SESSION['parent_id'] = $_POST['parent_id'];
$_SESSION['parent_name'] = $_POST['parent_name'];
$_SESSION['phone'] = $_POST['phone'];

$parent_name = $mysqli->escape_string($_POST['parent_name']);
$phone = $mysqli->escape_string($_POST['phone']);
$parent_id = $mysqli->escape_string($_POST['parent_id']);

if(empty($parent_name) AND empty($parent_id) AND empty($phone)){
	$_SESSION['message'] = 'Cannot search for a parent without any information!';
	header("location: dberror.php");
}
else{
	$_SESSION['parent_id'] = $parent_id;
	$_SESSION['parent_name'] = $parent_name;
	$_SESSION['phone'] = $phone;
	$_SESSION['message'] = $message;
	header("location: displayparent.php");
}
?>