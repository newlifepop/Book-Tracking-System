<?php
require 'booktrackingdb.php'
?>

<?php
session_start();
$message = $_SESSION['message'];
$parent_name = $_SESSION['parent_name'];
$parent_id = $_SESSION['parent_id'];
$phone = $_SESSION['phone'];

$sql = "SELECT * FROM parent WHERE";
if(!empty($parent_name)){
	$sql = $sql.' parent_name = "'.$parent_name.'"';
}
if(!empty($parent_id)){
	if(!empty($parent_name)){
		$sql = $sql.' AND parent_id = '.$parent_id;
	}
	else{
		$sql = $sql.' parent_id = '.$parent_id;
	}
}
if(!empty($phone)){
	if(!empty($teacher_name) OR !empty($teacher_id)){
		$sql = $sql.' AND phone_number = '.$phone;
	}
	else{

		$sql = $sql.' phone_number = '.$phone;
	}
}
$sql = $sql.' ORDER BY parent_id';
$records = $mysqli->query($sql) or die($mysqli->error);
$counter = $records->num_rows;
?>

<!DOCTYPE html>
<html>
<head>
<style>h1{color:white;text-align: center;}</style>
	<meta charset="utf-8">
	<title>Display Parent</title>
	<link rel="stylesheet" type="text/css" href="css/displayparentstyle.css">
	<h1><?php echo 'Total records: '.$counter ?></h1>
</head>

<body>
	<div>
		<?php
			while($parent = $records->fetch_assoc()){
				$book_name = 'NULL';
				$book_result = $mysqli->query("SELECT * FROM book WHERE book_id = ".$parent['book_id']);
				if($book_result->num_rows > 0){
					$book_name = $book_result->fetch_assoc()['book_name'];
				}

				if($message === 'search'){
					echo "<table class=form width=100% border=1 cellpadding=1 cellspacing=1>";
				}
				elseif($message === 'update'){
					echo "<form id=modifyparent action=modifyparent.php method=post>";
					echo "<table onclick=modifyparent.submit() class=form width=100% border=1 cellpadding=1 cellspacing=1>";
				}
				elseif($message === 'remove'){
					echo "<form id=deleteparent action=deleteparent.php method=post>";
					echo "<table onclick=deleteparent.submit() class=form width=100% border=1 cellpadding=1 cellspacing=1>";
				}
				echo "<tr>";
				echo "<th>ID</th>";
				echo "<th>Name</th>";
				echo "<th>Phone #</th>";
				echo "<th>Book</th>";
				echo "</tr>";

				echo "<tr class=field-wrap>";
				echo "<td>".$parent['parent_id']."</td>";
				echo "<td>".$parent['parent_name']."</td>";
				echo "<td>".$parent['phone_number']."</td>";
				echo "<td>".$book_name."</td>";
				echo "</tr>";
				echo "</table>";
				$_SESSION['message'] = $parent['parent_id'];
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