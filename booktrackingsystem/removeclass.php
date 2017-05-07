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
	<title>Remove Class</title>
	<link rel="stylesheet" type="text/css" href="css/addstudentstyle.css">
</head>

<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	if(isset($_POST['search'])){
		$_SESSION['message'] = 'remove';
		require 'checkclass.php';
	}
}
?>

<body>
	<div class="form">
		<h1>Remove Class</h1>
		<form action="removeclass.php" method="post" autocomplete="off">
			<div class="field-wrap">
				<label>Class ID<span class="req">*</span></label>
				<input type="number" min="0" required autocomplete="off" name="class_id">
			</div>

			<div class="field-wrap">
				<label>Name</label>
				<input type="text" autocomplete="off" name="class_name">
			</div>

			<div class="field-wrap">
				<label>Department</label>
				<input type="text" autocomplete="off" name="dept_name">
			</div>

			<div class="field-wrap">
				<label>Teacher</label>
				<input type="text" autocomplete="off" name="teacher_name">
			</div>
			<button class="button button-block" name="search">Search</button>
		</form>
	</div>
</body>
</html>