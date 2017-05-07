<?php
session_start();

$firstname = $_SESSION['firstname'];
$lastname = $_SESSION['lastname'];
$email = $_SESSION['email'];
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Online Book Tracking</title>
	<link rel="stylesheet" type="text/css" href="css/profilestyle.css">
</head>

<body>
	<div>
		<h1>Welcome</h1>
		<h2><?php echo $firstname.' '.$lastname ?></h2>
		<a href="logout.php"><button class="button" name="logout">Log Out</button></a>
	</div>
	<div class="form">
		<ul>
			<li><a href="#">Add</a>
				<ul>
					<form id="addteacher" action="addteacher.php" method="post">
						<ul><li onclick="addteacher.submit();"><a href="#">Teacher</a></li></ul>
					</form>
					<form id="addstudent" action="addstudent.php" method="post">
						<ul><li onclick="addstudent.submit();"><a href="#">Student</a></li></ul>
					</form>
					<form id="addparent" action="addparent.php" method="post">
						<ul><li onclick="addparent.submit();"><a href="#">Parent</a></li></ul>
					</form>
					<form id="addenrollment" action="addenrollment.php" method="post">
						<ul><li onclick="addenrollment.submit();"><a href="#">Enrollment</a></li></ul>
					</form>
					<form id="adddepartment" action="adddepartment.php" method="post">
						<ul><li onclick="adddepartment.submit();"><a href="#">Deparment</a></li></ul>
					</form>
					<form id="addclass" action="addclass.php" method="post">
						<ul><li onclick="addclass.submit();"><a href="#">Class</a></li></ul>
					</form>
					<form id="addbook" action="addbook.php" method="post">
						<ul><li onclick="addbook.submit();"><a href="#">Book</a></li></ul>
					</form>
					<form id="addadvisor" action="addadvisor.php" method="post">
						<ul><li onclick="addadvisor.submit();"><a href="#">Advisor</a></li></ul>
					</form>
					<form id="addadmin" action="addadmin.php" method="post">
						<ul><li onclick="addadmin.submit();"><a href="#">Admin</a></li></ul>
					</form>
				</ul>
			</li>
			<li><a href="#">Update</a>
				<ul>
					<form id="updateteacher" action="updateteacher.php" method="post">
						<ul><li onclick="updateteacher.submit();"><a href="#">Teacher</a></li></ul>
					</form>
					<form id="updatestudent" action="updatestudent.php" method="post">
						<ul><li onclick="updatestudent.submit();"><a href="#">Student</a></li></ul>
					</form>
					<form id="updateparent" action="updateparent.php" method="post">
						<ul><li onclick="updateparent.submit();"><a href="#">Parent</a></li></ul>
					</form>
					<form id="updateenrollment" action="updateenrollment.php" method="post">
						<ul><li onclick="updateenrollment.submit();"><a href="#">Enrollment</a></li></ul>
					</form>
					<form id="updatedepartment" action="updatedepartment.php" method="post">
						<ul><li onclick="updatedepartment.submit();"><a href="#">Deparment</a></li></ul>
					</form>
					<form id="updateclass" action="updateclass.php" method="post">
						<ul><li onclick="updateclass.submit();"><a href="#">Class</a></li></ul>
					</form>
					<form id="updatebook" action="updatebook.php" method="post">
						<ul><li onclick="updatebook.submit();"><a href="#">Book</a></li></ul>
					</form>
					<form id="updateadvisor" action="updateadvisor.php" method="post">
						<ul><li onclick="updateadvisor.submit();"><a href="#">Advisor</a></li></ul>
					</form>
					<form id="updateadmin" action="updateadmin.php" method="post">
						<ul><li onclick="updateadmin.submit();"><a href="#">Admin</a></li></ul>
					</form>
				</ul>
			</li>
			<li><a href="#">Search For</a>
				<ul>
					<form id="searchteacher" action="searchteacher.php" method="post">
						<ul><li onclick="searchteacher.submit();"><a href="#">Teacher</a></li></ul>
					</form>
					<form id="searchstudent" action="searchstudent.php" method="post">
						<ul><li onclick="searchstudent.submit();"><a href="#">Student</a></li></ul>
					</form>
					<form id="searchparent" action="searchparent.php" method="post">
						<ul><li onclick="searchparent.submit();"><a href="#">Parent</a></li></ul>
					</form>
					<form id="searchenrollment" action="searchenrollment.php" method="post">
						<ul><li onclick="searchenrollment.submit();"><a href="#">Enrollment</a></li></ul>
					</form>
					<form id="searchdepartment" action="searchdepartment.php" method="post">
						<ul><li onclick="searchdepartment.submit();"><a href="#">Deparment</a></li></ul>
					</form>
					<form id="searchclass" action="searchclass.php" method="post">
						<ul><li onclick="searchclass.submit();"><a href="#">Class</a></li></ul>
					</form>
					<form id="searchbook" action="searchbook.php" method="post">
						<ul><li onclick="searchbook.submit();"><a href="#">Book</a></li></ul>
					</form>
					<form id="searchadvisor" action="searchadvisor.php" method="post">
						<ul><li onclick="searchadvisor.submit();"><a href="#">Advisor</a></li></ul>
					</form>
					<form id="searchadmin" action="searchadmin.php" method="post">
						<ul><li onclick="searchadmin.submit();"><a href="#">Admin</a></li></ul>
					</form>
				</ul>
			</li>
			<li><a href="#">Remove</a>
				<ul>
					<form id="removeteacher" action="removeteacher.php" method="post">
						<ul><li onclick="removeteacher.submit();"><a href="#">Teacher</a></li></ul>
					</form>
					<form id="removestudent" action="removestudent.php" method="post">
						<ul><li onclick="removestudent.submit();"><a href="#">Student</a></li></ul>
					</form>
					<form id="removeparent" action="removeparent.php" method="post">
						<ul><li onclick="removeparent.submit();"><a href="#">Parent</a></li></ul>
					</form>
					<form id="removeenrollment" action="removeenrollment.php" method="post">
						<ul><li onclick="removeenrollment.submit();"><a href="#">Enrollment</a></li></ul>
					</form>
					<form id="removedepartment" action="removedepartment.php" method="post">
						<ul><li onclick="removedepartment.submit();"><a href="#">Deparment</a></li></ul>
					</form>
					<form id="removeclass" action="removeclass.php" method="post">
						<ul><li onclick="removeclass.submit();"><a href="#">Class</a></li></ul>
					</form>
					<form id="removebook" action="removebook.php" method="post">
						<ul><li onclick="removebook.submit();"><a href="#">Book</a></li></ul>
					</form>
					<form id="removeadvisor" action="removeadvisor.php" method="post">
						<ul><li onclick="removeadvisor.submit();"><a href="#">Advisor</a></li></ul>
					</form>
					<form id="removeadmin" action="removeadmin.php" method="post">
						<ul><li onclick="removeadmin.submit();"><a href="#">Admin</a></li></ul>
					</form>
				</ul>
			</li>
			<li><a href="#">Check Out Book</a>
				<ul>
					<form id="booktoparent" action="booktoparent.php" method="post">
						<ul><li onclick="booktoparent.submit();"><a href="#">To Parent</a></li></ul>
					</form>
					<form id="booktostudent" action="booktostudent.php" method="post">
						<ul><li onclick="booktostudent.submit();"><a href="#">To Student</a></li></ul>
					</form>
					<form id="booktoteacher" action="booktoteacher.php" method="post">
						<ul><li onclick="booktoteacher.submit();"><a href="#">To Teacher</a></li></ul>
					</form>
					<form id="booktoadmin" action="booktoadmin.php" method="post">
						<ul><li onclick="booktoadmin.submit();"><a href="#">To Admin</a></li></ul>
					</form>
				</ul>
			</li>
			<li><a href="#">Return Book</a>
				<ul>
					<form id="bookfromparent" action="bookfromparent.php" method="post">
						<ul><li onclick="bookfromparent.submit();"><a href="#">From Parent</a></li></ul>
					</form>
					<form id="bookfromstudent" action="bookfromstudent.php" method="post">
						<ul><li onclick="bookfromstudent.submit();"><a href="#">From Student</a></li></ul>
					</form>
					<form id="bookfromteacher" action="bookfromteacher.php" method="post">
						<ul><li onclick="bookfromteacher.submit();"><a href="#">From Teacher</a></li></ul>
					</form>
					<form id="bookfromadmin" action="bookfromadmin.php" method="post">
						<ul><li onclick="bookfromadmin.submit();"><a href="#">From Admin</a></li></ul>
					</form>
				</ul>
			</li>
			<li><a href="#">Display All</a>
				<ul>
					<form id="allparent" action="allparent.php" method="post">
						<ul><li onclick="allparent.submit();"><a href="#">Parent</a></li></ul>
					</form>
					<form id="allstudent" action="allstudent.php" method="post">
						<ul><li onclick="allstudent.submit();"><a href="#">Student</a></li></ul>
					</form>
					<form id="allteacher" action="allteacher.php" method="post">
						<ul><li onclick="allteacher.submit();"><a href="#">Teacher</a></li></ul>
					</form>
					<form id="alladmin" action="alladmin.php" method="post">
						<ul><li onclick="alladmin.submit();"><a href="#">Admin</a></li></ul>
					</form>
					<form id="alladvisor" action="alladvisor.php" method="post">
						<ul><li onclick="alladvisor.submit();"><a href="#">Advisor</a></li></ul>
					</form>
					<form id="allenrollment" action="allenrollment.php" method="post">
						<ul><li onclick="allenrollment.submit();"><a href="#">Enrollment</a></li></ul>
					</form>
					<form id="alldepartment" action="alldepartment.php" method="post">
						<ul><li onclick="alldepartment.submit();"><a href="#">Department</a></li></ul>
					</form>
					<form id="allclass" action="allclass.php" method="post">
						<ul><li onclick="allclass.submit();"><a href="#">Class</a></li></ul>
					</form>
					<form id="allbook" action="allbook.php" method="post">
						<ul><li onclick="allbook.submit();"><a href="#">Book</a></li></ul>
					</form>
				</ul>
			</li>
			<ul>
				<form id=accesslevel action="accesslevel.php" method="post">
					<ul><li onclick="accesslevel.submit()";><a href="#">Access Level</a></li></ul>
				</form>
			</ul>
			<li><a href="#">Rented Book</a>
				<ul>
					<form id="booktoclass" action="booktoclass.php" method="post">
						<ul><li onclick="booktoclass.submit();"><a href="#">By Class</a></li></ul>
					</form>
				</ul>
			</li>
			<li><a href="#">Available Book</a>
				<ul>
					<form id="bookforparent" action="bookforparent.php" method="post">
						<ul><li onclick="bookforparent.submit();"><a href="#">For Parent</a></li></ul>
					</form>
					<form id="bookforstudent" action="bookforstudent.php" method="post">
						<ul><li onclick="bookforstudent.submit();"><a href="#">For Student</a></li></ul>
					</form>
					<form id="bookforteacher" action="bookforteacher.php" method="post">
						<ul><li onclick="bookforteacher.submit();"><a href="#">For Teacher</a></li></ul>
					</form>
					<form id="bookforadmin" action="bookforadmin.php" method="post">
						<ul><li onclick="bookforadmin.submit();"><a href="#">For Admin</a></li></ul>
					</form>
				</ul>
			</li>
			<li><a href="#">Amount Due</a>
				<ul>
					<form id="amountforparent" action="amountforparent.php" method="post">
						<ul><li onclick="amountforparent.submit();"><a href="#">For Parent</a></li></ul>
					</form>
					<form id="amountforstudent" action="amountforstudent.php" method="post">
						<ul><li onclick="amountforstudent.submit();"><a href="#">For Student</a></li></ul>
					</form>
					<form id="amountforteacher" action="amountforteacher.php" method="post">
						<ul><li onclick="amountforteacher.submit();"><a href="#">For Teacher</a></li></ul>
					</form>
					<form id="amountforadmin" action="amountforadmin.php" method="post">
						<ul><li onclick="amountforadmin.submit();"><a href="#">For Admin</a></li></ul>
					</form>
				</ul>
			</li>
		</ul>
	</div>
</body>
</html>



