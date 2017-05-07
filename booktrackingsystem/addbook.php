<?php
require 'booktrackingdb.php'
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
	if(isset($_POST['insert'])){
		require 'insertbook.php';
	}
}
?>

<body>
	<div class="form">
		<h1>Add Book</h1>
		<form action="addbook.php" method="post" autocomplete="off">
			<div class="field-wrap">
				<label>Book Name<span class="req">*</span></label>
				<input type="text" required autocomplete="off" name="book_name">
			</div>

			<div class="field-wrap">
				<label>Book ID<span class="req">*</span></label>
				<input type="number" min="0" required autocomplete="off" name="book_id">
			</div>

			<div class="field-wrap">
				<label>Price<span class="req">*</span></label>
				<input type="number" min="0" required autocomplete="off" name="price">
			</div>

			<div class="field-wrap">
				<label>Due Date<span class="req">*</span></label>
				<input type="date" required autocomplete="off" name="due_date">
			</div>

			<div class="field-wrap">
				<label>Department<span class="req">*</span></label>
				<input type="text" required autocomplete="off" name="dept_name">
			</div>
			<button class="button button-block" name="insert">Insert</button>
		</form>
	</div>
</body>
</html>