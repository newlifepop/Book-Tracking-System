<?php
require 'booktrackingdb.php'
?>

<?php
session_start();
$sql = "SELECT * FROM student ORDER BY student_id";
$sql2 = "SELECT COUNT(*) FROM student";

$records = $mysqli->query($sql) or die($mysqli->error);
$counter = $records->num_rows;
?>

<!DOCTYPE html>
<html>
<head>
<style>h1{color:white;text-align: center;}</style>
	<meta charset="utf-8">
	<title>Display All Student</title>
	<link rel="stylesheet" type="text/css" href="css/displaystudentstyle.css">
	<h1><?php echo 'Total records: '.$counter ?></h1>
</head>

<body>
	<div>
		<?php
			while($student = $records->fetch_assoc()){
				$dept_result = $mysqli->query("SELECT * FROM dept WHERE dept_id = ".$student['dept_id']);
				$dept_name = $dept_result->fetch_assoc()['dept_name'];

				$amount = 0;
				$book_name = 'NULL';
				$book_result = $mysqli->query("SELECT * FROM book WHERE book_id = ".$student['book_id']);
				if($book_result->num_rows > 0){
					$book_re = $book_result->fetch_assoc();
					$book_name = $book_re['book_name'];
					$amount = $book_re['price'];
				}

				$parent_name = 'NULL';
				$parent_result = $mysqli->query("SELECT * FROM parent WHERE parent_id = ".$student['parent_id']);
				if($parent_result->num_rows > 0){
					$parent_name = $parent_result->fetch_assoc()['parent_name'];
				}
				
				echo "<table class=form width=100% border=1 cellpadding=1 cellspacing=1>";
				echo "<tr>";
				echo "<th>ID</th>";
				echo "<th>Name</th>";
				echo "<th>Gender</th>";
				echo "<th>Parent</th>";
				echo "<th>Department</th>";
				echo "<th>Year</th>";
				echo "<th>GPA</th>";
				echo "<th>Phone #</th>";
				echo "<th>Book</th>";
				echo "<th>Amount Due</th>";
				echo "</tr>";

				echo "<tr class=field-wrap>";
				echo "<td>".$student['student_id']."</td>";
				echo "<td>".$student['student_name']."</td>";
				echo "<td>".$student['student_gender']."</td>";
				echo "<td>".$parent_name."</td>";
				echo "<td>".$dept_name."</td>";
				echo "<td>".$student['year']."</td>";
				echo "<td>".$student['gpa']."</td>";
				echo "<td>".$student['phone_number']."</td>";
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