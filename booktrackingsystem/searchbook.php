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
	<title>Search for Book</title>
	<link rel="stylesheet" type="text/css" href="css/addstudentstyle.css">
</head>

<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	if(isset($_POST['search'])){
		$_SESSION['message'] = 'search';
		require 'checkbook.php';
	}
}
?>

<body>
	<div class="form">
		<h1>Search for Book</h1>
		<form action="searchbook.php" method="post" autocomplete="off">
			<div class="field-wrap">
				<label>Book ID</label>
				<input type="number" min="0" autocomplete="off" name="book_id">
			</div>

			<div class="field-wrap">
				<label>Name</label>
				<input type="text" autocomplete="off" name="book_name">
			</div>

			<div class="field-wrap">
				<label>ISBN</label>
				<input type="text" autocomplete="off" name="ISBN">
			</div>

			<div class="field-wrap">
				<label>Price</label>
				<input type="number" min="0" autocomplete="off" name="price">
			</div>

			<div class="field-wrap">
				<label>Due Date</label>
				<input type="date" autocomplete="off" name="due_date">
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