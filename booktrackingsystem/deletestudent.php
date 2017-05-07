<?php
require 'booktrackingdb.php';
session_start();
$id = (int)$_SESSION['message'];
$sql = "DELETE FROM student WHERE student_id = ".$id;
if($mysqli->query($sql)){
	$_SESSION['message'] = 'Removing student successful!';
	header("location: success.php");
}
else{
	$_SESSION['message'] = 'Removing student failed, try agin later!';
	header("location: dberror.php");
}
?>