<?php
require 'booktrackingdb.php'
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Add Advisor</title>
	<link rel="stylesheet" type="text/css" href="css/addadvisorstyle.css">
</head>

<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	if(isset($_POST['insert'])){
		require 'insertadvisor.php';
	}
}
?>

<body>
	<div class="form">
		<h1>Add Advisor</h1>
		<form action="addadvisor.php" method="post" autocomplete="off">
			<div class="field-wrap">
				<label>Name<span class="req">*</span></label>
				<input type="text" required autocomplete="off" name="advisor_name">
			</div>

			<div class="field-wrap">
				<label>Phone #<span class="req">*</span></label>
				<input type="number" min="0" required autocomplete="off" name="phone">
			</div>
			<button class="button button-block" name="insert">Insert</button>
		</form>
	</div>
</body>
</html>