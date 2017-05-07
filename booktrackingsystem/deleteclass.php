<?php
require 'booktrackingdb.php';
session_start();
$id = (int)$_SESSION['message'];
$sql = "DELETE FROM class WHERE class_id = ".$id;
if($mysqli->query($sql)){
	$_SESSION['message'] = 'Removing class successful!';
	header("location: success.php");
}
else{
	$_SESSION['message'] = 'Removing class failed, try agin later!';
	header("location: dberror.php");
}
?>