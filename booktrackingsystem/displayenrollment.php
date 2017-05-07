<?php
require 'booktrackingdb.php'
?>

<?php
session_start();
$message = $_SESSION['message'];
$class_id = $_SESSION['class_id'];
$student_id = $_SESSION['student_id'];
$grade = $_SESSION['grade'];

$sql = "SELECT * FROM enroll WHERE";
if(!empty($class_id)){
	$sql = $sql.' class_id = "'.$class_id.'"';
}
if(!empty($student_id)){
	if(!empty($class_id)){
		$sql = $sql.' AND student_id = '.$student_id;
	}
	else{
		$sql = $sql.' student_id = '.$student_id;
	}
}
if(!empty($grade)){
	if(!empty($class_id) OR !empty($student_id)){
		$sql = $sql.' AND grade = '.$grade;
	}
	else{
		$sql = $sql.' grade = '.$grade;
	}
}
$sql = $sql.' ORDER BY class_id';
$records = $mysqli->query($sql) or die($mysqli->error);
$counter = $records->num_rows;
?>

<!DOCTYPE html>
<html>
<head>
<style>h1{color:white;text-align: center;}</style>
	<meta charset="utf-8">
	<title>Display Enrollment</title>
	<link rel="stylesheet" type="text/css" href="css/displayenrollmentstyle.css">
	<h1><?php echo 'Total records: '.$counter ?></h1>
</head>

<body>
	<div>
		<?php
			while($enrollment = $records->fetch_assoc()){
				$class_result = $mysqli->query("SELECT * FROM class WHERE class_id = ".$enrollment['class_id']);
				$class_name = $class_result->fetch_assoc()['class_name'];

				$student_name = 'NULL';
				$student_result = $mysqli->query("SELECT * FROM student WHERE student_id = ".$enrollment['student_id']);
				if($student_result->num_rows > 0){
					$student_name = $student_result->fetch_assoc()['student_name'];
				}

				if($message === 'search'){
					echo "<table class=form width=100% border=1 cellpadding=1 cellspacing=1>";
				}
				elseif($message === 'update'){
					echo "<form id=modifyenrollment action=modifyenrollment.php method=post>";
					echo "<table onclick=modifyenrollment.submit() class=form width=100% border=1 cellpadding=1 cellspacing=1>";
				}
				elseif($message === 'remove'){
					echo "<form id=deleteenrollment action=deleteenrollment.php method=post>";
					echo "<table onclick=deleteenrollment.submit() class=form width=100% border=1 cellpadding=1 cellspacing=1>";
				}
				echo "<tr>";
				echo "<th>Class</th>";
				echo "<th>Student</th>";
				echo "<th>Grade</th>";
				echo "</tr>";

				echo "<tr class=field-wrap>";
				echo "<td>".$class_name."</td>";
				echo "<td>".$student_name."</td>";
				echo "<td>".$enrollment['grade']."</td>";
				echo "</tr>";
				echo "</table>";
				$_SESSION['message'] = $enrollment['class_id'].'|'.$enrollment['student_id'];
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