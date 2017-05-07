<?php
require 'booktrackingdb.php'
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Add Enrollment</title>
	<link rel="stylesheet" type="text/css" href="css/addteacherstyle.css">
</head>

<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	if(isset($_POST['insert'])){
		require 'insertenrollment.php';
	}
}
?>

<body>
	<div class="form">
		<h1>Add Enrollment</h1>
		<form action="addenrollment.php" method="post" autocomplete="off">
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
			<button class="button button-block" name="insert">Insert</button>
		</form>
	</div>
</body>
</html>