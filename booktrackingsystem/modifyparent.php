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
	<title>Modify Parent</title>
	<link rel="stylesheet" type="text/css" href="css/addparentstyle.css">
</head>

<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	if(isset($_POST['update'])){
		$id = (int)$_SESSION['message'];
		echo $id;
		$sql = "DELETE FROM parent WHERE parent_id = ".$id;
		$mysqli->query($sql);
		require 'insertparent.php';
	}
}
?>

<body>
	<div class="form">
		<h1>Modify Parent</h1>
		<form action="modifyparent.php" method="post" autocomplete="off">
			<div class="field-wrap">
				<label>New Name<span class="req">*</span></label>
				<input type="text" required autocomplete="off" name="parent_name">
			</div>

			<div class="field-wrap">
				<label>New Phone #<span class="req">*</span></label>
				<input type="number" min="0" required autocomplete="off" name="phone">
			</div>
			<button class="button button-block" name="update">Update</button>
		</form>
	</div>
</body>
</html>