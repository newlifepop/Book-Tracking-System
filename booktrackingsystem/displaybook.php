<?php
require 'booktrackingdb.php'
?>

<?php
session_start();
$message = $_SESSION['message'];
$book_name = $_SESSION['book_name'];
$book_id = $_SESSION['book_id'];
$dept_name = $_SESSION['dept_name'];
$ISBN = $_SESSION['ISBN'];
$price = $_SESSION['price'];
$due_date = $_SESSION['due_date'];

$sql = "SELECT * FROM book WHERE";
if(!empty($book_name)){
	$sql = $sql.' book_name = "'.$book_name.'"';
}
if(!empty($book_id)){
	if(!empty($book_name)){
		$sql = $sql.' AND book_id = '.$book_id;
	}
	else{
		$sql = $sql.' book_id = '.$book_id;
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
		if(!empty($book_name) OR !empty($book_id)){
			$sql = $sql.' AND dept_id = '.$dept_id;
		}
		else{

			$sql = $sql.' dept_id = '.$dept_id;
		}
	}
}
if(!empty($ISBN)){
	if(!empty($book_name) OR !empty($book_id) OR !empty($dept_name)){
		$sql = $sql.' AND ISBN = '.$ISBN;
	}
	else{
		$sql = $sql.' ISBN = '.$ISBN;
	}
}
if(!empty($price)){
	if(!empty($book_name) OR !empty($book_id) OR !empty($dept_name) OR !empty($ISBN)){
		$sql = $sql.' AND price = '.$price;
	}
	else{
		$sql = $sql.' price = '.$price;
	}
}
if(!empty($due_date)){
	if(!empty($book_name) OR !empty($book_id) OR !empty($dept_name) OR !empty($ISBN) OR !empty($price)){
		$sql = $sql.' AND due_date = '.$due_date;
	}
	else{
		$sql = $sql.' due_date = '.$due_date;
	}
}

$sql = $sql.' ORDER BY book_id';
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

				if($message === 'search'){
					echo "<table class=form width=100% border=1 cellpadding=1 cellspacing=1>";
				}
				elseif($message === 'update'){
					echo "<form id=modifybook action=modifybook.php method=post>";
					echo "<table onclick=modifybook.submit() class=form width=100% border=1 cellpadding=1 cellspacing=1>";
				}
				elseif($message === 'remove'){
					echo "<form id=deletebook action=deletebook.php method=post>";
					echo "<table onclick=deletebook.submit() class=form width=100% border=1 cellpadding=1 cellspacing=1>";
				}
				echo "<tr>";
				echo "<th>ID</th>";
				echo "<th>ISBN</th>";
				echo "<th>Name</th>";
				echo "<th>Price</th>";
				echo "<th>Due Date</th>";
				echo "<th>Department</th>";
				echo "<th>Available</th>";
				echo "</tr>";

				echo "<tr class=field-wrap>";
				echo "<td>".$book['book_id']."</td>";
				echo "<td>".$book['ISBN']."</td>";
				echo "<td>".$book['book_name']."</td>";
				echo "<td>".$book['price']."</td>";
				echo "<td>".$book['due_date']."</td>";
				echo "<td>".$dept_name."</td>";
				echo "<td>".$available."</td>";
				echo "</tr>";
				echo "</table>";
				$_SESSION['message'] = $book['book_id'];
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