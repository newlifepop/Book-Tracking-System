<?php
require 'booktrackingdb.php';
?>

<?php
$message = $_SESSION['message'];
$_SESSION['book_id'] = $_POST['book_id'];
$_SESSION['parent_id'] = $_POST['parent_id'];

$parent_id = $mysqli->escape_string($_POST['parent_id']);
$book_id = $mysqli->escape_string($_POST['book_id']);

// check if parent exists
$sql = "SELECT * FROM parent WHERE parent_id = ".$parent_id;
$result = $mysqli->query($sql);
if($result->num_rows == 0){
	$_SESSION['message'] = 'This parent does not exist!';
	header("location: dberror.php");
}
else{
	$sql = "SELECT * FROM book WHERE book_id = ".$book_id;
	$result = $mysqli->query($sql);
	if($result->num_rows == 0){
		$_SESSION['message'] = 'This book does not exist!';
		header("location: dberror.php");
	}
	else{
		$sql = "SELECT * FROM parent WHERE parent_id = ".$parent_id." AND book_id = ".$book_id;
		$result = $mysqli->query($sql);
		if($result->num_rows == 0){
			$_SESSION['message'] = 'No recording showing that this parent rented this book';
			header("location: dberror.php");
		}
		else{
			// then return this book and show the amount due
			$sql = "UPDATE parent SET book_id = 0 WHERE parent_id = ".$parent_id;
			$sql2 = "UPDATE book SET due_date = '2099-12-31', checkout_date = '2099-12-31' WHERE book_id = ".$book_id;

			$amount_result = $mysqli->query("SELECT * FROM book where book_id = ".$book_id);
			$amount = $amount_result->fetch_assoc()['price'];
			if($mysqli->query($sql) AND $mysqli->query($sql2)){
				$_SESSION['message'] = 'Return a book successful! Amount Due: '.$amount;
				header("location: success.php");
			}
			else{
				$_SESSION['message'] = 'Return a book failed, try again later!';
				header("location: dberror.php");
			}
		}
	}
}
?>