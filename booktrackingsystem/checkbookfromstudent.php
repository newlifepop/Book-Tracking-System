<?php
require 'booktrackingdb.php';
?>

<?php
$message = $_SESSION['message'];
$_SESSION['book_id'] = $_POST['book_id'];
$_SESSION['student_id'] = $_POST['student_id'];

$student_id = $mysqli->escape_string($_POST['student_id']);
$book_id = $mysqli->escape_string($_POST['book_id']);

// check if parent exists
$sql = "SELECT * FROM student WHERE student_id = ".$student_id;
$result = $mysqli->query($sql);
if($result->num_rows == 0){
	$_SESSION['message'] = 'This student does not exist!';
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
		$sql = "SELECT * FROM student WHERE student_id = ".$student_id." AND book_id = ".$book_id;
		$result = $mysqli->query($sql);
		if($result->num_rows == 0){
			$_SESSION['message'] = 'No recording showing that this student rented this book';
			header("location: dberror.php");
		}
		else{
			// then return this book and show the amount due
			$sql = "UPDATE student SET book_id = 0 WHERE student_id = ".$student_id;
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