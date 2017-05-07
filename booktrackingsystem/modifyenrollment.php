<?php
require 'booktrackingdb.php'
?>

<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Modify Enrollment</title>
	<link rel="stylesheet" type="text/css" href="css/addteacherstyle.css">
</head>

<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	if(isset($_POST['update'])){
		$token = strtok($_SESSION['message'], "|");
		$c_id = (int)$token;
		$token = strtok("|");
		$s_id = (int)$token;

		$sql = "DELETE FROM enroll WHERE class_id = ".$c_id." AND student_id = ".$s_id;
		$mysqli->query($sql);
		require 'insertenrollment.php';
	}
}
?>

<body>
	<div class="form">
		<h1>Modify Enrollment</h1>
		<form action="modifyenrollment.php" method="post" autocomplete="off">
			<div class="field-wrap">
				<label>Course ID<span class="req">*</span></label>
				<input type="text" required autocomplete="off" name="class_id">
			</div>

			<div class="field-wrap">
				<label>Student ID<span class="req">*</span></label>
				<input type="number" min="0" required autocomplete="off" name="student_id">
			</div>

			<div class="field-wrap">
				<label>Grade<span class="req">*</span></label>
				<input type="number" min="0" required autocomplete="off" name="grade">
			</div>
			<button class="button button-block" name="update">Update</button>
		</form>
	</div>
</body>
</html>