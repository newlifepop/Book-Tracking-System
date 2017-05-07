<?php
require 'booktrackingdb.php'
?>

<?php
session_start();
$_SESSION['message'] = 'remove';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Remove Enrollment</title>
	<link rel="stylesheet" type="text/css" href="css/addstudentstyle.css">
</head>

<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	if(isset($_POST['search'])){
		$_SESSION['message'] = 'remove';
		require 'checkenrollment.php';
	}
}
?>

<body>
	<div class="form">
		<h1>Remove Enrollment</h1>
		<form action="removeenrollment.php" method="post" autocomplete="off">
			<div class="field-wrap">
				<label>Class ID<span class="req">*</span></label>
				<input type="number" min="0" required autocomplete="off" name="class_id">
			</div>

			<div class="field-wrap">
				<label>Student ID<span class="req">*</span></label>
				<input type="number" min="0" required autocomplete="off" name="student_id">
			</div>

			<div class="field-wrap">
				<label>Grade</label>
				<input type="number" min="0" autocomplete="off" name="grade">
			</div>
			<button class="button button-block" name="search">Search</button>
		</form>
	</div>
</body>
</html>