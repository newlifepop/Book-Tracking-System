<?php
session_start();

$_SESSION['student_name'] = $_POST['student_name'];
$_SESSION['student_gender'] = $_POST['student_gender'];
$_SESSION['dept'] = $_POST['dept'];
$_SESSION['parent'] = $_POST['parent'];
$_SESSION['advisor'] = $_POST['advisor'];
$_SESSION['year'] = $_POST['year'];
$_SESSION['gpa'] = $_POST['gpa'];
$_SESSION['phone'] = $_POST['phone'];

$student_name = $mysqli->escape_string($_POST['student_name']);
$student_gender = $mysqli->escape_string($_POST['student_gender']);
$dept = $mysqli->escape_string($_POST['dept']);
$parent = $mysqli->escape_string($_POST['parent']);
$advisor = $mysqli->escape_string($_POST['advisor']);
$year = $mysqli->escape_string($_POST['year']);
$gpa = $mysqli->escape_string($_POST['gpa']);
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

	// check if parent exists
	$parent_result = $mysqli->query("SELECT * FROM parent WHERE parent_name = '$parent'") or die($mysqli->error());
	if($parent_result->num_rows == 0){
		$_SESSION['message'] = 'Parent name does not exist, please add parent first';
		header("location: dberror.php");
	}
	else{
		$p_id = $parent_result->fetch_assoc();
		$parent_id = $p_id['parent_id'];

		// check if advisor exists
		$advisor_result = $mysqli->query("SELECT * FROM teacher WHERE teacher_name = '$advisor'") or die($mysqli->error());
		if($advisor_result->num_rows == 0){
			$_SESSION['message'] = 'Advisor name does not exist, please add advisor first';
			header("location: dberror.php");
		}
		else{
			// if advisor is in teacher table but not in advisor table then add teacher to advisor table
			$teacher_result= $advisor_result->fetch_assoc();
			$advisor_id = $teacher_result['teacher_id'];
			$result = $mysqli->query("SELECT * FROM advisor WHERE advisor_id = '$advisor_id'") or die($mysqli->error());
			if($result->num_rows == 0){
				$sql = "INSERT INTO advisor (advisor_id) "."VALUES ('$advisor_id')";
				if($mysqli->query($sql)){

				}
				else{
					$_SESSION['message'] = 'Insert student failed, try again later!';
					header("location: dberror.php");
				}
			}
			// then check if phone number is duplicate
			$phone_result1 = $mysqli->query("SELECT * FROM student WHERE phone_number = $phone") or die($mysqli->error());
			$phone_result2 = $mysqli->query("SELECT * FROM teacher WHERE phone_number = $phone") or die($mysqli->error());
			$phone_result3 = $mysqli->query("SELECT * FROM parent WHERE phone_number = $phone") or die($mysqli->error());
			if($phone_result1->num_rows > 0 or $phone_result2->num_rows > 0 or $phone_result3->num_rows > 0){
					$_SESSION['message'] = 'Duplicate phone number';
					header("location: dberror.php");
			}
			else{
				// then insert student
				$sql = '';
				if(!empty($student_id)){
					$sql = "INSERT INTO student (student_id, student_name, student_gender, parent_id, dept_id, advisor_id, year, gpa, phone_number) "
				."VALUES ($student_id, '$student_name', '$student_gender', '$parent_id', '$dept_id', '$advisor_id', '$year', '$gpa', '$phone')";
				}
				else{
					$sql = "INSERT INTO student (student_name, student_gender, parent_id, dept_id, advisor_id, year, gpa, phone_number) "
				."VALUES ('$student_name', '$student_gender', '$parent_id', '$dept_id', '$advisor_id', '$year', '$gpa', '$phone')";
				}
				if($mysqli->query($sql)){
					$_SESSION['message'] = 'Insert a student successful!';
					header("location: success.php");
				}
				else{
					$_SESSION['message'] = 'Insert a student failed! Try again later!'.$dept_result->num_rows;
					header("location: dberror.php");
				}
			}
		}
	}
}

?>