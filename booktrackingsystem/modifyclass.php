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
	<title>Modify Class</title>
	<link rel="stylesheet" type="text/css" href="css/addclassstyle.css">
</head>

<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	if(isset($_POST['update'])){
		$id = (int)$_SESSION['message'];
		$sql = "DELETE FROM class WHERE class_id = ".$id;
		$mysqli->query($sql);
		require 'insertclass.php';
	}
}
?>

<body>
	<div class="form">
		<h1>Modify Class</h1>
		<form action="modifyclass.php" method="post" autocomplete="off">
			<div class="field-wrap">
				<label>Course Name<span class="req">*</span></label>
				<input type="text" required autocomplete="off" name="class_name">
			</div>

			<div class="field-wrap">
				<label>Course Number<span class="req">*</span></label>
				<input type="number" min="0" required autocomplete="off" name="class_id">
			</div>

			<div class="field-wrap">
				<label>Department<span class="req">*</span></label>
				<input type="text" required autocomplete="off" name="dept_name">
			</div>

			<div class="field-wrap">
				<label>Teacher<span class="req">*</span></label>
				<input type="text" required autocomplete="off" name="teacher_name">
			</div>
			<button class="button button-block" name="update">Update</button>
		</form>
	</div>
</body>
</html>