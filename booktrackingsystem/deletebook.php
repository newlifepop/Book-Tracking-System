<?php
require 'booktrackingdb.php';
session_start();
$id = (int)$_SESSION['message'];
$sql = "DELETE FROM book WHERE book_id = ".$id;
if($mysqli->query($sql)){
	$_SESSION['message'] = 'Removing book successful!';
	header("location: success.php");
}
else{
	$_SESSION['message'] = 'Removing book failed, try agin later!';
	header("location: dberror.php");
}
?>