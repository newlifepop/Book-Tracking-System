<?php
require 'booktrackingdb.php'
?>

<?php
session_start();
$message = $_SESSION['message'];
$advisor_name = $_SESSION['advisor_name'];
$dept_name = $_SESSION['dept_name'];

$sql = "SELECT * FROM teacher WHERE";
if(!empty($advisor_name)){
	$sql = $sql.' teacher_name = "'.$advisor_name.'"';
}
if(!empty($dept_name)){
	$dept_result = $mysqli->query("SELECT * FROM dept WHERE dept_name = '$dept_name'");
	if($dept_result->num_rows == 0){
		$_SESSION['message'] = $dept_name.' does not exist, add it to department table first!';
		header("location: dberror.php");
	}
	else{
		$dept_id = $dept_result->fetch_assoc()['dept_id'];
		if(!empty($advisor_name)){
			$sql = $sql.' AND dept_id = '.$dept_id;
		}
		else{
			$sql = $sql.' dept_id = '.$dept_id;
		}
	}
}
$records = $mysqli->query($sql) or die($mysqli->error);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Display Advisor</title>
	<link rel="stylesheet" type="text/css" href="css/displayadvisorstyle.css">
</head>

<body>
	<div>
		<?php
			while($advisor = $records->fetch_assoc()){
				$dept_result = $mysqli->query("SELECT * FROM dept WHERE dept_id = ".$advisor['dept_id']);
				$dept_name = $dept_result->fetch_assoc()['dept_name'];

				$book_name = 'NULL';
				$book_result = $mysqli->query("SELECT * FROM book WHERE book_id = ".$advisor['book_id']);
				if($book_result->num_rows > 0){
					$book_name = $book_result->fetch_assoc()['book_name'];
				}

				// check if an advisor
				$advisor_result = $mysqli->query("SELECT * FROM advisor WHERE advisor_id = ".$advisor['teacher_id']);
				if($advisor_result->num_rows > 0){
					if($message === 'search'){
						echo "<table class=form width=100% border=1 cellpadding=1 cellspacing=1>";
					}
					elseif($message === 'update'){
						echo "<form id=modifyadvisor action=modifyadvisor.php method=post>";
						echo "<table onclick=modifyadvisor.submit() class=form width=100% border=1 cellpadding=1 cellspacing=1>";
					}
					elseif($message === 'remove'){
						echo "<form id=deleteadvisor action=deleteadvisor.php method=post>";
						echo "<table onclick=deleteadvisor.submit() class=form width=100% border=1 cellpadding=1 cellspacing=1>";
					}
					echo "<tr>";
					echo "<th>ID</th>";
					echo "<th>Name</th>";
					echo "<th>Department</th>";
					echo "<th>Phone #</th>";
					echo "<th>Book</th>";
					echo "</tr>";

					echo "<tr class=field-wrap>";
					echo "<td>".$advisor['teacher_id']."</td>";
					echo "<td>".$advisor['teacher_name']."</td>";
					echo "<td>".$dept_name."</td>";
					echo "<td>".$advisor['phone_number']."</td>";
					echo "<td>".$book_name."</td>";
					echo "</tr>";
					echo "</table>";
					$_SESSION['message'] = $advisor['teacher_id'];
					if($message === 'update' OR $message === 'remove'){
						echo "</form>";
					}
				}
			}
		?>
		<form id="back" action="profile.php" method="post">
		<button type="submit" onclick="profile.submit()" class="button button-block " name="back">Back</button>
		</form>
	</div>
</body>
</html>