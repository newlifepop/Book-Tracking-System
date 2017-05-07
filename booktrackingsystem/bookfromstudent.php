<?php
require 'booktrackingdb.php'
?>

<?php
session_start();
$_SESSION['message'] = 'return';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Return From Student</title>
	<link rel="stylesheet" type="text/css" href="css/addteacherstyle.css">
</head>

<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	if(isset($_POST['return'])){
		$_SESSION['message'] = 'return';
		require 'checkbookfromstudent.php';
	}
}
?>

<body>
	<div class="form">
		<h1>Return From Student</h1>
		<form action="bookfromstudent.php" method="post" autocomplete="off">
			<div class="field-wrap">
				<label>Student ID<span class="req">*</span></label>
				<input type="text" required autocomplete="off" name="student_id">
			</div>

			<div class="field-wrap">
				<label>Book ID<span class="req">*</span></label>
				<input type="text" required autocomplete="off" name="book_id">
			</div>
			<button class="button button-block" name="return">Return</button>
		</form>
	</div>
</body>
</html>