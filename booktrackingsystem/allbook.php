<?php
require 'booktrackingdb.php'
?>

<?php
session_start();
$sql = "SELECT * FROM book ORDER BY book_id";
$sql2 = "SELECT COUNT(*) FROM book";

$records = $mysqli->query($sql) or die($mysqli->error);
$counter = $records->num_rows;
?>

<!DOCTYPE html>
<html>
<head>
<style>h1{color:white;text-align: center;}</style>
	<meta charset="utf-8">
	<title>Display Book</title>
	<link rel="stylesheet" type="text/css" href="css/displaybookstyle.css">
	<h1><?php echo 'Total records: '.$counter ?></h1>
</head>

<body>
	<div>
		<?php
			while($book = $records->fetch_assoc()){
				$dept_result = $mysqli->query("SELECT * FROM dept WHERE dept_id = ".$book['dept_id']);
				$dept_name = $dept_result->fetch_assoc()['dept_name'];
				$available = 'No';
				if($book['due_date'] == '2099-12-31'){
					$available = 'Yes';
				}

				$rentedby = 'NULL';
				$book_id = $book['book_id'];
					if($available === 'No'){
					if($book_id > 0 AND $book_id < 100){
						// a parent rented
						$parent_result = $mysqli->query("SELECT * FROM parent WHERE book_id = ".$book_id);
						$rentedby = "Parent: ".$parent_result->fetch_assoc()['parent_name'];
					}
					else if($book_id > 100 AND $book_id < 300){
						$student_result = $mysqli->query("SELECT * FROM student WHERE book_id = ".$book_id);
						$rentedby = "Student: ".$student_result->fetch_assoc()['student_name'];
					}
					else if($book_id > 300 AND $book_id < 500){
						$admin_result = $mysqli->query("SELECT * FROM admin WHERE book_id = ".$book_id);
						$rentedby = "Admin: ".$admin_result->fetch_assoc()['admin_name'];
					}
					else if($book_id > 500 AND $book_id < 900){
						$teacher_result = $mysqli->query("SELECT * FROM teacher WHERE book_id = ".$book_id);
						$rentedby = "Teacher: ".$teacher_result->fetch_assoc()['teacher_name'];
					}
				}

				echo "<table class=form width=100% border=1 cellpadding=1 cellspacing=1>";
				echo "<tr>";
				echo "<th>ID</th>";
				echo "<th>ISBN</th>";
				echo "<th>Name</th>";
				echo "<th>Price</th>";
				echo "<th>Checkout Date</th>";
				echo "<th>Due Date</th>";
				echo "<th>Department</th>";
				echo "<th>Available</th>";
				echo "<th>Rented By</th>";
				echo "</tr>";

				echo "<tr class=field-wrap>";
				echo "<td>".$book['book_id']."</td>";
				echo "<td>".$book['ISBN']."</td>";
				echo "<td>".$book['book_name']."</td>";
				echo "<td>".$book['price']."</td>";
				echo "<td>".$book['checkout_date']."</td>";
				echo "<td>".$book['due_date']."</td>";
				echo "<td>".$dept_name."</td>";
				echo "<td>".$available."</td>";
				echo "<td>".$rentedby."</td>";
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