<?php
require 'booktrackingdb.php'
?>

<?php
session_start();
$_SESSION['message'] = 'update';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Update Teacher</title>
	<link rel="stylesheet" type="text/css" href="css/addstudentstyle.css">
</head>

<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	if(isset($_POST['search'])){
		$_SESSION['message'] = 'update';
		require 'checkteacher.php';
	}
}
?>

<body>
	<div class="form">
		<h1>Update Teacher</h1>
		<form action="updateteacher.php" method="post" autocomplete="off">
			<div class="field-wrap">
				<label>Teacher ID<span class="req">*</span></label>
				<input type="number" min="0" required autocomplete="off" name="teacher_id">
			</div>

			<div class="field-wrap">
				<label>Name</label>
				<input type="text" autocomplete="off" name="teacher_name">
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