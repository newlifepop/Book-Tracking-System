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
	<title>Modify Admin</title>
	<link rel="stylesheet" type="text/css" href="css/addadminstyle.css">
</head>

<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	if(isset($_POST['update'])){
		$id = (int)$_SESSION['message'];
		$sql = "DELETE FROM admin WHERE admin_id = ".$id;
		$mysqli->query($sql);
		require 'insertadmin.php';
	}
}
?>

<body>
	<div class="form">
		<h1>Modify Admin</h1>
		<form action="modifyadmin.php" method="post" autocomplete="off">
			<div class="field-wrap">
				<label>New Name<span class="req">*</span></label>
				<input type="text" required autocomplete="off" name="admin_name">
			</div>
			<button class="button button-block" name="update">Update</button>
		</form>
	</div>
</body>
</html>