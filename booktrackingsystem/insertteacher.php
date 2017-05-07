<?php
session_start();

$_SESSION['teacher_name'] = $_POST['teacher_name'];
$_SESSION['dept'] = $_POST['dept'];
$_SESSION['phone'] = $_POST['phone'];

$teacher_name = $mysqli->escape_string($_POST['teacher_name']);
$dept = $mysqli->escape_string($_POST['dept']);
$phone = $mysqli->escape_string($_POST['phone']);

// check if dept exists
$dept_result = $mysqli->query("SELECT * FROM dept WHERE dept_name = '$dept'") or die($mysqli->error());
if($dept_result->num_rows == 0){
	$_SESSION['message'] = 'Department does not exist, please add department first';
	header("location: dberror.php");
}
else{
	$d_id = $dept_result->fetch_assoc();
	$dept_id = $d_id['dept_id'];
	// then check if phone number is duplicate
	$phone_result1 = $mysqli->query("SELECT * FROM student WHERE phone_number = $phone") or die($mysqli->error());
	$phone_result2 = $mysqli->query("SELECT * FROM teacher WHERE phone_number = $phone") or die($mysqli->error());
	$phone_result3 = $mysqli->query("SELECT * FROM parent WHERE phone_number = $phone") or die($mysqli->error());
	if($phone_result1->num_rows > 0 or $phone_result2->num_rows > 0 or $phone_result3->num_rows > 0){
		$_SESSION['message'] = 'Duplicate phone number';
		header("location: dberror.php");
	}
	else{
		// then insert teacher
		$sql = "INSERT INTO teacher (teacher_name, dept_id, phone_number) "
			."VALUES ('$teacher_name', '$dept_id', '$phone')";
		if($mysqli->query($sql)){
			$_SESSION['message'] = 'Insert a teacher successful!';
			header("location: success.php");
		}
		else{
			$_SESSION['message'] = 'Insert a teacher failed! Try again later!';
			header("location: dberror.php");
		}
	}
}

?>