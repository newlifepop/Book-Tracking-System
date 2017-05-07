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
	<title>Modify Teacher</title>
	<link rel="stylesheet" type="text/css" href="css/addteacherstyle.css">
</head>

<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	if(isset($_POST['update'])){
		$id = (int)$_SESSION['message'];
		$sql = "DELETE FROM teacher WHERE teacher_id = ".$id;
		$mysqli->query($sql);
		require 'insertteacher.php';
	}
}
?>

<body>
	<div class="form">
		<h1>Modify Teacher</h1>
		<form action="modifyteacher.php" method="post" autocomplete="off">
			<div class="field-wrap">
				<label>New Name<span class="req">*</span></label>
				<input type="text" required autocomplete="off" name="teacher_name">
			</div>

			<div class="field-wrap">
				<label>New Department<span class="req">*</span></label>
				<input type="text" required autocomplete="off" name="dept">
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