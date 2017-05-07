<?php
session_start();
$message = $_SESSION['message'];
$_SESSION['class_id'] = $_POST['class_id'];
$_SESSION['class_name'] = $_POST['class_name'];
$_SESSION['dept_name'] = $_POST['dept_name'];
$_SESSION['teacher_name'] = $_POST['teacher_name'];

$class_name = $mysqli->escape_string($_POST['class_name']);
$dept_name = $mysqli->escape_string($_POST['dept_name']);
$class_id = $mysqli->escape_string($_POST['class_id']);
$teacher_name = $mysqli->escape_string($_POST['teacher_name']);

if(empty($teacher_name) AND empty($class_id) AND empty($dept_name) AND empty($dept_id)){
	$_SESSION['message'] = 'Cannot search for a class without any information!';
	header("location: dberror.php");
}
else{
	$_SESSION['class_id'] = $class_id;
	$_SESSION['class_name'] = $class_name;
	$_SESSION['dept_name'] = $dept_name;
	$_SESSION['teacher_name'] = $teacher_name;
	$_SESSION['message'] = $message;
	header("location: displayclass.php");
}
?>