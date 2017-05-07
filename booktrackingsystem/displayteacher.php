<?php
require 'booktrackingdb.php'
?>

<?php
session_start();
$message = $_SESSION['message'];
$teacher_name = $_SESSION['teacher_name'];
$teacher_id = $_SESSION['teacher_id'];
$dept_name = $_SESSION['dept_name'];

$sql = "SELECT * FROM teacher WHERE";
if(!empty($teacher_name)){
	$sql = $sql.' teacher_name = "'.$teacher_name.'"';
}
if(!empty($teacher_id)){
	if(!empty($teacher_name)){
		$sql = $sql.' AND teacher_id = '.$teacher_id;
	}
	else{
		$sql = $sql.' teacher_id = '.$teacher_id;
	}
}
if(!empty($dept_name)){
	$dept_result = $mysqli->query("SELECT * FROM dept WHERE dept_name = '$dept_name'");
	if($dept_result->num_rows == 0){
		$_SESSION['message'] = $dept_name.' does not exist, add it to department table first!';
		header("location: dberror.php");
	}
	else{
		$dept_id = $dept_result->fetch_assoc()['dept_id'];
		if(!empty($teacher_name) OR !empty($teacher_id)){
			$sql = $sql.' AND dept_id = '.$dept_id;
		}
		else{

			$sql = $sql.' dept_id = '.$dept_id;
		}
	}
}

$sql = $sql.' ORDER BY teacher_id';
$records = $mysqli->query($sql) or die($mysqli->error);
$counter = $records->num_rows;
?>

<!DOCTYPE html>
<html>
<head>
<style>h1{color:white;text-align: center;}</style>
	<meta charset="utf-8">
	<title>Display Teacher</title>
	<link rel="stylesheet" type="text/css" href="css/displayteacherstyle.css">
	<h1><?php echo 'Total records: '.$counter ?></h1>
</head>

<body>
	<div>
		<?php
			while($teacher = $records->fetch_assoc()){
				$dept_result = $mysqli->query("SELECT * FROM dept WHERE dept_id = ".$teacher['dept_id']);
				$dept_name = $dept_result->fetch_assoc()['dept_name'];

				$book_name = 'NULL';
				$book_result = $mysqli->query("SELECT * FROM book WHERE book_id = ".$teacher['book_id']);
				if($book_result->num_rows > 0){
					$book_name = $book_result->fetch_assoc()['book_name'];
				}

				if($message === 'search'){
					echo "<table class=form width=100% border=1 cellpadding=1 cellspacing=1>";
				}
				elseif($message === 'update'){
					echo "<form id=modifyteacher action=modifyteacher.php method=post>";
					echo "<table onclick=modifyteacher.submit() class=form width=100% border=1 cellpadding=1 cellspacing=1>";
				}
				elseif($message === 'remove'){
					echo "<form id=deleteteacher action=deleteteacher.php method=post>";
					echo "<table onclick=deleteteacher.submit() class=form width=100% border=1 cellpadding=1 cellspacing=1>";
				}
				echo "<tr>";
				echo "<th>ID</th>";
				echo "<th>Name</th>";
				echo "<th>Department</th>";
				echo "<th>Phone #</th>";
				echo "<th>Book</th>";
				echo "</tr>";

				echo "<tr class=field-wrap>";
				echo "<td>".$teacher['teacher_id']."</td>";
				echo "<td>".$teacher['teacher_name']."</td>";
				echo "<td>".$dept_name."</td>";
				echo "<td>".$teacher['phone_number']."</td>";
				echo "<td>".$book_name."</td>";
				echo "</tr>";
				echo "</table>";
				$_SESSION['message'] = $teacher['teacher_id'];
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