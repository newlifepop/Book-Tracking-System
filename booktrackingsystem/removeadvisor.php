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
	<title>Remove Advisor</title>
	<link rel="stylesheet" type="text/css" href="css/addstudentstyle.css">
</head>

<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	if(isset($_POST['search'])){
		$_SESSION['message'] = 'remove';
		require 'checkadvisor.php';
	}
}
?>

<body>
	<div class="form">
		<h1>Remove Advisor</h1>
		<form action="removeadvisor.php" method="post" autocomplete="off">
			<div class="field-wrap">
				<label>Advisor Name<span class="req">*</span></label>
				<input type="text" required autocomplete="off" name="advisor_name">
			</div>
			<div class="field-wrap">
				<label>Department<span class="req">*</span></label>
				<input type="text" required autocomplete="off" name="dept_name">
			</div>
			<button class="button button-block" name="search">Search</button>
		</form>
	</div>
</body>
</html>