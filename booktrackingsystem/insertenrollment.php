<?php
session_start();

$_SESSION['class_id'] = $_POST['class_id'];
$_SESSION['student_id'] = $_POST['student_id'];
$_SESSION['grade'] = $_POST['grade'];

$class_id = $mysqli->escape_string($_POST['class_id']);
$student_id = $mysqli->escape_string($_POST['student_id']);
$grade = $mysqli->escape_string($_POST['grade']);

// check if class exists
$class_result = $mysqli->query("SELECT * FROM class WHERE class_id = $class_id") or die($mysqli->error());
if($class_result->num_rows == 0){
	$_SESSION['message'] = 'Class does not exist, please add this class first';
	header("location: dberror.php");
}
else{
	// then check if student exists
	$student_result = $mysqli->query("SELECT * FROM student WHERE student_id = $student_id") or die($mysqli->error());
	if($student_result->num_rows == 0){
		$_SESSION['message'] = 'Student does not exist, please add this student first';
		header("location: dberror.php");
	}
	else{
		// then insert enrollment
		$sql = "INSERT INTO enroll (class_id, student_id, grade) "
			."VALUES ($class_id, $student_id, $grade)";
		if($mysqli->query($sql)){
			$_SESSION['message'] = 'Insert an enrollment successful!';
			header("location: success.php");
		}
		else{
			$_SESSION['message'] = 'Insert an enrollment failed! Try again later!';
			header("location: dberror.php");
		}
	}
}

?>