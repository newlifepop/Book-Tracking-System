<?php
require 'booktrackingdb.php';
?>

<?php
$message = $_SESSION['message'];
$_SESSION['book_id'] = $_POST['book_id'];
$_SESSION['teacher_id'] = $_POST['teacher_id'];

$teacher_id = $mysqli->escape_string($_POST['teacher_id']);
$book_id = $mysqli->escape_string($_POST['book_id']);

$sql = "SELECT * FROM teacher WHERE teacher_id = ".$teacher_id." AND (book_id = ".$book_id." OR book_id != 0)";
$result = $mysqli->query($sql);
if($result->num_rows > 0){
	$_SESSION['message'] = 'This teacher has already checked out a book';
	header("location: dberror.php");
}
else{
	$sql = "SELECT * FROM teacher WHERE teacher_id = ".$teacher_id;
	$result = $mysqli->query($sql);
	if($result->num_rows == 0){
		$_SESSION['message'] = 'This teacher does not exist!';
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
			// check book id, which is access level, a parent is allowed 0-100 level books
			if($book_id < 500 OR $book_id > 900){
				$_SESSION['message'] = 'Teachers do not have access level to this book';
				header("location: dberror.php");
			}
			else{
				// check if book is rented
				$due_date = $result->fetch_assoc()['due_date'];
				if($due_date === '2099-12-31'){	//meaning available
					// rent it
					$sql = "UPDATE teacher SET book_id = ".$book_id." WHERE teacher_id = ".$teacher_id;
					$sql2 = "UPDATE book SET due_date = '2017-05-15', checkout_date = '2017-05-02' WHERE book_id = ".$book_id;
					if($mysqli->query($sql) AND $mysqli->query($sql2)){
						$_SESSION['message'] = 'Rent a book successful!';
						header("location: success.php");
					}
					else{
						$_SESSION['message'] = 'Rent a book failed, try again later!';
						header("location: dberror.php");
					}
				}
				else{
					$_SESSION['message'] = 'This book has already been checked out';
					header("location: dberror.php");
				}
			}
		}
	}
}

?>