<?php
session_start();
$message = $_SESSION['message'];
$_SESSION['advisor_name'] = $_POST['advisor_name'];
$_SESSION['dept_name'] = $_POST['dept_name'];

$advisor_name = $mysqli->escape_string($_POST['advisor_name']);
$dept_name = $mysqli->escape_string($_POST['dept_name']);

if(empty($advisor_name) AND empty($dept_name)){
	$_SESSION['message'] = 'Cannot search for an advisor without any information!';
	header("location: dberror.php");
}
else{
	$_SESSION['advisor_name'] = $advisor_name;
	$_SESSION['dept_name'] = $dept_name;
	$_SESSION['message'] = $message;
	header("location: displayadvisor.php");
}
?>