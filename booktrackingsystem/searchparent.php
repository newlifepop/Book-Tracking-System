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
	<title>Search for Parent</title>
	<link rel="stylesheet" type="text/css" href="css/addstudentstyle.css">
</head>

<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	if(isset($_POST['search'])){
		$_SESSION['message'] = 'search';
		require 'checkparent.php';
	}
}
?>

<body>
	<div class="form">
		<h1>Search for Parent</h1>
		<form action="searchparent.php" method="post" autocomplete="off">
			<div class="field-wrap">
				<label>Parent ID</label>
				<input type="number" min="0" autocomplete="off" name="parent_id">
			</div>

			<div class="field-wrap">
				<label>Name</label>
				<input type="text" autocomplete="off" name="parent_name">
			</div>

			<div class="field-wrap">
				<label>Phone #</label>
				<input type="number" min="0" autocomplete="off" name="phone">
			</div>
			<button class="button button-block" name="search">Search</button>
		</form>
	</div>
</body>
</html>