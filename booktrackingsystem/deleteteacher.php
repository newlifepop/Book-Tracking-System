<?php
require 'booktrackingdb.php';
session_start();
$id = (int)$_SESSION['message'];
$sql = "DELETE FROM teacher WHERE teacher_id = ".$id;
if($mysqli->query($sql)){
	$_SESSION['message'] = 'Removing teacher successful!';
	header("location: success.php");
}
else{
	$_SESSION['message'] = 'Removing teacher failed, try agin later!';
	header("location: dberror.php");
}
?>