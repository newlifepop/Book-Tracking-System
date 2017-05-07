<?php
require 'booktrackingdb.php';
session_start();
$id = (int)$_SESSION['message'];
$sql = "DELETE FROM dept WHERE dept_id = ".$id;
if($mysqli->query($sql)){
	$_SESSION['message'] = 'Removing department successful!';
	header("location: success.php");
}
else{
	$_SESSION['message'] = 'Removing department failed, try agin later!';
	header("location: dberror.php");
}
?>