<?php
require 'booktrackingdb.php'
?>

<?php
session_start();
$message = $_SESSION['message'];
$class_name = $_SESSION['class_name'];
$class_id = $_SESSION['class_id'];
$dept_name = $_SESSION['dept_name'];
$teacher_name = $_SESSION['teacher_name'];

$sql = "SELECT * FROM class WHERE";
if(!empty($class_name)){
	$sql = $sql.' class_name = "'.$class_name.'"';
}
if(!empty($class_id)){
	if(!empty($class_name)){
		$sql = $sql.' AND class_id = '.$class_id;
	}
	else{
		$sql = $sql.' class_id = '.$class_id;
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
		if(!empty($class_name) OR !empty($class_id)){
			$sql = $sql.' AND dept_id = '.$dept_id;
		}
		else{

			$sql = $sql.' dept_id = '.$dept_id;
		}
	}
}
if(!empty($teacher_name)){
	$teacher_result = $mysqli->query("SELECT * FROM teacher WHERE teacher_name = '$teacher_name'");
	if($teacher_result->num_rows == 0){
		$_SESSION['message'] = $teacher_name.' does not exist, add it to teacher table first!';
		header("location: dberror.php");
	}
	else{
		$teacher_id = $teacher_result->fetch_assoc()['teacher_id'];
		if(!empty($class_name) OR !empty($class_id) OR !empty($dept_name)){
			$sql = $sql.' AND teacher_id = '.$teacher_id;
		}
		else{
			$sql = $sql.' teacher_id = '.$teacher_id;
		}
	}
}

$sql = $sql.' ORDER BY class_id';
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

				$teacher_name = 'NULL';
				$teacher_result = $mysqli->query("SELECT * FROM teacher WHERE teacher_id = ".$class['teacher_id']);
				if($teacher_result->num_rows > 0){
					$teacher_name = $teacher_result->fetch_assoc()['teacher_name'];
				}

				if($message === 'search'){
					echo "<table class=form width=100% border=1 cellpadding=1 cellspacing=1>";
				}
				elseif($message === 'update'){
					echo "<form id=modifyclass action=modifyclass.php method=post>";
					echo "<table onclick=modifyclass.submit() class=form width=100% border=1 cellpadding=1 cellspacing=1>";
				}
				elseif($message === 'remove'){
					echo "<form id=deleteclass action=deleteclass.php method=post>";
					echo "<table onclick=deleteclass.submit() class=form width=100% border=1 cellpadding=1 cellspacing=1>";
				}
				echo "<tr>";
				echo "<th>ID</th>";
				echo "<th>Name</th>";
				echo "<th>Department</th>";
				echo "<th>Teacher</th>";
				echo "</tr>";

				echo "<tr class=field-wrap>";
				echo "<td>".$class['class_id']."</td>";
				echo "<td>".$class['class_name']."</td>";
				echo "<td>".$dept_name."</td>";
				echo "<td>".$teacher_name."</td>";
				echo "</tr>";
				echo "</table>";
				$_SESSION['message'] = $class['class_id'];
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