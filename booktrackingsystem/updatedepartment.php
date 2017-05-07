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
	<title>Update Department</title>
	<link rel="stylesheet" type="text/css" href="css/addstudentstyle.css">
</head>

<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	if(isset($_POST['search'])){
		$_SESSION['message'] = 'update';
		require 'checkdepartment.php';
	}
}
?>

<body>
	<div class="form">
		<h1>Update Department</h1>
		<form action="updatedepartment.php" method="post" autocomplete="off">
			<div class="field-wrap">
				<label>Department ID</label>
				<input type="number" min="0" autocomplete="off" name="dept_id">
			</div>

			<div class="field-wrap">
				<label>Name</label>
				<input type="text" autocomplete="off" name="dept_name">
			</div>
			<button class="button button-block" name="search">Search</button>
		</form>
	</div>
</body>
</html>