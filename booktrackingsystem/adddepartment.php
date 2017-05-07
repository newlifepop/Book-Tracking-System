<?php
require 'booktrackingdb.php'
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Add Department</title>
	<link rel="stylesheet" type="text/css" href="css/adddepartmentstyle.css">
</head>

<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	if(isset($_POST['insert'])){
		require 'insertdepartment.php';
	}
}
?>

<body>
	<div class="form">
		<h1>Add Department</h1>
		<form action="adddepartment.php" method="post" autocomplete="off">
			<div class="field-wrap">
				<label>Department Name<span class="req">*</span></label>
				<input type="text" required autocomplete="off" name="dept_name">
			</div>
			<button class="button button-block" name="insert">Insert</button>
		</form>
	</div>
</body>
</html>