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
	<title>Add Teacher</title>
	<link rel="stylesheet" type="text/css" href="css/addteacherstyle.css">
</head>

<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	if(isset($_POST['insert'])){
		require 'insertteacher.php';
	}
}
?>

<body>
	<div class="form">
		<h1>Add Teacher</h1>
		<form action="addteacher.php" method="post" autocomplete="off">
			<div class="field-wrap">
				<label>Name<span class="req">*</span></label>
				<input type="text" required autocomplete="off" name="teacher_name">
			</div>

			<div class="field-wrap">
				<label>Department<span class="req">*</span></label>
				<input type="text" required autocomplete="off" name="dept">
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