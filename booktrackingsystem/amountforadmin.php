<?php
require 'booktrackingdb.php'
?>

<?php
session_start();
$sql = "SELECT * FROM admin WHERE book_id > 0 ORDER BY book_id";
$records = $mysqli->query($sql) or die($mysqli->error);
$counter = $records->num_rows;
?>

<!DOCTYPE html>
<html>
<head>
<style>h1{color:white;text-align: center;}</style>
	<meta charset="utf-8">
	<title>Amount Due For Admin</title>
	<link rel="stylesheet" type="text/css" href="css/displayadminstyle.css">
	<h1><?php echo 'Total records: '.$counter ?></h1>
</head>

<body>
	<div>
		<?php
			while($admin = $records->fetch_assoc()){
				$book_name = 'NULL';
				$amount = 0;
				$book_result = $mysqli->query("SELECT * FROM book WHERE book_id = ".$admin['book_id']);
				if($book_result->num_rows > 0){
					$book_re = $book_result->fetch_assoc();
					$book_name = $book_re['book_name'];
					$amount = $book_re['price'];
				}

				echo "<table class=form width=100% border=1 cellpadding=1 cellspacing=1>";
				echo "<tr>";
				echo "<th>Name</th>";
				echo "<th>Book</th>";
				echo "<th>Amount Due</th>";
				echo "</tr>";

				echo "<tr class=field-wrap>";
				echo "<td>".$admin['admin_name']."</td>";
				echo "<td>".$book_name."</td>";
				echo "<td>".$amount."</td>";
				echo "</tr>";
				echo "</table>";
			}
		?>
		<form id="back" action="profile.php" method="post">
		<button type="submit" onclick="profile.submit()" class="button button-block " name="back">Back</button>
		</form>
	</div>
</body>
</html>