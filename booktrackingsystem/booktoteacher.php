<?php
require 'booktrackingdb.php'
?>

<?php
session_start();
$_SESSION['message'] = 'checkout';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Check Out By Teacher/Advisor</title>
	<link rel="stylesheet" type="text/css" href="css/addteacherstyle.css">
</head>

<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	if(isset($_POST['checkout'])){
		$_SESSION['message'] = 'checkout';
		require 'checkbooktoteacher.php';
	}
}
?>

<body>
	<div class="form">
		<h1>Check Out By Teacher/Advisor</h1>
		<form action="booktoteacher.php" method="post" autocomplete="off">
			<div class="field-wrap">
				<label>Teacher ID<span class="req">*</span></label>
				<input type="text" required autocomplete="off" name="teacher_id">
			</div>

			<div class="field-wrap">
				<label>Book ID<span class="req">*</span></label>
				<input type="text" required autocomplete="off" name="book_id">
			</div>
			<button class="button button-block" name="checkout">Check Out</button>
		</form>
	</div>
</body>
</html>