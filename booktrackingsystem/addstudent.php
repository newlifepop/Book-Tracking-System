<?php
require 'booktrackingdb.php'
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Add Student</title>
	<link rel="stylesheet" type="text/css" href="css/addstudentstyle.css">
</head>

<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	if(isset($_POST['insert'])){
		require 'insertstudent.php';
	}
}
?>

<body>
	<div class="form">
		<h1>Add Student</h1>
		<form action="addstudent.php" method="post" autocomplete="off">
			<div class="field-wrap">
				<label>Name<span class="req">*</span></label>
				<input type="text" required autocomplete="off" name="student_name">
			</div>

			<div class="field-wrap">
				<label>Gender<span class="req">*</span></label>
				<input type="text" required autocomplete="off" name="student_gender">
			</div>

			<div class="field-wrap">
				<label>Department<span class="req">*</span></label>
				<input type="text" required autocomplete="off" name="dept">
			</div>

			<div class="field-wrap">
				<label>Parent<span class="req">*</span></label>
				<input type="text" required autocomplete="off" name="parent">
			</div>

			<div class="field-wrap">
				<label>Advisor<span class="req">*</span></label>
				<input type="text" required autocomplete="off" name="advisor">
			</div>

			<div class="field-wrap">
				<label>Year<span class="req">*</span></label>
				<input type="number" min="0" required autocomplete="off" name="year">
			</div>

			<div class="field-wrap">
				<label>GPA<span class="req">*</span></label>
				<input type="number" min="0" required autocomplete="off" name="gpa">
			</div>

			<div class="field-wrap">
				<label>Phone #<span class="req">*</span></label>
				<input type="number" min="0" required autocomplete="off" name="phone">
			</div>
			<button class="button button-block" name="insert">Insert</button>
		</form>
	</div>
</body>
</html>