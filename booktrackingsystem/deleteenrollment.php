<?php
require 'booktrackingdb.php';
session_start();
$token = strtok($_SESSION['message'], "|");
$c_id = $token;
$token = strtok("|");
$s_id = $token;
$sql = "DELETE FROM enroll WHERE class_id = ".$c_id." AND student_id = ".$s_id;
if($mysqli->query($sql)){
	$_SESSION['message'] = 'Removing enrollment successful!';
	header("location: success.php");
}
else{
	$_SESSION['message'] = 'Removing enrollment failed, try agin later!';
	header("location: dberror.php");
}
?>