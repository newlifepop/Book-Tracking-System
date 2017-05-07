<?php
require 'booktrackingdb.php'
?>

<?php
session_start();
$message = $_SESSION['message'];
$student_name = $_SESSION['student_name'];
$student_id = $_SESSION['student_id'];
$dept_name = $_SESSION['dept_name'];

$sql = "SELECT * FROM student WHERE";
if(!empty($student_name)){
	$sql = $sql.' student_name = "'.$student_name.'"';
}
if(!empty($student_id)){
	if(!empty($student_name)){
		$sql = $sql.' AND student_id = '.$student_id;
	}
	else{
		$sql = $sql.' student_id = '.$student_id;
	}
}
if(!empty($dept_name)){
	$dept_result = $mysqli->query("SELECT * FROM dept WHERE dept_name = '$dept_name'");
	if($dept_result->num_rows == 0){
		$_SESSION['message'] = $dept_name.' does not exist, add it to department table first!';
		header("location: dberror.php");
	}
	else{
		$dept_id = $dept_result->fetch_assoc()['dept_id'];
		if(!empty($teacher_name) OR !empty($teacher_id)){
			$sql = $sql.' AND dept_id = '.$dept_id;
		}
		else{

			$sql = $sql.' dept_id = '.$dept_id;
		}
	}
}
$sql = $sql.' ORDER BY student_id';
$records = $mysqli->query($sql) or die($mysqli->error);
$counter = $records->num_rows;
?>

<!DOCTYPE html>
<html>
<head>
<style>h1{color:white;text-align: center;}</style>
	<meta charset="utf-8">
	<title>Display Student</title>
	<link rel="stylesheet" type="text/css" href="css/displaystudentstyle.css">
	<h1><?php echo 'Total records: '.$counter ?></h1>
</head>

<body>
	<div>
		<?php
			while($student = $records->fetch_assoc()){
				$dept_result = $mysqli->query("SELECT * FROM dept WHERE dept_id = ".$student['dept_id']);
				$dept_name = $dept_result->fetch_assoc()['dept_name'];

				$book_name = 'NULL';
				$book_result = $mysqli->query("SELECT * FROM book WHERE book_id = ".$student['book_id']);
				if($book_result->num_rows > 0){
					$book_name = $book_result->fetch_assoc()['book_name'];
				}

				$parent_name = 'NULL';
				$parent_result = $mysqli->query("SELECT * FROM parent WHERE parent_id = ".$student['parent_id']);
				if($parent_result->num_rows > 0){
					$parent_name = $parent_result->fetch_assoc()['parent_name'];
				}

				if($message === 'search'){
					echo "<table class=form width=100% border=1 cellpadding=1 cellspacing=1>";
				}
				elseif($message === 'update'){
					echo "<form id=modifystudent action=modifystudent.php method=post>";
					echo "<table onclick=modifystudent.submit() class=form width=100% border=1 cellpadding=1 cellspacing=1>";
				}
				elseif($message === 'remove'){
					echo "<form id=deletestudent action=deletestudent.php method=post>";
					echo "<table onclick=deletestudent.submit() class=form width=100% border=1 cellpadding=1 cellspacing=1>";
				}
				echo "<tr>";
				echo "<th>ID</th>";
				echo "<th>Name</th>";
				echo "<th>Gender</th>";
				echo "<th>Parent</th>";
				echo "<th>Department</th>";
				echo "<th>Year</th>";
				echo "<th>GPA</th>";
				echo "<th>Phone #</th>";
				echo "<th>Book</th>";
				echo "</tr>";

				echo "<tr class=field-wrap>";
				echo "<td>".$student['student_id']."</td>";
				echo "<td>".$student['student_name']."</td>";
				echo "<td>".$student['student_gender']."</td>";
				echo "<td>".$parent_name."</td>";
				echo "<td>".$dept_name."</td>";
				echo "<td>".$student['year']."</td>";
				echo "<td>".$student['gpa']."</td>";
				echo "<td>".$student['phone_number']."</td>";
				echo "<td>".$book_name."</td>";
				echo "</tr>";
				echo "</table>";
				$_SESSION['message'] = $student['student_id'];
				if($message === 'update' OR $message === 'remove'){
					echo "</form>";
				}
			}
		?>
		<form id="back" action="profile.php" method="post">
		<button type="submit" onclick="profile.submit()" class="button button-block " name="back">Back</button>
		</form>
	</div>
</body>
</html>