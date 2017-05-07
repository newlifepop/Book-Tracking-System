<?php
/* Log out process, unsets and destroys session variables */
session_start();
session_unset();
session_destroy(); 
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Log Out</title>
	<link rel="stylesheet" type="text/css" href="css/logoutstyle.css">
</head>
<body>
	<div class="form">
		<h1>Thanks for stopping by</h1>
		<p><? 'You have been logged out!'; ?></p>
		<a href="index.php"><button class="button button-block">Home</button></a>
	</div>
</body>
</html>