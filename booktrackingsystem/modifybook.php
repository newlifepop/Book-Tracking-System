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
	<title>Add Book</title>
	<link rel="stylesheet" type="text/css" href="css/addbookstyle.css">
</head>

<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	if(isset($_POST['update'])){
		$id = (int)$_SESSION['message'];
		$sql = "DELETE FROM book WHERE book_id = ".$id;
		$mysqli->query($sql);
		require 'insertbook.php';
	}
}
?>

<body>
	<div class="form">
		<h1>Modify Book</h1>
		<form action="modifybook.php" method="post" autocomplete="off">
			<div class="field-wrap">
				<label>New Book Name<span class="req">*</span></label>
				<input type="text" required autocomplete="off" name="book_name">
			</div>

			<div class="field-wrap">
				<label>New Book ID<span class="req">*</span></label>
				<input type="number" min="0" required autocomplete="off" name="book_id">
			</div>

			<div class="field-wrap">
				<label>New Price<span class="req">*</span></label>
				<input type="number" min="0" required autocomplete="off" name="price">
			</div>

			<div class="field-wrap">
				<label>New Due Date<span class="req">*</span></label>
				<input type="date" required autocomplete="off" name="due_date">
			</div>

			<div class="field-wrap">
				<label>New Department<span class="req">*</span></label>
				<input type="text" required autocomplete="off" name="dept_name">
			</div>
			<button class="button button-block" name="update">Update</button>
		</form>
	</div>
</body>
</html>