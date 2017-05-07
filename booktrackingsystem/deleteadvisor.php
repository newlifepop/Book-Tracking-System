<?php
require 'booktrackingdb.php';
session_start();
$id = (int)$_SESSION['message'];
$sql = "DELETE FROM advisor WHERE advisor_id = ".$id;
if($mysqli->query($sql)){
	$_SESSION['message'] = 'Removing advisor successful!';
	header("location: success.php");
}
else{
	$_SESSION['message'] = 'Removing advisor failed, try agin later!';
	header("location: dberror.php");
}
?>