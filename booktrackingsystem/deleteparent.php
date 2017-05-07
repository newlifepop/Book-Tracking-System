<?php
require 'booktrackingdb.php';
session_start();
$id = (int)$_SESSION['message'];
$sql = "DELETE FROM parent WHERE parent_id = ".$id;
if($mysqli->query($sql)){
	$_SESSION['message'] = 'Removing parent successful!';
	header("location: success.php");
}
else{
	$_SESSION['message'] = 'Removing parent failed, try agin later!';
	header("location: dberror.php");
}
?>