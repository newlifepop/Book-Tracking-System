<?php
session_start();
$message = $_SESSION['message'];
$_SESSION['teacher_id'] = $_POST['teacher_id'];
$_SESSION['teacher_name'] = $_POST['teacher_name'];
$_SESSION['dept_name'] = $_POST['dept_name'];

$teacher_name = $mysqli->escape_string($_POST['teacher_name']);
$dept_name = $mysqli->escape_string($_POST['dept_name']);
$teacher_id = $mysqli->escape_string($_POST['teacher_id']);

if(empty($teacher_name) AND empty($teacher_id) AND empty($dept_name)){
	$_SESSION['message'] = 'Cannot search for a teacher without any information!';
	header("location: dberror.php");
}
else{
	$_SESSION['teacher_id'] = $teacher_id;
	$_SESSION['teacher_name'] = $teacher_name;
	$_SESSION['dept_name'] = $dept_name;
	$_SESSION['message'] = $message;
	header("location: displayteacher.php");
}
?>