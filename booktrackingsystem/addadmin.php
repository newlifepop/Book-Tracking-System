<?php
require 'booktrackingdb.php'
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Add Admin</title>
	<link rel="stylesheet" type="text/css" href="css/addadminstyle.css">
</head>

<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	if(isset($_POST['insert'])){
		require 'insertadmin.php';
	}
}
?>

<body>
	<div class="form">
		<h1>Add Admin</h1>
		<form action="addadmin.php" method="post" autocomplete="off">
			<div class="field-wrap">
				<label>Name<span class="req">*</span></label>
				<input type="text" required autocomplete="off" name="admin_name">
			</div>
			<button class="button button-block" name="insert">Insert</button>
		</form>
	</div>
</body>
</html>