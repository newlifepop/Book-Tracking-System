<?php
require 'booktrackingdb.php';
session_start();
$id = (int)$_SESSION['message'];
$sql = "DELETE FROM admin WHERE admin_id = ".$id;
if($mysqli->query($sql)){
	$_SESSION['message'] = 'Removing admin successful!';
	header("location: success.php");
}
else{
	$_SESSION['message'] = 'Removing admin failed, try agin later!';
	header("location: dberror.php");
}
?>