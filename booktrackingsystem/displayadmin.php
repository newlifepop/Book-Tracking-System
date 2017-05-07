<?php
require 'booktrackingdb.php'
?>

<?php
session_start();
$message = $_SESSION['message'];
$admin_name = $_SESSION['admin_name'];
$admin_id = $_SESSION['admin_id'];

$sql = "SELECT * FROM admin WHERE";
if(!empty($admin_name)){
	$sql = $sql.' admin_name = "'.$admin_name.'"';
}
if(!empty($admin_id)){
	if(!empty($admin_name)){
		$sql = $sql.' AND admin_id = '.$admin_id;
	}
	else{
		$sql = $sql.' admin_id = '.$admin_id;
	}
}
$sql = $sql.' ORDER BY admin_id';
$records = $mysqli->query($sql) or die($mysqli->error);
$counter = $records->num_rows;
?>

<!DOCTYPE html>
<html>
<head>
<style>h1{color:white;text-align: center;}</style>
	<meta charset="utf-8">
	<title>Display Admin</title>
	<link rel="stylesheet" type="text/css" href="css/displayadminstyle.css">
	<h1><?php echo 'Total records: '.$counter ?></h1>
</head>

<body>
	<div>
		<?php
			while($admin = $records->fetch_assoc()){
				$book_name = 'NULL';
				$book_result = $mysqli->query("SELECT * FROM book WHERE book_id = ".$admin['book_id']);
				if($book_result->num_rows > 0){
					$book_name = $book_result->fetch_assoc()['book_name'];
				}

				if($message === 'search'){
					echo "<table class=form width=100% border=1 cellpadding=1 cellspacing=1>";
				}
				elseif($message === 'update'){
					echo "<form id=modifyadmin action=modifyadmin.php method=post>";
					echo "<table onclick=modifyadmin.submit() class=form width=100% border=1 cellpadding=1 cellspacing=1>";
				}
				elseif($message === 'remove'){
					echo "<form id=deleteadmin action=deleteadmin.php method=post>";
					echo "<table onclick=deleteadmin.submit() class=form width=100% border=1 cellpadding=1 cellspacing=1>";
				}
				echo "<tr>";
				echo "<th>ID</th>";
				echo "<th>Name</th>";
				echo "<th>Book</th>";
				echo "</tr>";

				echo "<tr class=field-wrap>";
				echo "<td>".$admin['admin_id']."</td>";
				echo "<td>".$admin['admin_name']."</td>";
				echo "<td>".$book_name."</td>";
				echo "</tr>";
				echo "</table>";
				$_SESSION['message'] = $admin['admin_id'];
				if($message === 'update' OR $message === 'remove'){
					echo "</form>";
				}
			}
		?>
		<form id="back" action="profile.php" method="post">
		<button type="submit" onclick="profile.submit()" class="button button-block " name="back">Back</button>
		</form>
	</div>
</body>
</html>