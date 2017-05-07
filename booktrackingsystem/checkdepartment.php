<?php
session_start();
$message = $_SESSION['message'];
$_SESSION['dept_id'] = $_POST['dept_id'];
$_SESSION['dept_name'] = $_POST['dept_name'];

$dept_id = $mysqli->escape_string($_POST['dept_id']);
$dept_name = $mysqli->escape_string($_POST['dept_name']);

if(empty($dept_id) AND empty($dept_name)){
	$_SESSION['message'] = 'Cannot search for a department without any information!';
	header("location: dberror.php");
}
else{
	$_SESSION['dept_id'] = $dept_id;
	$_SESSION['dept_name'] = $dept_name;
	$_SESSION['message'] = $message;
	header("location: displaydepartment.php");
}
?>