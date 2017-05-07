<?php
/* Displays all error messages */
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Error</title>
	<link rel="stylesheet" type="text/css" href="css/dberrorstyle.css">
</head>
<body>
	<div class = "form">
		<h1>Error</h1>
		<p>
			<?php 
    		if( isset($_SESSION['message']) AND !empty($_SESSION['message']) ): 
        		echo $_SESSION['message'];    
    		else:
        		header( "location: profile.php" );
    		endif;
    		?>
		</p>
		<a href="profile.php"><button class="button button-block"/>Home</button></a>
	</div>
</body>
</html>