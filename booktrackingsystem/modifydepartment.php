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
	<title>Modify Teacher</title>
	<link rel="stylesheet" type="text/css" href="css/adddepartmentstyle.css">
</head>

<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	if(isset($_POST['update'])){
		$id = (int)$_SESSION['message'];
		$sql = "DELETE FROM dept WHERE dept_id = ".$id;
		$mysqli->query($sql);
		require 'insertdepartment.php';
	}
}
?>

<body>
	<div class="form">
		<h1>Update Department</h1>
		<form action="modifydepartment.php" method="post" autocomplete="off">
			<div class="field-wrap">
				<label>New Department Name<span class="req">*</span></label>
				<input type="text" required autocomplete="off" name="dept_name">
			</div>
			<button class="button button-block" name="update">Update</button>
		</form>
	</div>
</body>
</html>