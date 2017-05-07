<?php
session_start();

$_SESSION['class_name'] = $_POST['class_name'];
$_SESSION['class_id'] = $_POST['class_id'];
$_SESSION['dept_name'] = $_POST['dept_name'];
$_SESSION['teacher_name'] = $_POST['teacher_name'];
$_SESSION['book_id'] = $_POST['book_id'];

$teacher_name = $mysqli->escape_string($_POST['teacher_name']);
$dept_name = $mysqli->escape_string($_POST['dept_name']);
$class_id = $mysqli->escape_string($_POST['class_id']);
$class_name = $mysqli->escape_string($_POST['class_name']);
$book_id = $mysqli->escape_string($_POST['book_id']);

// check if dept exists
$dept_result = $mysqli->query("SELECT * FROM dept WHERE dept_name = '$dept_name'") or die($mysqli->error());
if($dept_result->num_rows == 0){
	$_SESSION['message'] = 'Department does not exist, please add department first';
	header("location: dberror.php");
}
else{
	$d_id = $dept_result->fetch_assoc();
	$dept_id = $d_id['dept_id'];
	// then check if course number is duplicate
	$course_result = $mysqli->query("SELECT * FROM class WHERE class_id = $class_id") or die($mysqli->error());
	if($course_result->num_rows > 0){
		$_SESSION['message'] = 'Course already exists, add another class!';
		header("location: dberror.php");
	}
	else{
		// then check course name
		$course_result = $mysqli->query("SELECT * FROM class WHERE class_name = '$class_name'") or die($mysqli->error());
		if($course_result->num_rows > 0){
				$_SESSION['message'] = 'Course already exists, add another class!';
				header("location: dberror.php");
		}
		else{
			// check teacher id
			$teacher_result = $mysqli->query("SELECT * FROM teacher WHERE teacher_name = '$teacher_name'") or die($mysqli->error());
			if($teacher_result->num_rows == 0){
				$_SESSION['message'] = $teacher_name.' is not a teacher, add him/her as a teacher first!';
				header("location: dberror.php");
			}
			else{
				$teacher_id = $teacher_result->fetch_assoc()['teacher_id'];

				// check if book in library
				$book_result = $mysqli->query("SELECT * FROM book WHERE book_id = $book_id");
				if($book_result->num_rows == 0){
					$_SESSION['message'] = 'This book is not in library, add it first!';
					header("location: dberror.php");
				}
				else{
					// then insert class
					$sql = "INSERT INTO class (class_id, class_name, dept_id, teacher_id) "
					."VALUES ($class_id, '$class_name', $dept_id, $teacher_id)";
					if($mysqli->query($sql)){
						$_SESSION['message'] = 'Insert a class successful!';
						header("location: success.php");
					}
					else{
						$_SESSION['message'] = 'Insert a class failed! Try again later!';
						header("location: dberror.php");
					}
				}
			}
		}
	}
}

?>