<?php
require 'booktrackingdb.php'
?>

<?php
session_start();
$message = $_SESSION['message'];
$dept_id = $_SESSION['dept_id'];
$dept_name = $_SESSION['dept_name'];

$sql = "SELECT * FROM dept WHERE";
if(!empty($dept_name)){
	$sql = $sql.' dept_name = "'.$dept_name.'"';
}
if(!empty($dept_id)){
	if(!empty($dept_name)){
		$sql = $sql.' AND dept_id = '.$dept_id;
	}
	else{
		$sql = $sql.' dept_id = '.$dept_id;
	}
}
$sql = $sql.' ORDER BY dept_id';
$records = $mysqli->query($sql) or die($mysqli->error);
$counter = $records->num_rows;
?>

<!DOCTYPE html>
<html>
<head>
<style>h1{color:white;text-align: center;}</style>
	<meta charset="utf-8">
	<title>Display Department</title>
	<link rel="stylesheet" type="text/css" href="css/displaydepartmentstyle.css">
	<h1><?php echo 'Total records: '.$counter ?></h1>
</head>

<body>
	<div>
		<?php
			while($department = $records->fetch_assoc()){

				if($message === 'search'){
					echo "<table class=form width=100% border=1 cellpadding=1 cellspacing=1>";
				}
				elseif($message === 'update'){
					echo "<form id=modifydepartment action=modifydepartment.php method=post>";
					echo "<table onclick=modifydepartment.submit() class=form width=100% border=1 cellpadding=1 cellspacing=1>";
				}

				elseif($message === 'remove'){
					echo "<form id=deletedepartment action=deletedepartment.php method=post>";
					echo "<table onclick=deletedepartment.submit() class=form width=100% border=1 cellpadding=1 cellspacing=1>";
				}
				echo "<tr>";
				echo "<th>ID</th>";
				echo "<th>Name</th>";
				echo "</tr>";

				echo "<tr class=field-wrap>";
				echo "<td>".$department['dept_id']."</td>";
				echo "<td>".$department['dept_name']."</td>";
				echo "</tr>";
				echo "</table>";
				$_SESSION['message'] = $department['dept_id'];
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