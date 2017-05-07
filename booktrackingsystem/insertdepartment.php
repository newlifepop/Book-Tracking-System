<?php
session_start();

$_SESSION['dept_name'] = $_POST['dept_name'];
$dept_name = $mysqli->escape_string($_POST['dept_name']);

// check if dept exists
$dept_result = $mysqli->query("SELECT * FROM dept WHERE dept_name = '$dept_name'") or die($mysqli->error());
if($dept_result->num_rows > 0){
	$_SESSION['message'] = 'Department already exists, please add another department';
	header("location: dberror.php");
}
else{
	// then insert department
	$sql = "INSERT INTO dept (dept_name) "."VALUES ('$dept_name')";
	if($mysqli->query($sql)){
		$_SESSION['message'] = 'Insert a department successful!';
		header("location: success.php");
	}
	else{
		$_SESSION['message'] = 'Insert a department failed! Try again later!';
		header("location: dberror.php");
	}
}

?>