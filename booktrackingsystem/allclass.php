<?php
require 'booktrackingdb.php'
?>

<?php
session_start();
$sql = "SELECT * FROM class ORDER BY class_id";
$sql2 = "SELECT COUNT(*) FROM class";

$records = $mysqli->query($sql) or die($mysqli->error);
$counter = $records->num_rows;
?>

<!DOCTYPE html>
<html>
<head>
<style>h1{color:white;text-align: center;}</style>
	<meta charset="utf-8">
	<title>Display Class</title>
	<link rel="stylesheet" type="text/css" href="css/displayclassstyle.css">
	<h1><?php echo 'Total records: '.$counter ?></h1>
</head>

<body>
	<div>
		<?php
			while($class = $records->fetch_assoc()){
				$dept_result = $mysqli->query("SELECT * FROM dept WHERE dept_id = ".$class['dept_id']);
				$dept_name = $dept_result->fetch_assoc()['dept_name'];

				$book_name = 'NULL';
				$amount = 0;
				$book_result = $mysqli->query("SELECT * FROM book WHERE book_id = ".$class['book_id']);
				if($book_result->num_rows > 0){
					$book_re = $book_result->fetch_assoc();
					$book_name = $book_re['book_name'];
					$amount = $book_re['price'];
				}

				$teacher_name = 'NULL';
				$teacher_result = $mysqli->query("SELECT * FROM teacher WHERE teacher_id = ".$class['teacher_id']);
				if($teacher_result->num_rows > 0){
					$teacher_name = $teacher_result->fetch_assoc()['teacher_name'];
				}

				echo "<table class=form width=100% border=1 cellpadding=1 cellspacing=1>";
				echo "<tr>";
				echo "<th>ID</th>";
				echo "<th>Name</th>";
				echo "<th>Department</th>";
				echo "<th>Teacher</th>";
				echo "<th>Book</th>";
				echo "<th>Amount Due</th>";
				echo "</tr>";

				echo "<tr class=field-wrap>";
				echo "<td>".$class['class_id']."</td>";
				echo "<td>".$class['class_name']."</td>";
				echo "<td>".$dept_name."</td>";
				echo "<td>".$teacher_name."</td>";
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