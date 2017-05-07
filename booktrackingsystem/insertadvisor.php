<?php
session_start();

$_SESSION['advisor_name'] = $_POST['advisor_name'];
$_SESSION['phone'] = $_POST['phone'];

$advisor_name = $mysqli->escape_string($_POST['advisor_name']);
$phone = $mysqli->escape_string($_POST['phone']);

// check if advisor is in the teacher list, if not, then he/she cannot be an advisor
// as an advisor must be a teacher at the same time
$result = $mysqli->query("SELECT * FROM teacher WHERE phone_number = $phone AND teacher_name = '$advisor_name'");
if($result->num_rows == 0){
	$_SESSION['message'] = $advisor_name.' with phone# '.$phone.' is not a teacher, add '.$advisor_name.' as a teacher first!';
	header("location: dberror.php");
}
else{
	$result_id = $result->fetch_assoc()['teacher_id'];
	$advisor_result = $mysqli->query("SELECT * FROM advisor WHERE advisor_id = $result_id");
	if($advisor_result->num_rows > 0){
		$_SESSION['message'] = $advisor_name.' is already an advisor, add someone else!';
		header("location: dberror.php");
	}
	else{
		// then insert teacher
		$sql = "INSERT INTO advisor (advisor_id) "."VALUES ($result_id)";
		if($mysqli->query($sql)){
			$_SESSION['message'] = 'Insert an advisor successful!';
			header("location: success.php");
		}
		else{
			$_SESSION['message'] = 'Insert an advisor failed! Try again later!';
			header("location: dberror.php");
		}
	}
}

?>