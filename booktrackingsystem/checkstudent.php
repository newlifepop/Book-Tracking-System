<?php
$message = $_SESSION['message'];
session_start();
$_SESSION['student_id'] = $_POST['student_id'];
$_SESSION['student_name'] = $_POST['student_name'];
$_SESSION['dept_name'] = $_POST['dept_name'];

$student_name = $mysqli->escape_string($_POST['student_name']);
$dept_name = $mysqli->escape_string($_POST['dept_name']);
$student_id = $mysqli->escape_string($_POST['student_id']);

if(empty($student_name) AND empty($student_id) AND empty($dept_name)){
	$_SESSION['message'] = 'Cannot search for a student without any information!';
	header("location: dberror.php");
}
else{
	$_SESSION['student_id'] = $student_id;
	$_SESSION['student_name'] = $student_name;
	$_SESSION['dept_name'] = $dept_name;
	$_SESSION['message'] = $message;
	header("location: displaystudent.php");
}
?>