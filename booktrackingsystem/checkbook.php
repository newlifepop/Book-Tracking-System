<?php
session_start();
$message = $_SESSION['message'];
$_SESSION['book_id'] = $_POST['book_id'];
$_SESSION['book_name'] = $_POST['book_name'];
$_SESSION['dept_name'] = $_POST['dept_name'];
$_SESSION['ISBN'] = $_POST['ISBN'];
$_SESSION['price'] = $_POST['price'];
$_SESSION['due_date'] = $_POST['due_date'];

$book_name = $mysqli->escape_string($_POST['book_name']);
$dept_name = $mysqli->escape_string($_POST['dept_name']);
$book_id = $mysqli->escape_string($_POST['book_id']);
$ISBN = $mysqli->escape_string($_POST['ISBN']);
$price= $mysqli->escape_string($_POST['price']);
$due_date = $mysqli->escape_string($_POST['due_date']);

if(empty($book_name) AND empty($book_id) AND empty($dept_name) AND empty($ISBN) AND empty($price) AND empty($due_date)){
	$_SESSION['message'] = 'Cannot search for a book without any information!';
	header("location: dberror.php");
}
else{
	$_SESSION['book_id'] = $book_id;
	$_SESSION['book_name'] = $book_name;
	$_SESSION['dept_name'] = $dept_name;
	$_SESSION['ISBN'] = $ISBN;
	$_SESSION['price'] = $price;
	$_SESSION['due_date'] = $due_date;
	$_SESSION['message'] = $message;
	header("location: displaybook.php");
}
?>