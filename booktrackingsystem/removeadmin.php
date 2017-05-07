<?php
require 'booktrackingdb.php'
?>

<?php
session_start();
$_SESSION['message'] = 'remove';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Remove Admin</title>
	<link rel="stylesheet" type="text/css" href="css/addstudentstyle.css">
</head>

<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	if(isset($_POST['search'])){
		$_SESSION['message'] = 'remove';
		require 'checkadmin.php';
	}
}
?>

<body>
	<div class="form">
		<h1>Remove Admin</h1>
		<form action="removeadmin.php" method="post" autocomplete="off">
			<div class="field-wrap">
				<label>Admin ID<span class="req">*</span></label>
				<input type="number" min="0" required autocomplete="off" name="admin_id">
			</div>

			<div class="field-wrap">
				<label>Name</label>
				<input type="text" autocomplete="off" name="admin_name">
			</div>
			<button class="button button-block" name="search">Search</button>
		</form>
	</div>
</body>
</html>