<?php
session_start();

$_SESSION['book_name'] = $_POST['book_name'];
$_SESSION['dept_name'] = $_POST['dept_name'];
$_SESSION['book_id'] = $_POST['book_id'];
$_SESSION['price'] = $_POST['price'];
$_SESSION['due_date'] = $_POST['due_date'];

$book_name = $mysqli->escape_string($_POST['book_name']);
$dept_name = $mysqli->escape_string($_POST['dept_name']);
$book_id = $mysqli->escape_string($_POST['book_id']);
$price = $mysqli->escape_string($_POST['price']);
$due_date = $mysqli->escape_string($_POST['due_date']);

// check if dept exists
$dept_result = $mysqli->query("SELECT * FROM dept WHERE dept_name = '$dept_name'") or die($mysqli->error());
if($dept_result->num_rows == 0){
	$_SESSION['message'] = 'Department does not exist, please add department first';
	header("location: dberror.php");
}
else{
	$d_id = $dept_result->fetch_assoc();
	$dept_id = $d_id['dept_id'];
	// then check if phone number is duplicate
	$book_result = $mysqli->query("SELECT * FROM book WHERE book_id = $book_id") or die($mysqli->error());
	if($book_result->num_rows > 0){
		$_SESSION['message'] = 'This book already exists, add another one';
		header("location: dberror.php");
	}
	else{
		// generate ISBN
		$ISBN = $mysqli->escape_string(password_hash($book_id, PASSWORD_BCRYPT));
		// then insert teacher
		$sql = "INSERT INTO book (book_id, ISBN, book_name, price, due_date, dept_id) "
			."VALUES ($book_id, '$ISBN', '$book_name', $price, '$due_date', $dept_id)";
		if($mysqli->query($sql)){
			$_SESSION['message'] = 'Insert a book successful!';
			header("location: success.php");
		}
		else{
			$_SESSION['message'] = 'Insert a book failed! Try again later!';
			header("location: dberror.php");
		}
	}
}

?>