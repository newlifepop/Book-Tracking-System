<?php
require 'booktrackingdb.php';
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Update Student</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/addstudentstyle.css">
</head>

<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	if(isset($_POST['update'])){
		$id = (int)$_SESSION['message'];
		$sql = "DELETE FROM student WHERE student_id = ".$id;
		$mysqli->query($sql);
		require 'insertstudent.php';
	}
}
?>

<body>
	<div class="form">
		<h1>Update Student</h1>
		<form action="modifystudent.php" method="post" autocomplete="off">
			<div class="field-wrap">
				<label>New Name<span class="req">*</span></label>
				<input type="text" required autocomplete="off" name="student_name">
			</div>

			<div class="field-wrap">
				<label>Gender<span class="req">*</span></label>
				<input type="text" required autocomplete="off" name="student_gender">
			</div>

			<div class="field-wrap">
				<label>New Department<span class="req">*</span></label>
				<input type="text" required autocomplete="off" name="dept">
			</div>

			<div class="field-wrap">
				<label>Parent<span class="req">*</span></label>
				<input type="text" required autocomplete="off" name="parent">
			</div>

			<div class="field-wrap">
				<label>New Advisor<span class="req">*</span></label>
				<input type="text" required autocomplete="off" name="advisor">
			</div>

			<div class="field-wrap">
				<label>Year<span class="req">*</span></label>
				<input type="number" min="0" required autocomplete="off" name="year">
			</div>

			<div class="field-wrap">
				<label>New GPA<span class="req">*</span></label>
				<input type="number" min="0" required autocomplete="off" name="gpa">
			</div>

			<div class="field-wrap">
				<label>New Phone #<span class="req">*</span></label>
				<input type="number" min="0" required autocomplete="off" name="phone">
			</div>
			<button class="button button-block" name="update">Update</button>
		</form>
	</div>
</body>
</html>