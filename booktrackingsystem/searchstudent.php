<?php
require 'booktrackingdb.php'
?>

<?php
session_start();
$_SESSION['message'] = 'search';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Search for Student</title>
	<link rel="stylesheet" type="text/css" href="css/addstudentstyle.css">
</head>

<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	if(isset($_POST['search'])){
		$_SESSION['message'] = 'search';
		require 'checkstudent.php';
	}
}
?>

<body>
	<div class="form">
		<h1>Search for Student</h1>
		<form action="searchstudent.php" method="post" autocomplete="off">
			<div class="field-wrap">
				<label>Student ID</label>
				<input type="number" min="0" autocomplete="off" name="student_id">
			</div>

			<div class="field-wrap">
				<label>Name</label>
				<input type="text" autocomplete="off" name="student_name">
			</div>

			<div class="field-wrap">
				<label>Department</label>
				<input type="text" autocomplete="off" name="dept_name">
			</div>
			<button class="button button-block" name="search">Search</button>
		</form>
	</div>
</body>
</html>