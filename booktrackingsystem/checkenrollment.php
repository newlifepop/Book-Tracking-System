<?php
session_start();
$message = $_SESSION['message'];
$_SESSION['student_id'] = $_POST['student_id'];
$_SESSION['class_id'] = $_POST['class_id'];
$_SESSION['grade'] = $_POST['grade'];

$class_id = $mysqli->escape_string($_POST['class_id']);
$grade = $mysqli->escape_string($_POST['grade']);
$student_id = $mysqli->escape_string($_POST['student_id']);

if(empty($class_id) AND empty($student_id) AND empty($grade)){
	$_SESSION['message'] = 'Cannot search for enrollment without any information!';
	header("location: dberror.php");
}
else{
	$_SESSION['student_id'] = $student_id;
	$_SESSION['class_id'] = $class_id;
	$_SESSION['grade'] = $grade;
	$_SESSION['message'] = $message;
	header("location: displayenrollment.php");
}
?>